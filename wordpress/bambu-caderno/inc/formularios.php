<?php
/**
 * Formulários do site: contato e "Trabalhe conosco".
 *
 * - Entram nas páginas pelo bloco Shortcode: [bambu_contato] e [bambu_trabalhe].
 * - Cada envio fica guardado em "Mensagens do site" no painel (mesmo se o e-mail falhar)
 *   e é enviado para o e-mail escolhido em Configurações → Geral.
 * - Funciona com e sem JavaScript.
 *
 * @package bambu-caderno
 */

defined( 'ABSPATH' ) || exit;

const BAMBU_CURSOS = array(
	'Aulas individuais',
	'Aulas em grupo',
	'Musicalização infantil',
	'Musicoterapia',
	'Consultoria para escolas e colégios',
	'Cursos para profissionais',
	'Ainda não sei',
);

const BAMBU_PARA = array( 'Para mim', 'Para meu filho ou filha', 'Para uma escola' );

/* ----- onde as mensagens ficam ------------------------------------------------- */

add_action(
	'init',
	function () {
		register_post_type(
			'bambu_mensagem',
			array(
				'labels'          => array(
					'name'          => 'Mensagens do site',
					'singular_name' => 'Mensagem',
					'menu_name'     => 'Mensagens do site',
					'edit_item'     => 'Mensagem',
					'all_items'     => 'Todas as mensagens',
					'not_found'     => 'Nenhuma mensagem ainda.',
				),
				'public'          => false,
				'show_ui'         => true,
				'show_in_menu'    => true,
				'menu_position'   => 26,
				'menu_icon'       => 'dashicons-email-alt',
				'supports'        => array( 'title', 'editor' ),
				'capability_type' => 'post',
				'capabilities'    => array( 'create_posts' => 'do_not_allow' ),
				'map_meta_cap'    => true,
				'show_in_rest'    => false,
			)
		);
	}
);

/* E-mail que recebe os formulários: Configurações → Geral. */
add_action(
	'admin_init',
	function () {
		register_setting(
			'general',
			'bambu_email_formularios',
			array(
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_email',
				'default'           => '',
			)
		);
		add_settings_field(
			'bambu_email_formularios',
			'E-mail dos formulários do site',
			function () {
				printf(
					'<input type="email" class="regular-text" name="bambu_email_formularios" value="%s" placeholder="%s"><p class="description">Recebe as mensagens de contato e os currículos. Vazio = e-mail do administrador. As mensagens também ficam em "Mensagens do site".</p>',
					esc_attr( get_option( 'bambu_email_formularios' ) ),
					esc_attr( get_option( 'admin_email' ) )
				);
			},
			'general'
		);
	}
);

function bambu_email_destino() {
	$email = get_option( 'bambu_email_formularios' );
	return is_email( $email ) ? $email : get_option( 'admin_email' );
}

/* ----- formulários ------------------------------------------------------------ */

/**
 * Confirmação mostrada depois do envio sem JavaScript (o JS mostra a mesma coisa sem recarregar).
 */
function bambu_confirmacao_html( $tipo ) {
	$nome = isset( $_GET['bambu_nome'] ) ? sanitize_text_field( wp_unslash( $_GET['bambu_nome'] ) ) : '';
	if ( 'trabalhe' === $tipo ) {
		$titulo = $nome ? 'Obrigada, ' . $nome . '.' : 'Obrigada.';
		$texto  = 'Seu currículo chegou aqui na Bambu. A gente lê com calma e, quando surgir uma vaga com o seu perfil, entra em contato.';
	} else {
		$titulo = $nome ? 'Mensagem recebida, ' . $nome . '.' : 'Mensagem recebida.';
		$texto  = 'Ela já chegou aqui na Bambu. Alguém da escola vai te chamar para conversar com calma.';
	}
	return sprintf(
		'<div class="confirmacao" tabindex="-1" role="status"><h3>%s</h3><p>%s</p></div>',
		esc_html( $titulo ),
		esc_html( $texto )
	);
}

function bambu_campos_comuns( $tipo ) {
	return sprintf(
		'<input type="hidden" name="action" value="bambu_%1$s">%2$s<input type="hidden" name="voltar" value="%3$s"><p class="campo-isca" aria-hidden="true"><label>Deixe este campo vazio <input type="text" name="site" tabindex="-1" autocomplete="off"></label></p>',
		esc_attr( $tipo ),
		wp_nonce_field( 'bambu_' . $tipo, '_bambu', true, false ),
		esc_url( get_permalink() ? get_permalink() : home_url( '/' ) )
	);
}

add_shortcode(
	'bambu_contato',
	function () {
		if ( isset( $_GET['bambu_enviado'] ) && 'contato' === $_GET['bambu_enviado'] ) {
			return bambu_confirmacao_html( 'contato' );
		}
		$erro = isset( $_GET['bambu_erro'] ) && 'contato' === $_GET['bambu_erro']
			? '<p class="aviso-envio" role="alert">Faltou algum dado obrigatório. Confira os campos e tente de novo.</p>'
			: '';

		$opcoes_para = '';
		foreach ( BAMBU_PARA as $i => $valor ) {
			$opcoes_para .= sprintf(
				'<label class="opcao"><input type="radio" name="para" value="%1$s"%2$s> %1$s</label>',
				esc_attr( $valor ),
				0 === $i ? ' required' : ''
			);
		}
		$opcoes_curso = '<option value="">Escolha um curso</option>';
		foreach ( BAMBU_CURSOS as $curso ) {
			$opcoes_curso .= '<option>' . esc_html( $curso ) . '</option>';
		}

		ob_start();
		?>
		<div class="formulario-caixa" aria-live="polite">
			<form class="formulario" data-formulario="contato" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate>
				<?php echo bambu_campos_comuns( 'contato' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<?php echo $erro; // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<div class="campos-lado">
					<div class="campo">
						<label for="c-nome">Nome</label>
						<input id="c-nome" name="nome" type="text" autocomplete="name" required aria-describedby="c-nome-erro">
						<p class="erro" id="c-nome-erro"></p>
					</div>
					<div class="campo">
						<label for="c-whatsapp">WhatsApp</label>
						<input id="c-whatsapp" name="whatsapp" type="tel" inputmode="tel" autocomplete="tel" placeholder="(11) 90000-0000" required aria-describedby="c-whatsapp-erro">
						<p class="erro" id="c-whatsapp-erro"></p>
					</div>
				</div>
				<div class="campo">
					<label for="c-email">E-mail <span class="opcional">(opcional)</span></label>
					<input id="c-email" name="email" type="email" autocomplete="email" aria-describedby="c-email-erro">
					<p class="erro" id="c-email-erro"></p>
				</div>
				<fieldset class="grupo-opcoes" aria-describedby="c-para-erro">
					<legend>A aula é para</legend>
					<div class="opcoes"><?php echo $opcoes_para; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
					<p class="erro" id="c-para-erro"></p>
				</fieldset>
				<div class="campo">
					<label for="c-interesse">Interesse</label>
					<select id="c-interesse" name="interesse" required aria-describedby="c-interesse-erro"><?php echo $opcoes_curso; // phpcs:ignore WordPress.Security.EscapeOutput ?></select>
					<p class="erro" id="c-interesse-erro"></p>
				</div>
				<div class="campo">
					<label for="c-mensagem">Mensagem <span class="opcional">(opcional)</span></label>
					<textarea id="c-mensagem" name="mensagem" rows="4" aria-describedby="c-mensagem-ajuda"></textarea>
					<p class="ajuda" id="c-mensagem-ajuda">Se quiser, conte a idade de quem vai estudar, o instrumento e os melhores horários.</p>
				</div>
				<div class="formulario__enviar">
					<button class="wp-element-button" type="submit">Enviar mensagem</button>
					<p class="formulario__nota">Seus dados servem só para a gente responder esta mensagem.</p>
				</div>
			</form>
		</div>
		<?php
		return ob_get_clean();
	}
);

add_shortcode(
	'bambu_trabalhe',
	function () {
		if ( isset( $_GET['bambu_enviado'] ) && 'trabalhe' === $_GET['bambu_enviado'] ) {
			return bambu_confirmacao_html( 'trabalhe' );
		}
		$erro = isset( $_GET['bambu_erro'] ) && 'trabalhe' === $_GET['bambu_erro']
			? '<p class="aviso-envio" role="alert">Faltou algum dado obrigatório ou o arquivo não é um PDF de até 5 MB. Confira e tente de novo.</p>'
			: '';
		ob_start();
		?>
		<div class="formulario-caixa" aria-live="polite">
			<form class="formulario" data-formulario="trabalhe" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" enctype="multipart/form-data" novalidate>
				<?php echo bambu_campos_comuns( 'trabalhe' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<?php echo $erro; // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<div class="campo">
					<label for="t-nome">Nome</label>
					<input id="t-nome" name="nome" type="text" autocomplete="name" required aria-describedby="t-nome-erro">
					<p class="erro" id="t-nome-erro"></p>
				</div>
				<fieldset class="grupo-opcoes" aria-describedby="t-contato-erro">
					<legend>Contato <span class="opcional">(pelo menos um)</span></legend>
					<div class="campos-lado">
						<div class="campo">
							<label for="t-whatsapp">WhatsApp</label>
							<input id="t-whatsapp" name="whatsapp" type="tel" inputmode="tel" autocomplete="tel" placeholder="(11) 90000-0000">
						</div>
						<div class="campo">
							<label for="t-email">E-mail</label>
							<input id="t-email" name="email" type="email" autocomplete="email" aria-describedby="t-email-erro">
							<p class="erro" id="t-email-erro"></p>
						</div>
					</div>
					<p class="erro" id="t-contato-erro"></p>
				</fieldset>
				<div class="campo">
					<label for="t-areas">Instrumentos e áreas</label>
					<input id="t-areas" name="areas" type="text" aria-describedby="t-areas-ajuda">
					<p class="ajuda" id="t-areas-ajuda">Por exemplo: piano, canto, musicalização infantil, artes visuais.</p>
				</div>
				<div class="campo">
					<label for="t-formacao">Formação</label>
					<textarea id="t-formacao" name="formacao" rows="4" aria-describedby="t-formacao-ajuda"></textarea>
					<p class="ajuda" id="t-formacao-ajuda">Cursos, faculdade, conservatório, experiência dando aula.</p>
				</div>
				<div class="campo">
					<label for="t-video">Link de vídeo ou portfólio <span class="opcional">(opcional)</span></label>
					<input id="t-video" name="video" type="url" placeholder="https://" aria-describedby="t-video-erro">
					<p class="erro" id="t-video-erro"></p>
				</div>
				<div class="campo">
					<label for="t-curriculo">Currículo em PDF</label>
					<input id="t-curriculo" name="curriculo" type="file" accept="application/pdf,.pdf" required aria-describedby="t-curriculo-ajuda t-curriculo-erro">
					<p class="ajuda" id="t-curriculo-ajuda">Um arquivo PDF de até 5 MB.</p>
					<p class="erro" id="t-curriculo-erro"></p>
				</div>
				<div class="formulario__enviar">
					<button class="wp-element-button" type="submit">Enviar currículo</button>
				</div>
			</form>
		</div>
		<?php
		return ob_get_clean();
	}
);

/* ----- recebimento ------------------------------------------------------------- */

function bambu_responder( $tipo, $ok, $nome, $voltar, $erros = array() ) {
	$quer_json = isset( $_SERVER['HTTP_X_BAMBU_AJAX'] );
	if ( $quer_json ) {
		if ( $ok ) {
			wp_send_json_success( array( 'nome' => $nome ) );
		}
		wp_send_json_error( array( 'erros' => $erros ), 400 );
	}
	$voltar = wp_validate_redirect( $voltar, home_url( '/' ) );
	$args   = $ok ? array( 'bambu_enviado' => $tipo, 'bambu_nome' => rawurlencode( $nome ) ) : array( 'bambu_erro' => $tipo );
	$ancora = 'contato' === $tipo ? '#contato' : '#formulario';
	wp_safe_redirect( add_query_arg( $args, $voltar ) . $ancora, 303 );
	exit;
}

function bambu_texto( $campo ) {
	return isset( $_POST[ $campo ] ) ? sanitize_text_field( wp_unslash( $_POST[ $campo ] ) ) : '';
}

function bambu_texto_longo( $campo ) {
	return isset( $_POST[ $campo ] ) ? sanitize_textarea_field( wp_unslash( $_POST[ $campo ] ) ) : '';
}

function bambu_guardar( $titulo, $linhas ) {
	$corpo = '';
	foreach ( $linhas as $rotulo => $valor ) {
		if ( '' === $valor ) {
			continue;
		}
		$corpo .= '<p><strong>' . esc_html( $rotulo ) . ':</strong> ' . nl2br( esc_html( $valor ) ) . '</p>';
	}
	wp_insert_post(
		array(
			'post_type'    => 'bambu_mensagem',
			'post_status'  => 'private',
			'post_title'   => $titulo,
			'post_content' => $corpo,
		)
	);
	$texto = '';
	foreach ( $linhas as $rotulo => $valor ) {
		if ( '' !== $valor ) {
			$texto .= $rotulo . ': ' . $valor . "\n";
		}
	}
	return $texto;
}

function bambu_receber_contato() {
	$voltar = isset( $_POST['voltar'] ) ? esc_url_raw( wp_unslash( $_POST['voltar'] ) ) : home_url( '/' );
	$nome   = bambu_texto( 'nome' );
	// Visitantes não logados não têm sessão a proteger, e páginas em cache guardam nonces vencidos:
	// para eles, o campo-isca já basta. Para quem está logado, o nonce vale.
	if ( is_user_logged_in() && ( ! isset( $_POST['_bambu'] ) || ! wp_verify_nonce( sanitize_key( $_POST['_bambu'] ), 'bambu_contato' ) ) ) {
		bambu_responder( 'contato', false, $nome, $voltar, array( 'sessao' ) );
	}
	if ( '' !== bambu_texto( 'site' ) ) { // robô preencheu o campo-isca: finge que deu certo
		bambu_responder( 'contato', true, $nome, $voltar );
	}
	$whats     = bambu_texto( 'whatsapp' );
	$email     = sanitize_email( bambu_texto( 'email' ) );
	$para      = in_array( bambu_texto( 'para' ), BAMBU_PARA, true ) ? bambu_texto( 'para' ) : '';
	$interesse = in_array( bambu_texto( 'interesse' ), BAMBU_CURSOS, true ) ? bambu_texto( 'interesse' ) : '';
	$mensagem  = bambu_texto_longo( 'mensagem' );

	$erros = array();
	if ( mb_strlen( $nome ) < 2 ) {
		$erros[] = 'nome';
	}
	if ( strlen( preg_replace( '/\D/', '', $whats ) ) < 10 ) {
		$erros[] = 'whatsapp';
	}
	if ( ! $para ) {
		$erros[] = 'para';
	}
	if ( ! $interesse ) {
		$erros[] = 'interesse';
	}
	if ( $erros ) {
		bambu_responder( 'contato', false, $nome, $voltar, $erros );
	}

	$texto = bambu_guardar(
		$nome . ' · ' . $interesse,
		array(
			'Nome'           => $nome,
			'WhatsApp'       => $whats,
			'E-mail'         => $email,
			'A aula é para'  => $para,
			'Interesse'      => $interesse,
			'Mensagem'       => $mensagem,
			'Enviado de'     => $voltar,
		)
	);
	$cabecalhos = $email ? array( 'Reply-To: ' . $nome . ' <' . $email . '>' ) : array();
	wp_mail( bambu_email_destino(), 'Site: ' . $interesse . ' · ' . $nome, $texto, $cabecalhos );
	bambu_responder( 'contato', true, $nome, $voltar );
}
add_action( 'admin_post_nopriv_bambu_contato', 'bambu_receber_contato' );
add_action( 'admin_post_bambu_contato', 'bambu_receber_contato' );

function bambu_receber_trabalhe() {
	$voltar = isset( $_POST['voltar'] ) ? esc_url_raw( wp_unslash( $_POST['voltar'] ) ) : home_url( '/' );
	$nome   = bambu_texto( 'nome' );
	// Visitantes não logados não têm sessão a proteger, e páginas em cache guardam nonces vencidos:
	// para eles, o campo-isca já basta. Para quem está logado, o nonce vale.
	if ( is_user_logged_in() && ( ! isset( $_POST['_bambu'] ) || ! wp_verify_nonce( sanitize_key( $_POST['_bambu'] ), 'bambu_trabalhe' ) ) ) {
		bambu_responder( 'trabalhe', false, $nome, $voltar, array( 'sessao' ) );
	}
	if ( '' !== bambu_texto( 'site' ) ) {
		bambu_responder( 'trabalhe', true, $nome, $voltar );
	}
	$whats = bambu_texto( 'whatsapp' );
	$email = sanitize_email( bambu_texto( 'email' ) );
	$video = isset( $_POST['video'] ) ? esc_url_raw( wp_unslash( $_POST['video'] ) ) : '';

	$erros = array();
	if ( mb_strlen( $nome ) < 2 ) {
		$erros[] = 'nome';
	}
	if ( strlen( preg_replace( '/\D/', '', $whats ) ) < 10 && ! is_email( $email ) ) {
		$erros[] = 'contato';
	}

	$arquivo = isset( $_FILES['curriculo'] ) ? $_FILES['curriculo'] : null; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
	$pdf_ok  = $arquivo && UPLOAD_ERR_OK === $arquivo['error'] && $arquivo['size'] <= 5 * MB_IN_BYTES
		&& 'pdf' === strtolower( pathinfo( $arquivo['name'], PATHINFO_EXTENSION ) );
	if ( ! $pdf_ok ) {
		$erros[] = 'curriculo';
	}
	if ( $erros ) {
		bambu_responder( 'trabalhe', false, $nome, $voltar, $erros );
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	$salvo = wp_handle_upload(
		$arquivo,
		array(
			'test_form'                => false,
			'mimes'                    => array( 'pdf' => 'application/pdf' ),
			// nome difícil de adivinhar: o arquivo fica na pasta de uploads
			'unique_filename_callback' => function () {
				return 'curriculo-' . wp_generate_password( 20, false ) . '.pdf';
			},
		)
	);
	if ( empty( $salvo['file'] ) ) {
		bambu_responder( 'trabalhe', false, $nome, $voltar, array( 'curriculo' ) );
	}

	$texto = bambu_guardar(
		'Currículo · ' . $nome,
		array(
			'Nome'                    => $nome,
			'WhatsApp'                => $whats,
			'E-mail'                  => $email,
			'Instrumentos e áreas'    => bambu_texto( 'areas' ),
			'Formação'                => bambu_texto_longo( 'formacao' ),
			'Vídeo ou portfólio'      => $video,
			'Currículo'               => $salvo['url'],
		)
	);
	$cabecalhos = is_email( $email ) ? array( 'Reply-To: ' . $nome . ' <' . $email . '>' ) : array();
	wp_mail( bambu_email_destino(), 'Site: currículo de ' . $nome, $texto, $cabecalhos, array( $salvo['file'] ) );
	bambu_responder( 'trabalhe', true, $nome, $voltar );
}
add_action( 'admin_post_nopriv_bambu_trabalhe', 'bambu_receber_trabalhe' );
add_action( 'admin_post_bambu_trabalhe', 'bambu_receber_trabalhe' );

/*
 * O WordPress roda os shortcodes do template antes de expandir os padrões (wp:pattern),
 * então um bloco Shortcode vindo de padrão chegaria cru na página. Aqui ele é processado
 * na hora em que o bloco é renderizado.
 */
add_filter(
	'render_block_core/shortcode',
	function ( $conteudo ) {
		return do_shortcode( $conteudo );
	}
);
