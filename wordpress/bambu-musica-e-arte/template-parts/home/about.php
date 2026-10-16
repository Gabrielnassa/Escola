<?php
/**
 * Quem somos.
 *
 * @package Bambu
 */

$paragraphs = preg_split( "/\n\s*\n/", trim( bambu_opt( 'about_text' ) ) );
?>
<section class="section about" id="sobre">
	<div class="container about__grid">
		<div class="about__media reveal">
			<div class="about__photo" style="<?php echo esc_attr( bambu_bg_style( bambu_opt( 'about_image' ) ) ); ?>" role="img" aria-label="Aula de música na Bambu"></div>
			<div class="about__deco" aria-hidden="true"><?php echo bambu_icon( 'bambu' ); // phpcs:ignore ?></div>
			<?php if ( bambu_opt( 'about_badge' ) ) : ?>
				<div class="about__badge"><?php echo bambu_icon( 'local' ); // phpcs:ignore ?> <?php echo esc_html( bambu_opt( 'about_badge' ) ); ?></div>
			<?php endif; ?>
		</div>

		<div class="about__content reveal">
			<span class="kicker"><?php echo esc_html( bambu_opt( 'about_kicker' ) ); ?></span>
			<h2 class="section-title"><?php echo esc_html( bambu_opt( 'about_title' ) ); ?></h2>
			<?php foreach ( $paragraphs as $paragraph ) : ?>
				<p><?php echo esc_html( $paragraph ); ?></p>
			<?php endforeach; ?>

			<ul class="stats">
				<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
					<?php if ( bambu_opt( "stat{$i}_number" ) ) : ?>
						<li>
							<strong><?php echo esc_html( bambu_opt( "stat{$i}_number" ) ); ?></strong>
							<span><?php echo esc_html( bambu_opt( "stat{$i}_label" ) ); ?></span>
						</li>
					<?php endif; ?>
				<?php endfor; ?>
			</ul>

			<div class="about__actions">
				<a class="btn btn--primary" href="<?php echo esc_url( bambu_is_preview() ? '#contato' : home_url( '/quem-somos/' ) ); ?>">Conheça nossa história <?php echo bambu_icon( 'seta' ); // phpcs:ignore ?></a>
				<a class="link-arrow" href="#contato">Agende uma visita <?php echo bambu_icon( 'direita' ); // phpcs:ignore ?></a>
			</div>
		</div>
	</div>
</section>
