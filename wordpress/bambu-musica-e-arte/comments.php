<?php
/**
 * Comentários dos posts.
 *
 * @package Bambu
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comentarios" class="comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments__title">
			<?php
			$count = get_comments_number();
			echo esc_html( 1 === (int) $count ? '1 comentário' : $count . ' comentários' );
			?>
		</h2>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply'  => 'Deixe um comentário',
			'label_submit' => 'Publicar comentário',
			'class_submit' => 'btn btn--primary',
		)
	);
	?>
</section>
