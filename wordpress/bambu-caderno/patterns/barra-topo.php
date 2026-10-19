<?php
/**
 * Title: Barra superior (endereço e WhatsApp)
 * Slug: bambu/barra-topo
 * Categories: header
 * Block Types: core/template-part/header
 * Inserter: no
 * Description: Faixa fina acima do cabeçalho com o endereço da escola e o WhatsApp.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"className":"barra-topo","layout":{"type":"default"}} -->
<div class="wp-block-group barra-topo"><!-- wp:group {"className":"envelope barra-topo__linha","layout":{"type":"default"}} -->
<div class="wp-block-group envelope barra-topo__linha"><!-- wp:paragraph -->
<p>Ipiranga · R. Bom Pastor, 1077</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="<?php echo esc_url( bambu_wa() ); ?>"><strong>WhatsApp</strong> (11) 94079-3838</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
