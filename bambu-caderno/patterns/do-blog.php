<?php
/**
 * Title: Início: do blog
 * Slug: bambu/do-blog
 * Categories: bambu
 * Description: Os três posts mais recentes do blog (o primeiro em destaque), com link para todos os posts.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"secao blog-home","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull secao blog-home"><!-- wp:group {"className":"envelope","layout":{"type":"default"}} -->
<div class="wp-block-group envelope"><!-- wp:group {"className":"blog-home__cabeca","layout":{"type":"default"}} -->
<div class="wp-block-group blog-home__cabeca"><!-- wp:heading -->
<h2 class="wp-block-heading">Do blog</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"link-seta"} -->
<p class="link-seta"><a href="<?php echo esc_url( bambu_url_blog() ); ?>">Todos os posts →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","className":"foto-post"} /-->

<!-- wp:post-date /-->

<!-- wp:post-title {"level":3,"isLink":true} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"className":"sem-posts"} -->
<p class="sem-posts">Os primeiros posts aparecem aqui assim que forem publicados.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
