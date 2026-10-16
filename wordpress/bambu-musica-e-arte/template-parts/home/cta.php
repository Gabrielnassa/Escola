<?php
/**
 * Faixa de chamada para aula experimental.
 *
 * @package Bambu
 */

?>
<section class="cta-band">
	<div class="container">
	<div class="cta-band__inner reveal">
		<span class="cta-band__icon" aria-hidden="true"><?php echo bambu_icon( 'nota' ); // phpcs:ignore ?></span>
		<div class="cta-band__text">
			<h2><?php echo esc_html( bambu_opt( 'cta_title' ) ); ?></h2>
			<p><?php echo esc_html( bambu_opt( 'cta_text' ) ); ?></p>
		</div>
		<div class="cta-band__actions">
			<a class="btn btn--accent btn--lg" href="<?php echo esc_url( bambu_whatsapp_url( 'Olá! Gostaria de agendar uma aula experimental.' ) ); ?>" target="_blank" rel="noopener"><?php echo bambu_icon( 'whatsapp' ); // phpcs:ignore ?> <?php echo esc_html( bambu_opt( 'cta_btn' ) ); ?></a>
			<a class="btn btn--ghost btn--lg" href="<?php echo esc_url( bambu_tel_url( bambu_opt( 'phone1' ) ) ); ?>"><?php echo bambu_icon( 'telefone' ); // phpcs:ignore ?> <?php echo esc_html( bambu_opt( 'phone1' ) ); ?></a>
		</div>
	</div>
	</div>
</section>
