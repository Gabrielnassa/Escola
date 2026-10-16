<?php
/**
 * Formulário de contato / agendamento (envia por e-mail com wp_mail).
 *
 * @package Bambu
 */

/**
 * Interesses mostrados no formulário.
 *
 * @return array
 */
function bambu_form_interests() {
	$list = array();
	foreach ( bambu_get_courses() as $course ) {
		$list[] = $course['title'];
	}
	$list[] = 'Outro / ainda não sei';
	return $list;
}

/**
 * Exibe o formulário (ou o shortcode configurado).
 */
function bambu_contact_form() {
	$shortcode = bambu_opt( 'form_shortcode' );
	if ( $shortcode && ! bambu_is_preview() ) {
		echo do_shortcode( $shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput
		return;
	}

	$status = isset( $_GET['contato'] ) ? sanitize_key( wp_unslash( $_GET['contato'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
	$action = bambu_is_preview() ? '#contato' : admin_url( 'admin-post.php' );
	?>
	<?php if ( 'ok' === $status ) : ?>
		<div class="form-notice form-notice--ok" role="status">Mensagem enviada! Em breve entraremos em contato.</div>
	<?php elseif ( 'erro' === $status ) : ?>
		<div class="form-notice form-notice--error" role="alert">Não foi possível enviar. Confira os campos ou fale com a gente pelo WhatsApp.</div>
	<?php endif; ?>

	<form class="contact-form" method="post" action="<?php echo esc_url( $action ); ?>" data-preview="<?php echo bambu_is_preview() ? '1' : '0'; ?>">
		<input type="hidden" name="action" value="bambu_contato">
		<?php
		if ( ! bambu_is_preview() ) {
			wp_nonce_field( 'bambu_contato', 'bambu_nonce' );
		}
		?>
		<div class="form-row">
			<label class="field">
				<span>Nome*</span>
				<input type="text" name="nome" required autocomplete="name" placeholder="Seu nome">
			</label>
			<label class="field">
				<span>WhatsApp / telefone*</span>
				<input type="tel" name="telefone" required autocomplete="tel" placeholder="(11) 90000-0000">
			</label>
		</div>
		<div class="form-row">
			<label class="field">
				<span>E-mail</span>
				<input type="email" name="email" autocomplete="email" placeholder="voce@email.com">
			</label>
			<label class="field">
				<span>Tenho interesse em</span>
				<select name="interesse">
					<?php foreach ( bambu_form_interests() as $interest ) : ?>
						<option><?php echo esc_html( $interest ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		</div>
		<fieldset class="field field--choices">
			<legend>Formato preferido</legend>
			<label><input type="radio" name="formato" value="Na escola" checked> Na escola</label>
			<label><input type="radio" name="formato" value="Em domicílio"> Em domicílio</label>
			<label><input type="radio" name="formato" value="Online"> Online</label>
		</fieldset>
		<label class="field">
			<span>Mensagem</span>
			<textarea name="mensagem" rows="4" placeholder="Conte um pouco: idade do aluno, experiência, melhores horários…"></textarea>
		</label>
		<label class="hp" aria-hidden="true">Não preencha<input type="text" name="site" tabindex="-1" autocomplete="off"></label>
		<button type="submit" class="btn btn--primary btn--block">Enviar mensagem <?php echo bambu_icon( 'seta' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
	</form>
	<?php
}

/**
 * Processa o envio do formulário.
 */
function bambu_handle_contact() {
	$back = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$back = remove_query_arg( 'contato', strtok( $back, '#' ) );

	$valid_nonce = isset( $_POST['bambu_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bambu_nonce'] ) ), 'bambu_contato' );
	$is_bot      = ! empty( $_POST['site'] );
	$nome        = isset( $_POST['nome'] ) ? sanitize_text_field( wp_unslash( $_POST['nome'] ) ) : '';
	$telefone    = isset( $_POST['telefone'] ) ? sanitize_text_field( wp_unslash( $_POST['telefone'] ) ) : '';

	if ( ! $valid_nonce || '' === $nome || '' === $telefone ) {
		wp_safe_redirect( add_query_arg( 'contato', 'erro', $back ) . '#contato' );
		exit;
	}

	if ( $is_bot ) {
		wp_safe_redirect( add_query_arg( 'contato', 'ok', $back ) . '#contato' );
		exit;
	}

	$email     = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$interesse = isset( $_POST['interesse'] ) ? sanitize_text_field( wp_unslash( $_POST['interesse'] ) ) : '';
	$formato   = isset( $_POST['formato'] ) ? sanitize_text_field( wp_unslash( $_POST['formato'] ) ) : '';
	$mensagem  = isset( $_POST['mensagem'] ) ? sanitize_textarea_field( wp_unslash( $_POST['mensagem'] ) ) : '';

	$to = bambu_opt( 'form_email' ) ? bambu_opt( 'form_email' ) : bambu_opt( 'email' );
	if ( ! is_email( $to ) ) {
		$to = get_option( 'admin_email' );
	}

	$body  = "Nova mensagem pelo site\n\n";
	$body .= "Nome: {$nome}\n";
	$body .= "Telefone: {$telefone}\n";
	$body .= "E-mail: {$email}\n";
	$body .= "Interesse: {$interesse}\n";
	$body .= "Formato: {$formato}\n\n";
	$body .= "Mensagem:\n{$mensagem}\n";

	$headers = array();
	if ( $email && is_email( $email ) ) {
		$headers[] = 'Reply-To: ' . $nome . ' <' . $email . '>';
	}

	$sent = wp_mail( $to, 'Contato pelo site – ' . $nome, $body, $headers );

	wp_safe_redirect( add_query_arg( 'contato', $sent ? 'ok' : 'erro', $back ) . '#contato' );
	exit;
}
add_action( 'admin_post_nopriv_bambu_contato', 'bambu_handle_contact' );
add_action( 'admin_post_bambu_contato', 'bambu_handle_contact' );
