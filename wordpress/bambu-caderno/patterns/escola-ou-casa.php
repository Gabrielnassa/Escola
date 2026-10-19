<?php
/**
 * Title: Início: na escola ou na sua casa
 * Slug: bambu/escola-ou-casa
 * Categories: bambu
 * Description: Os dois formatos de aula (na Bambu e a domicílio), com foto, lista do que acontece em cada um e link.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"secao formatos","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull secao formatos"><!-- wp:group {"className":"envelope","layout":{"type":"default"}} -->
<div class="wp-block-group envelope"><!-- wp:paragraph {"className":"is-style-sobretitulo"} -->
<p class="is-style-sobretitulo">Dois jeitos de ter aula</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Na escola ou na sua casa</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"formatos__grade","layout":{"type":"default"}} -->
<div class="wp-block-group formatos__grade"><!-- wp:group {"tagName":"article","className":"formato","layout":{"type":"default"}} -->
<article class="wp-block-group formato"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-foto-esq"} -->
<figure class="wp-block-image size-full is-style-foto-esq"><img src="<?php echo esc_url( bambu_foto( 'sala-de-aula' ) ); ?>" alt="Sala de aula da Bambu, com instrumentos"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Na Bambu</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Uma casa branca antiga no Ipiranga, com colunas torcidas na entrada. As aulas em grupo e a musicalização em grupo acontecem aqui.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-catavento"} -->
<ul class="wp-block-list is-style-catavento"><!-- wp:list-item -->
<li>Aulas individuais de instrumento e canto</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Aulas em grupo, para todas as idades</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Musicalização infantil em grupo</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph {"className":"formato__rodape link"} -->
<p class="formato__rodape link">R. Bom Pastor, 1077 · Ipiranga · CEP 04203-051<br><a href="https://www.google.com/maps/search/?api=1&amp;query=R.+Bom+Pastor%2C+1077+-+Ipiranga%2C+S%C3%A3o+Paulo+-+SP%2C+04203-051">Como chegar</a></p>
<!-- /wp:paragraph --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"formato","layout":{"type":"default"}} -->
<article class="wp-block-group formato"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-foto-dir"} -->
<figure class="wp-block-image size-full is-style-foto-dir"><img src="<?php echo esc_url( bambu_foto( 'aula-domicilio' ) ); ?>" alt="Professora da Bambu dando aula na casa de um aluno"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">A domicílio</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>O professor vai até você, e o horário se adapta à rotina da casa.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-catavento"} -->
<ul class="wp-block-list is-style-catavento"><!-- wp:list-item -->
<li>Aulas individuais de instrumento e canto</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Musicalização infantil individual</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph {"className":"formato__rodape link"} -->
<p class="formato__rodape link">Região atendida: <span class="preencher">[PREENCHER: bairros ou região atendida a domicílio]</span><br><a href="<?php echo esc_url( bambu_wa( 'Olá! Queria saber sobre aulas a domicílio.' ) ); ?>">Perguntar sobre o meu bairro</a></p>
<!-- /wp:paragraph --></article>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
