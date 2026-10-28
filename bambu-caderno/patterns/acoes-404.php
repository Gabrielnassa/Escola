<?php
/**
 * Title: Página 404: WhatsApp e página inicial
 * Slug: bambu/acoes-404
 * Categories: bambu
 * Inserter: no
 * Description: Botão "Conversar no WhatsApp" e link para a página inicial, usados na página de erro 404.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"className":"hero__acoes","layout":{"type":"default"}} -->
<div class="wp-block-group hero__acoes"><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa() ); ?>">Conversar no WhatsApp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"link-seta"} -->
<p class="link-seta"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Ir para a página inicial →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
