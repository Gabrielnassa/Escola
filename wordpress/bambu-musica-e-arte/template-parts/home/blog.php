<?php
/**
 * Últimas do blog (aparece quando houver posts publicados).
 *
 * @package Bambu
 */

$posts = bambu_get_latest_posts();
if ( ! $posts ) {
	return;
}
?>
<section class="section section--soft blog-home" id="blog">
	<div class="container">
		<header class="section-head section-head--row reveal">
			<div>
				<span class="kicker">Blog e novidades</span>
				<h2 class="section-title">Acontece na Bambu</h2>
			</div>
			<a class="btn btn--outline" href="<?php echo esc_url( bambu_is_preview() ? '#blog' : bambu_blog_url() ); ?>">Ver todas as publicações</a>
		</header>
		<div class="posts-grid">
			<?php foreach ( $posts as $item ) : ?>
				<?php $url = ! empty( $item['url'] ) ? $item['url'] : '#blog'; ?>
				<article class="post-card reveal">
					<a class="post-card__image" href="<?php echo esc_url( $url ); ?>" style="<?php echo esc_attr( bambu_bg_style( $item['image'] ) ); ?>" aria-hidden="true" tabindex="-1">
						<?php if ( $item['cat'] ) : ?>
							<span class="post-card__cat"><?php echo esc_html( $item['cat'] ); ?></span>
						<?php endif; ?>
					</a>
					<div class="post-card__body">
						<time><?php echo bambu_icon( 'calendario' ); // phpcs:ignore ?> <?php echo esc_html( $item['date'] ); ?></time>
						<h3><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $item['title'] ); ?></a></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
						<a class="link-arrow" href="<?php echo esc_url( $url ); ?>">Ler mais <?php echo bambu_icon( 'direita' ); // phpcs:ignore ?></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
