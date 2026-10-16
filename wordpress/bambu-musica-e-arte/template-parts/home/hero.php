<?php
/**
 * Banner rotativo.
 *
 * @package Bambu
 */

$slides = array();
for ( $i = 1; $i <= 3; $i++ ) {
	if ( bambu_opt( "slide{$i}_title" ) ) {
		$slides[] = $i;
	}
}
if ( ! $slides ) {
	return;
}
$overlay = 'linear-gradient(90deg, rgba(14,38,22,.88) 0%, rgba(14,38,22,.62) 45%, rgba(14,38,22,.15) 100%)';
?>
<section class="hero" id="inicio" aria-roledescription="carrossel" aria-label="Destaques">
	<div class="hero__track">
		<?php foreach ( $slides as $index => $i ) : ?>
			<?php
			$url      = bambu_resolve_url( bambu_opt( "slide{$i}_url" ) );
			$external = 0 === strpos( $url, 'https://wa.me' );
			?>
			<div class="hero__slide<?php echo 0 === $index ? ' is-active' : ''; ?>" style="<?php echo esc_attr( bambu_bg_style( bambu_opt( "slide{$i}_image" ), $overlay ) ); ?>" role="group" aria-roledescription="slide" aria-label="<?php echo esc_attr( ( $index + 1 ) . ' de ' . count( $slides ) ); ?>">
				<div class="container hero__content">
					<?php if ( bambu_opt( "slide{$i}_kicker" ) ) : ?>
						<span class="kicker kicker--light"><?php echo esc_html( bambu_opt( "slide{$i}_kicker" ) ); ?></span>
					<?php endif; ?>
					<?php if ( 0 === $index ) : ?>
						<h1 class="hero__title"><?php echo esc_html( bambu_opt( "slide{$i}_title" ) ); ?></h1>
					<?php else : ?>
						<h2 class="hero__title"><?php echo esc_html( bambu_opt( "slide{$i}_title" ) ); ?></h2>
					<?php endif; ?>
					<p class="hero__text"><?php echo esc_html( bambu_opt( "slide{$i}_text" ) ); ?></p>
					<div class="hero__actions">
						<?php if ( bambu_opt( "slide{$i}_btn" ) ) : ?>
							<a class="btn btn--accent btn--lg" href="<?php echo esc_url( $url ); ?>"<?php echo $external ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo esc_html( bambu_opt( "slide{$i}_btn" ) ); ?> <?php echo bambu_icon( 'seta' ); // phpcs:ignore ?></a>
						<?php endif; ?>
						<a class="btn btn--ghost btn--lg" href="#cursos">Ver cursos</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<?php if ( count( $slides ) > 1 ) : ?>
		<div class="hero__controls container">
			<button class="hero__arrow" type="button" data-dir="-1" aria-label="Slide anterior"><?php echo bambu_icon( 'esquerda' ); // phpcs:ignore ?></button>
			<div class="hero__dots" role="tablist">
				<?php foreach ( $slides as $index => $i ) : ?>
					<button type="button" class="hero__dot<?php echo 0 === $index ? ' is-active' : ''; ?>" data-slide="<?php echo esc_attr( $index ); ?>" aria-label="<?php echo esc_attr( 'Ir para o slide ' . ( $index + 1 ) ); ?>"></button>
				<?php endforeach; ?>
			</div>
			<button class="hero__arrow" type="button" data-dir="1" aria-label="Próximo slide"><?php echo bambu_icon( 'direita' ); // phpcs:ignore ?></button>
		</div>
	<?php endif; ?>
</section>
