<?php
/**
 * Lista de posts (blog, arquivos, busca).
 *
 * @package Bambu
 */

get_header();

if ( is_home() ) {
	$title = get_option( 'page_for_posts' ) ? get_the_title( get_option( 'page_for_posts' ) ) : 'Blog';
} elseif ( is_search() ) {
	/* translators: %s: termo buscado */
	$title = sprintf( 'Resultados para "%s"', get_search_query() );
} elseif ( is_post_type_archive( 'curso' ) ) {
	$title = 'Cursos';
} else {
	$title = wp_strip_all_tags( get_the_archive_title() );
}

bambu_page_header( $title, is_home() ? 'Novidades, dicas e bastidores da Bambu Música e Arte.' : '' );
?>
<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="posts-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					$cats = get_the_category();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
						<a class="post-card__image" href="<?php the_permalink(); ?>" style="<?php echo esc_attr( bambu_bg_style( get_the_post_thumbnail_url( null, 'bambu-card' ) ) ); ?>" aria-hidden="true" tabindex="-1">
							<?php if ( $cats ) : ?>
								<span class="post-card__cat"><?php echo esc_html( $cats[0]->name ); ?></span>
							<?php endif; ?>
						</a>
						<div class="post-card__body">
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo bambu_icon( 'calendario' ); // phpcs:ignore ?> <?php echo esc_html( get_the_date() ); ?></time>
							<h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo esc_html( get_the_excerpt() ); ?></p>
							<a class="link-arrow" href="<?php the_permalink(); ?>">Ler mais <?php echo bambu_icon( 'direita' ); // phpcs:ignore ?></a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
			<div class="pagination">
				<?php
				the_posts_pagination(
					array(
						'prev_text' => '&larr; Anteriores',
						'next_text' => 'Próximos &rarr;',
					)
				);
				?>
			</div>
		<?php else : ?>
			<div class="empty-state">
				<h2>Nada por aqui ainda</h2>
				<p>Não encontramos publicações. Tente uma nova busca:</p>
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
