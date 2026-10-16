<?php
/**
 * Música inclusiva, musicoterapia e psicopedagogia.
 *
 * @package Bambu
 */

$items = array_filter( array_map( 'trim', explode( "\n", bambu_opt( 'incl_items' ) ) ) );
?>
<section class="section feature" id="inclusao">
	<div class="container feature__grid">
		<div class="feature__content reveal">
			<span class="kicker"><?php echo esc_html( bambu_opt( 'incl_kicker' ) ); ?></span>
			<h2 class="section-title"><?php echo esc_html( bambu_opt( 'incl_title' ) ); ?></h2>
			<p><?php echo esc_html( bambu_opt( 'incl_text' ) ); ?></p>
			<?php if ( $items ) : ?>
				<ul class="checklist">
					<?php foreach ( $items as $item ) : ?>
						<li><?php echo bambu_icon( 'check' ); // phpcs:ignore ?> <?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<a class="btn btn--primary" href="<?php echo esc_url( bambu_whatsapp_url( 'Olá! Gostaria de saber mais sobre música inclusiva e musicoterapia.' ) ); ?>" target="_blank" rel="noopener">Converse com nossa equipe <?php echo bambu_icon( 'seta' ); // phpcs:ignore ?></a>
		</div>
		<div class="feature__media reveal">
			<div class="feature__photo" style="<?php echo esc_attr( bambu_bg_style( bambu_opt( 'incl_image' ) ) ); ?>" role="img" aria-label="Atividade de música inclusiva"></div>
			<div class="feature__card">
				<span class="feature__card-icon"><?php echo bambu_icon( 'coracao' ); // phpcs:ignore ?></span>
				<div>
					<strong>Música para todos</strong>
					<small>Cada aluno com seu plano</small>
				</div>
			</div>
		</div>
	</div>
</section>
