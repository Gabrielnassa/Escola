<?php
/**
 * Acesso rápido aos formatos de aula (cards sobre o banner).
 *
 * @package Bambu
 */

?>
<section class="quick" aria-label="Formatos de aula">
	<div class="container">
		<ul class="quick__grid">
			<?php foreach ( bambu_quick_links() as $item ) : ?>
				<?php
				$url      = bambu_resolve_url( $item['url'] );
				$external = 0 === strpos( $url, 'https://wa.me' );
				?>
				<li>
					<a class="quick__item" href="<?php echo esc_url( $url ); ?>"<?php echo $external ? ' target="_blank" rel="noopener"' : ''; ?>>
						<span class="quick__icon"><?php echo bambu_icon( $item['icon'] ); // phpcs:ignore ?></span>
						<span class="quick__text">
							<strong><?php echo esc_html( $item['title'] ); ?></strong>
							<small><?php echo esc_html( $item['text'] ); ?></small>
						</span>
						<?php echo bambu_icon( 'direita', 'quick__arrow' ); // phpcs:ignore ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
