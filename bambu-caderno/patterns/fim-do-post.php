<?php
/**
 * Title: Post: fim do post com WhatsApp
 * Slug: bambu/fim-do-post
 * Categories: bambu
 * Inserter: no
 * Description: Fecho de cada post, com uma pergunta e o botão "Conversar no WhatsApp".
 * Viewport Width: 800
 */
?>
<!-- wp:group {"className":"artigo__fim","layout":{"type":"default"}} -->
<div class="wp-block-group artigo__fim"><!-- wp:paragraph -->
<p>Quer conversar sobre o seu caso ou o do seu filho?</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa() ); ?>">Conversar no WhatsApp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
