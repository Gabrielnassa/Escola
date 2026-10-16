<?php
/**
 * Post do blog ou curso individual.
 *
 * @package Bambu
 */

get_header();

while ( have_posts() ) :
	the_post();
	bambu_page_header( get_the_title() );
	?>
	<section class="section">
		<div class="container container--narrow">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<?php if ( 'post' === get_post_type() ) : ?>
					<p class="entry__meta"><?php echo bambu_icon( 'calendario' ); // phpcs:ignore ?> <?php echo esc_html( get_the_date() ); ?> <?php the_category( ', ' ); ?></p>
				<?php endif; ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="entry__image"><?php the_post_thumbnail( 'large' ); ?></figure>
				<?php endif; ?>
				<div class="entry__content">
					<?php
					the_content();
					wp_link_pages();
					?>
				</div>
				<?php if ( 'curso' === get_post_type() ) : ?>
					<p><a class="btn btn--primary" href="<?php echo esc_url( bambu_whatsapp_url( 'Olá! Gostaria de saber mais sobre o curso de ' . get_the_title() . '.' ) ); ?>" target="_blank" rel="noopener"><?php echo bambu_icon( 'whatsapp' ); // phpcs:ignore ?> Quero saber mais sobre este curso</a></p>
				<?php endif; ?>
			</article>

			<?php if ( 'post' === get_post_type() ) : ?>
				<nav class="post-nav">
					<?php previous_post_link( '<div>%link</div>', '&larr; %title' ); ?>
					<?php next_post_link( '<div>%link</div>', '%title &rarr;' ); ?>
				</nav>
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			<?php endif; ?>
		</div>
	</section>
	<?php
endwhile;

get_template_part( 'template-parts/home/cta' );
get_footer();
