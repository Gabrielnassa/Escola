<?php
/**
 * Title: Cabeçalho
 * Slug: bambu/cabecalho
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Logo, menu principal (vira "Menu" em tela cheia no celular e no tablet) e botão do WhatsApp. O item "Falar no WhatsApp" do menu só aparece com o menu aberto. Sem logo escolhido, o editor mostra um quadro vazio e o site mostra o logo provisório.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"className":"cabecalho","layout":{"type":"default"}} -->
<div class="wp-block-group cabecalho"><!-- wp:group {"className":"envelope cabecalho__linha","layout":{"type":"default"}} -->
<div class="wp-block-group envelope cabecalho__linha"><!-- wp:site-logo {"width":160} /-->

<!-- wp:navigation {"overlayMenu":"mobile","hasIcon":false,"overlayBackgroundColor":"papel","overlayTextColor":"noite","className":"nav-principal","layout":{"type":"flex","justifyContent":"right"}} -->
<!-- wp:navigation-link {"label":"Cursos","url":"<?php echo esc_url( bambu_url_pagina( 'cursos' ) ); ?>","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Quem somos","url":"<?php echo esc_url( bambu_url_pagina( 'quem-somos' ) ); ?>","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Depoimentos","url":"<?php echo esc_url( home_url( '/#depoimentos' ) ); ?>","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Blog","url":"<?php echo esc_url( bambu_url_blog() ); ?>","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Contato","url":"<?php echo esc_url( home_url( '/#contato' ) ); ?>","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Falar no WhatsApp","url":"<?php echo esc_url( bambu_wa() ); ?>","kind":"custom","isTopLevelLink":true,"className":"nav-wa"} /-->
<!-- /wp:navigation -->

<!-- wp:buttons {"className":"cabecalho__wa"} -->
<div class="wp-block-buttons cabecalho__wa"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa() ); ?>">Falar no WhatsApp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
