<?php
/**
 * Title: Post: voltar para o blog
 * Slug: bambu/voltar-blog
 * Categories: bambu
 * Inserter: no
 * Description: Link "← Blog" no topo de cada post, que leva para a página de posts (Configurações → Leitura).
 * Viewport Width: 800
 */
?>
<!-- wp:paragraph {"className":"artigo__voltar link"} -->
<p class="artigo__voltar link"><a href="<?php echo esc_url( bambu_url_blog() ); ?>">← Blog</a></p>
<!-- /wp:paragraph -->
