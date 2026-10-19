<?php
/**
 * Title: Rodapé
 * Slug: bambu/rodape
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Rodapé azul-noite com logo, frase, endereço, links, contatos, redes, CNPJ e o botão flutuante do WhatsApp.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"backgroundColor":"noite","textColor":"papel","className":"rodape","layout":{"type":"default"}} -->
<div class="wp-block-group rodape has-papel-color has-noite-background-color has-text-color has-background"><!-- wp:group {"className":"envelope","layout":{"type":"default"}} -->
<div class="wp-block-group envelope"><!-- wp:group {"className":"rodape__grade","layout":{"type":"default"}} -->
<div class="wp-block-group rodape__grade"><!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":180} /-->

<!-- wp:paragraph {"className":"rodape__frase"} -->
<p class="rodape__frase">Música no tempo de cada um, desde o primeiro som.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"rodape__endereco"} -->
<p class="rodape__endereco">R. Bom Pastor, 1077 · Ipiranga<br>São Paulo, SP · CEP 04203-051</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Navegue</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><a href="<?php echo esc_url( bambu_url_pagina( 'cursos' ) ); ?>">Cursos</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo esc_url( bambu_url_pagina( 'quem-somos' ) ); ?>">Quem somos</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo esc_url( home_url( '/#depoimentos' ) ); ?>">Depoimentos</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo esc_url( bambu_url_blog() ); ?>">Blog</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo esc_url( home_url( '/#contato' ) ); ?>">Contato</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo esc_url( bambu_url_pagina( 'trabalhe-conosco' ) ); ?>">Trabalhe conosco</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Fale com a gente</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><a href="<?php echo esc_url( bambu_wa() ); ?>">WhatsApp (11) 94079-3838</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="tel:+5511940061498">(11) 94006-1498</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="mailto:atendimento@bambumusicaearte.com.br">atendimento@bambumusicaearte.com.br</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Redes · @bambumusicaearte</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><a href="https://www.instagram.com/bambumusicaearte/">Instagram</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="https://www.facebook.com/bambumusicaearte/">Facebook</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="https://www.youtube.com/@bambumusicaearte">YouTube</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="https://br.pinterest.com/bambumusicaearte/">Pinterest</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"rodape__base","layout":{"type":"default"}} -->
<div class="wp-block-group rodape__base"><!-- wp:paragraph -->
<p>© 2026 Bambu Escola de Música e Arte. Todos os direitos reservados.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>CNPJ <span class="preencher">[PREENCHER: CNPJ]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"wa-flutuante"} -->
<div class="wp-block-buttons wa-flutuante"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa() ); ?>">WhatsApp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
