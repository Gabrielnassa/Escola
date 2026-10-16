<?php
/**
 * Contato: informações, formulário e mapa.
 *
 * @package Bambu
 */

$map_query = rawurlencode( bambu_opt( 'address' ) );
?>
<section class="section contact" id="contato">
	<div class="container contact__grid">
		<div class="contact__info reveal">
			<span class="kicker">Fale conosco</span>
			<h2 class="section-title">Vamos começar sua jornada musical?</h2>
			<p>Mande uma mensagem e retornamos com horários, valores e a melhor opção de aula para você.</p>

			<ul class="contact-list">
				<li>
					<span class="contact-list__icon"><?php echo bambu_icon( 'whatsapp' ); // phpcs:ignore ?></span>
					<div><small>WhatsApp</small><a href="<?php echo esc_url( bambu_whatsapp_url() ); ?>" target="_blank" rel="noopener"><?php echo esc_html( bambu_opt( 'phone1' ) ); ?></a></div>
				</li>
				<?php if ( bambu_opt( 'phone2' ) ) : ?>
					<li>
						<span class="contact-list__icon"><?php echo bambu_icon( 'telefone' ); // phpcs:ignore ?></span>
						<div><small>Telefone</small><a href="<?php echo esc_url( bambu_tel_url( bambu_opt( 'phone2' ) ) ); ?>"><?php echo esc_html( bambu_opt( 'phone2' ) ); ?></a></div>
					</li>
				<?php endif; ?>
				<li>
					<span class="contact-list__icon"><?php echo bambu_icon( 'email' ); // phpcs:ignore ?></span>
					<div><small>E-mail</small><a href="mailto:<?php echo esc_attr( bambu_opt( 'email' ) ); ?>"><?php echo esc_html( bambu_opt( 'email' ) ); ?></a></div>
				</li>
				<li>
					<span class="contact-list__icon"><?php echo bambu_icon( 'local' ); // phpcs:ignore ?></span>
					<div><small>Endereço</small><a href="<?php echo esc_url( 'https://www.google.com/maps/search/?api=1&query=' . $map_query ); ?>" target="_blank" rel="noopener"><?php echo esc_html( bambu_opt( 'address' ) ); ?></a></div>
				</li>
			</ul>
		</div>

		<div class="contact__form reveal">
			<h3>Agende sua aula experimental</h3>
			<?php bambu_contact_form(); ?>
		</div>
	</div>

	<?php if ( bambu_opt( 'map_embed' ) ) : ?>
		<div class="container">
			<div class="map">
				<iframe title="Mapa: <?php echo esc_attr( bambu_opt( 'address' ) ); ?>" src="<?php echo esc_url( 'https://www.google.com/maps?q=' . $map_query . '&output=embed' ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
			</div>
		</div>
	<?php endif; ?>
</section>
