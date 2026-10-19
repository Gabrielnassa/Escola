<?php
/**
 * Title: Início: topo (hero)
 * Slug: bambu/hero
 * Categories: bambu
 * Description: Título principal, texto, botão do WhatsApp e foto da fachada.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"hero","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hero"><!-- wp:group {"className":"envelope hero__grade","layout":{"type":"default"}} -->
<div class="wp-block-group envelope hero__grade"><!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-sobretitulo sobretitulo--marca"} -->
<p class="is-style-sobretitulo sobretitulo--marca">Escola de música e arte no Ipiranga</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Música no<br><span class="nota-linha">tempo</span> de cada&nbsp;um.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero__texto"} -->
<p class="hero__texto">Aulas de instrumento e canto, musicalização infantil e musicoterapia, na nossa casa no Ipiranga ou na sua.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"hero__acoes","layout":{"type":"default"}} -->
<div class="wp-block-group hero__acoes"><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa() ); ?>">Conversar no WhatsApp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"link-nota"} -->
<p class="link-nota"><a href="#cursos"><span class="nota-linha">Ver os cursos</span></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"hero__numero"} -->
<p class="hero__numero">WhatsApp <a href="<?php echo esc_url( bambu_wa() ); ?>">(11) 94079-3838</a> · ou ligue <a href="tel:+5511940061498">(11) 94006-1498</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero__foto","layout":{"type":"default"}} -->
<div class="wp-block-group hero__foto"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-foto-dir"} -->
<figure class="wp-block-image size-full is-style-foto-dir"><img src="<?php echo esc_url( bambu_foto( 'fachada-fundadores' ) ); ?>" alt="Os fundadores da Bambu na porta da escola, uma casa branca antiga com colunas torcidas na entrada"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"is-style-bilhete"} -->
<p class="is-style-bilhete">a casa da Bambu, R. Bom Pastor 1077</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
