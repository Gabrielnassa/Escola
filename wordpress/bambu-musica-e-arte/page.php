<?php
/**
 * Páginas (Quem somos, Trabalhe conosco etc.).
 *
 * @package Bambu
 */

get_header();

while ( have_posts() ) :
	the_post();
	bambu_page_header( get_the_title(), has_excerpt() ? get_the_excerpt() : '' );
	?>
	<section class="section">
		<div class="container container--narrow">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<div class="entry__content">
					<?php
					the_content();
					wp_link_pages();
					?>
				</div>
			</article>
		</div>
	</section>
	<?php
	get_template_part( 'template-parts/home/cta' );
endwhile;

get_footer();
