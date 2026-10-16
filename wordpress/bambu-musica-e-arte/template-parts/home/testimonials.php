<?php
/**
 * Depoimentos (aparece quando houver depoimentos cadastrados).
 *
 * @package Bambu
 */

$testimonials = bambu_get_testimonials();
if ( ! $testimonials ) {
	return;
}
?>
<section class="section testimonials" id="depoimentos">
	<div class="container">
		<header class="section-head reveal">
			<span class="kicker">Depoimentos</span>
			<h2 class="section-title">Quem aprende com a gente, recomenda</h2>
		</header>
		<div class="testimonials__grid">
			<?php foreach ( $testimonials as $item ) : ?>
				<figure class="testimonial reveal">
					<?php echo bambu_icon( 'aspas', 'testimonial__quote' ); // phpcs:ignore ?>
					<blockquote><p><?php echo esc_html( $item['text'] ); ?></p></blockquote>
					<figcaption>
						<span class="testimonial__avatar" aria-hidden="true"><?php echo esc_html( function_exists( 'mb_substr' ) ? mb_substr( $item['name'], 0, 1 ) : substr( $item['name'], 0, 1 ) ); ?></span>
						<span>
							<strong><?php echo esc_html( $item['name'] ); ?></strong>
							<?php if ( $item['role'] ) : ?>
								<small><?php echo esc_html( $item['role'] ); ?></small>
							<?php endif; ?>
						</span>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>
