<?php
/**
 * Title: Página: Cursos
 * Slug: bambu/pagina-cursos
 * Categories: bambu-paginas
 * Block Types: core/post-content
 * Post Types: page
 * Description: Página Cursos completa: cabeçalho com o índice dos seis cursos, a ficha de cada curso (para quem é, como funciona, onde acontece) e a chamada final para o WhatsApp.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"metadata":{"name":"Cabeçalho da página"},"tagName":"header","align":"full","className":"cabeca-pagina","layout":{"type":"default"}} -->
<header class="wp-block-group alignfull cabeca-pagina"><!-- wp:group {"className":"envelope","layout":{"type":"default"}} -->
<div class="wp-block-group envelope"><!-- wp:paragraph {"className":"is-style-sobretitulo"} -->
<p class="is-style-sobretitulo">Cursos</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">O que a gente ensina, curso por curso</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"cabeca-pagina__intro"} -->
<p class="cabeca-pagina__intro">São seis cursos com um jeito só de ensinar: começar pelo que o aluno já vive e seguir no ritmo dele. Aqui você vê para quem é cada um, como funciona e onde acontece.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"metadata":{"name":"Índice dos cursos"},"className":"indice-cursos"} -->
<ul class="wp-block-list indice-cursos"><!-- wp:list-item {"className":"cor-individuais"} -->
<li class="cor-individuais"><a href="#aulas-individuais"><strong>01</strong> Aulas individuais</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item {"className":"cor-grupo"} -->
<li class="cor-grupo"><a href="#aulas-em-grupo"><strong>02</strong> Aulas em grupo</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item {"className":"cor-musicalizacao"} -->
<li class="cor-musicalizacao"><a href="#musicalizacao-infantil"><strong>03</strong> Musicalização infantil</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item {"className":"cor-musicoterapia"} -->
<li class="cor-musicoterapia"><a href="#musicoterapia"><strong>04</strong> Musicoterapia</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item {"className":"cor-consultoria"} -->
<li class="cor-consultoria"><a href="#consultoria"><strong>05</strong> Consultoria para escolas e colégios</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item {"className":"cor-profissionais"} -->
<li class="cor-profissionais"><a href="#profissionais"><strong>06</strong> Cursos para profissionais</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Cursos"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"metadata":{"name":"Para alunos (01 a 04)"},"className":"envelope grupo-cursos","layout":{"type":"default"}} -->
<div class="wp-block-group envelope grupo-cursos"><!-- wp:heading {"className":"grupo-cursos__titulo"} -->
<h2 class="wp-block-heading grupo-cursos__titulo">Para alunos</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"01 Aulas individuais"},"tagName":"section","anchor":"aulas-individuais","className":"curso-detalhe cor-individuais","layout":{"type":"default"}} -->
<section id="aulas-individuais" class="wp-block-group curso-detalhe cor-individuais"><!-- wp:group {"className":"curso-detalhe__topo","layout":{"type":"default"}} -->
<div class="wp-block-group curso-detalhe__topo"><!-- wp:paragraph {"className":"curso__num"} -->
<p class="curso__num">01</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Aulas individuais</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"curso-detalhe__resumo"} -->
<p class="curso-detalhe__resumo">Instrumento ou canto, com o professor só para você, no seu ritmo.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"etiquetas"} -->
<ul class="wp-block-list etiquetas"><!-- wp:list-item -->
<li>Individual</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Na escola</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>A domicílio</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa( 'Olá! Quero saber mais sobre aulas individuais.' ) ); ?>">Quero saber mais</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha"><!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Para quem é</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Crianças, jovens e adultos que querem aprender um instrumento ou cantar. Ninguém precisa chegar sabendo.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Como funciona</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">A aula é só sua com o professor. O conteúdo parte do que você já ouve e vive, e o ritmo é o seu, sem pressa.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Instrumentos</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: instrumentos e canto oferecidos]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Onde acontece</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Na escola, no Ipiranga, ou a domicílio.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Faixa etária</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Não existe idade limite para aprender. <span class="preencher">[PREENCHER: idade mínima, se houver]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Duração e frequência</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: duração da aula e aulas por semana]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"02 Aulas em grupo"},"tagName":"section","anchor":"aulas-em-grupo","className":"curso-detalhe cor-grupo","layout":{"type":"default"}} -->
<section id="aulas-em-grupo" class="wp-block-group curso-detalhe cor-grupo"><!-- wp:group {"className":"curso-detalhe__topo","layout":{"type":"default"}} -->
<div class="wp-block-group curso-detalhe__topo"><!-- wp:paragraph {"className":"curso__num"} -->
<p class="curso__num">02</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Aulas em grupo</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"curso-detalhe__resumo"} -->
<p class="curso-detalhe__resumo">Aprender junto, tocando e ouvindo os outros. As aulas em grupo acontecem na escola.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"etiquetas"} -->
<ul class="wp-block-list etiquetas"><!-- wp:list-item -->
<li>Em grupo</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Na escola</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa( 'Olá! Quero saber mais sobre aulas em grupo.' ) ); ?>">Quero saber mais</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha"><!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Para quem é</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Quem gosta de aprender com outras pessoas. Há aulas em grupo para todas as idades.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Como funciona</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">O aprendizado é colaborativo: cada aluno aprende tocando, ouvindo e trocando com a turma. <span class="preencher">[PREENCHER: instrumentos ou formatos das turmas e número de alunos por turma]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Onde acontece</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Na escola, na casa da R. Bom Pastor, 1077.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Faixa etária</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Todas as idades. <span class="preencher">[PREENCHER: como as turmas são divididas por idade]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Duração e frequência</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: duração da aula e aulas por semana]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"03 Musicalização infantil"},"tagName":"section","anchor":"musicalizacao-infantil","className":"curso-detalhe cor-musicalizacao","layout":{"type":"default"}} -->
<section id="musicalizacao-infantil" class="wp-block-group curso-detalhe cor-musicalizacao"><!-- wp:group {"className":"curso-detalhe__topo","layout":{"type":"default"}} -->
<div class="wp-block-group curso-detalhe__topo"><!-- wp:paragraph {"className":"curso__num"} -->
<p class="curso__num">03</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Musicalização infantil</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"curso-detalhe__resumo"} -->
<p class="curso-detalhe__resumo">Uma aula lúdica, cheia de instrumentos e sons, para a criança brincar com a música.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"etiquetas"} -->
<ul class="wp-block-list etiquetas"><!-- wp:list-item -->
<li>Em grupo, na escola</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Individual, a domicílio</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa( 'Olá! Quero saber mais sobre musicalização infantil.' ) ); ?>">Quero saber mais</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha"><!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Para quem é</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Crianças.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Como funciona</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">A aula usa vários instrumentos e sons e estimula os sentidos, a psicomotricidade e a coordenação. Tudo acontece de forma lúdica, no tempo da criança.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Onde acontece</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Em grupo, na escola, ou individual, a domicílio.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Faixa etária</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: idades atendidas na musicalização]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Duração e frequência</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: duração da aula e aulas por semana]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"04 Musicoterapia"},"tagName":"section","anchor":"musicoterapia","className":"curso-detalhe cor-musicoterapia","layout":{"type":"default"}} -->
<section id="musicoterapia" class="wp-block-group curso-detalhe cor-musicoterapia"><!-- wp:group {"className":"curso-detalhe__topo","layout":{"type":"default"}} -->
<div class="wp-block-group curso-detalhe__topo"><!-- wp:paragraph {"className":"curso__num"} -->
<p class="curso__num">04</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Musicoterapia</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"curso-detalhe__resumo"} -->
<p class="curso-detalhe__resumo">A música como caminho para desenvolver potenciais e restaurar funções.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"etiquetas"} -->
<ul class="wp-block-list etiquetas"><!-- wp:list-item -->
<li><span class="preencher">[PREENCHER: formato e local]</span></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa( 'Olá! Quero saber mais sobre musicoterapia.' ) ); ?>">Quero saber mais</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha"><!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Para quem é</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Pessoas que podem se beneficiar da música para trabalhar necessidades mentais, sociais e cognitivas. <span class="preencher">[PREENCHER: público atendido]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Como funciona</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">A musicoterapia usa a música para trabalhar essas necessidades, desenvolvendo potenciais e restaurando funções. <span class="preencher">[PREENCHER: como é o primeiro encontro e o acompanhamento]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Também na Bambu</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Cursos de música especializados para crianças e adultos com deficiência, e psicopedagogia.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Onde acontece</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: na escola, a domicílio ou ambos]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Faixa etária</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: idades atendidas]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Duração e frequência</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: duração da sessão e sessões por semana]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Para escolas e educadores (05 e 06)"},"className":"envelope grupo-cursos","layout":{"type":"default"}} -->
<div class="wp-block-group envelope grupo-cursos"><!-- wp:heading {"className":"grupo-cursos__titulo"} -->
<h2 class="wp-block-heading grupo-cursos__titulo">Para escolas e educadores</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"05 Consultoria para escolas e colégios"},"tagName":"section","anchor":"consultoria","className":"curso-detalhe cor-consultoria","layout":{"type":"default"}} -->
<section id="consultoria" class="wp-block-group curso-detalhe cor-consultoria"><!-- wp:group {"className":"curso-detalhe__topo","layout":{"type":"default"}} -->
<div class="wp-block-group curso-detalhe__topo"><!-- wp:paragraph {"className":"curso__num"} -->
<p class="curso__num">05</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Consultoria para escolas e colégios</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"curso-detalhe__resumo"} -->
<p class="curso-detalhe__resumo">Música na escola, pensada para a escola.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"etiquetas"} -->
<ul class="wp-block-list etiquetas"><!-- wp:list-item -->
<li>Escolas e colégios</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa( 'Olá! Quero saber mais sobre consultoria para escolas e colégios.' ) ); ?>">Quero saber mais</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha"><!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Para quem é</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Escolas e colégios que querem estruturar ou rever o ensino de música.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Como funciona</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">A gente faz um mapeamento do conteúdo de música da escola e monta propostas pedagógicas sob medida para ela.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Onde acontece</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: presencial na escola, a distância ou ambos]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Segmentos</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: segmentos atendidos, ex.: educação infantil e fundamental]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Duração</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: duração e etapas da consultoria]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"06 Cursos para profissionais"},"tagName":"section","anchor":"profissionais","className":"curso-detalhe cor-profissionais","layout":{"type":"default"}} -->
<section id="profissionais" class="wp-block-group curso-detalhe cor-profissionais"><!-- wp:group {"className":"curso-detalhe__topo","layout":{"type":"default"}} -->
<div class="wp-block-group curso-detalhe__topo"><!-- wp:paragraph {"className":"curso__num"} -->
<p class="curso__num">06</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Cursos para profissionais</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"curso-detalhe__resumo"} -->
<p class="curso-detalhe__resumo">Como levar a música para o dia a dia da sala de aula.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"etiquetas"} -->
<ul class="wp-block-list etiquetas"><!-- wp:list-item -->
<li>Professores</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Estudantes</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa( 'Olá! Quero saber mais sobre cursos para profissionais.' ) ); ?>">Quero saber mais</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha"><!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Para quem é</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Professores e estudantes de música e de pedagogia.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Como funciona</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Cursos sobre como usar a música no cotidiano da sala de aula. <span class="preencher">[PREENCHER: temas, formato e carga horária]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Onde acontece</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: local ou formato on-line]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Faixa etária</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor">Adultos: profissionais e estudantes da área.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"ficha__linha","layout":{"type":"default"}} -->
<div class="wp-block-group ficha__linha"><!-- wp:paragraph {"className":"ficha__rotulo"} -->
<p class="ficha__rotulo">Duração e datas</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"ficha__valor"} -->
<p class="ficha__valor"><span class="preencher">[PREENCHER: duração e próximas turmas]</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Chamada final"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"className":"envelope chamada-final__envelope","layout":{"type":"default"}} -->
<div class="wp-block-group envelope chamada-final__envelope"><!-- wp:group {"className":"chamada-final","layout":{"type":"default"}} -->
<div class="wp-block-group chamada-final"><!-- wp:paragraph -->
<p>Ficou em dúvida sobre qual curso faz sentido? A gente ajuda a escolher.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( bambu_wa() ); ?>">Conversar no WhatsApp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
