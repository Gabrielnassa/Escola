<?php
/**
 * Bambu Caderno: funções do tema.
 *
 * @package bambu-caderno
 */

defined( 'ABSPATH' ) || exit;

define( 'BAMBU_VERSAO', '1.0.0' );
define( 'BAMBU_WHATSAPP', '5511940793838' );

require get_template_directory() . '/inc/logo.php';
require get_template_directory() . '/inc/formularios.php';
require get_template_directory() . '/inc/seo.php';

/**
 * Link do WhatsApp com mensagem pronta.
 *
 * @param string $mensagem Texto que já aparece digitado na conversa.
 * @return string
 */
function bambu_wa( $mensagem = 'Olá! Vim pelo site da Bambu e queria conversar sobre as aulas.' ) {
	return 'https://wa.me/' . BAMBU_WHATSAPP . '?text=' . rawurlencode( $mensagem );
}

/**
 * Endereço de uma foto provisória do tema (assets/img/fotos/NOME.svg).
 * No editor, cada uma se troca pela foto real em "Substituir" → Biblioteca de mídia.
 *
 * @param string $nome Nome do arquivo, sem extensão.
 * @return string
 */
function bambu_foto( $nome ) {
	return get_theme_file_uri( 'assets/img/fotos/' . $nome . '.svg' );
}

/**
 * Folhas de estilo complementares (assets/css/extra-*.css), carregadas depois da principal.
 *
 * @return string[]
 */
function bambu_css_extras() {
	$lista = glob( get_theme_file_path( 'assets/css/extra-*.css' ) );
	return $lista ? $lista : array();
}

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'editor-styles' );
		add_editor_style( array_merge( array( 'assets/css/bambu.css' ), array_map( function ( $f ) { return 'assets/css/' . basename( $f ); }, bambu_css_extras() ) ) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array( 'flex-width' => true, 'flex-height' => true ) );
		// Os padrões do tema ficam em primeiro plano; os genéricos do WordPress saem da lista.
		remove_theme_support( 'core-block-patterns' );
	}
);

add_action(
	'wp_enqueue_scripts',
	function () {
		$css = get_theme_file_path( 'assets/css/bambu.css' );
		$js  = get_theme_file_path( 'assets/js/bambu.js' );
		wp_enqueue_style( 'bambu', get_theme_file_uri( 'assets/css/bambu.css' ), array(), (string) filemtime( $css ) );
		foreach ( bambu_css_extras() as $arquivo ) {
			wp_enqueue_style( 'bambu-' . basename( $arquivo, '.css' ), get_theme_file_uri( 'assets/css/' . basename( $arquivo ) ), array( 'bambu' ), (string) filemtime( $arquivo ) );
		}
		wp_enqueue_script(
			'bambu',
			get_theme_file_uri( 'assets/js/bambu.js' ),
			array(),
			(string) filemtime( $js ),
			array( 'in_footer' => true, 'strategy' => 'defer' )
		);
		wp_localize_script(
			'bambu',
			'bambuSite',
			array(
				'whatsapp'        => BAMBU_WHATSAPP,
				'whatsappVisivel' => '(11) 94079-3838',
				'blog'            => bambu_url_blog(),
			)
		);
	}
);

/* Marca o <html> com "js" o quanto antes, para as animações só esconderem o que o JS vai mostrar. */
add_action(
	'wp_head',
	function () {
		echo "<script>document.documentElement.classList.add('js')</script>\n";
	},
	1
);

/* Formatos de texto do tema no editor: "Linha magenta" e "[PREENCHER]". */
add_action(
	'enqueue_block_editor_assets',
	function () {
		$js = get_theme_file_path( 'assets/js/editor.js' );
		wp_enqueue_script(
			'bambu-editor',
			get_theme_file_uri( 'assets/js/editor.js' ),
			array( 'wp-rich-text', 'wp-block-editor', 'wp-element', 'wp-i18n' ),
			(string) filemtime( $js ),
			true
		);
	}
);

add_action(
	'init',
	function () {
		register_block_pattern_category( 'bambu', array( 'label' => 'Bambu: página inicial' ) );
		register_block_pattern_category( 'bambu-paginas', array( 'label' => 'Bambu: páginas' ) );

		$estilos = array(
			'core/image'     => array(
				'foto-esq'  => 'Foto colada (inclinada para a esquerda)',
				'foto-dir'  => 'Foto colada (inclinada para a direita)',
				'foto-reta' => 'Foto colada (reta)',
			),
			'core/button'    => array(
				'noite' => 'Azul-noite',
				'papel' => 'Papel',
			),
			'core/paragraph' => array(
				'sobretitulo' => 'Sobretítulo',
				'bilhete'     => 'Bilhete (letra de mão)',
			),
			'core/heading'   => array(
				'sobretitulo' => 'Sobretítulo',
			),
			'core/separator' => array(
				'pauta' => 'Pauta (5 linhas)',
			),
			'core/list'      => array(
				'catavento' => 'Cata-vento',
			),
			'core/quote'     => array(
				'recado' => 'Bilhete no mural',
			),
		);
		foreach ( $estilos as $bloco => $lista ) {
			foreach ( $lista as $nome => $rotulo ) {
				register_block_style( $bloco, array( 'name' => $nome, 'label' => $rotulo ) );
			}
		}
	}
);

/**
 * Endereço de uma página do site pelo slug (ex.: "cursos"), com /cursos/ como reserva.
 *
 * @param string $slug Slug da página.
 * @return string
 */
function bambu_url_pagina( $slug ) {
	$pagina = get_page_by_path( $slug );
	return $pagina ? get_permalink( $pagina ) : home_url( '/' . $slug . '/' );
}

/**
 * Endereço da página de posts (Configurações → Leitura), com /blog/ como reserva.
 *
 * @return string
 */
function bambu_url_blog() {
	$id = (int) get_option( 'page_for_posts' );
	return $id ? get_permalink( $id ) : home_url( '/blog/' );
}

/*
 * Páginas montadas com os padrões "Bambu: páginas" já trazem o próprio título (h1) e as seções
 * de largura total. Se a página não tiver um modelo escolhido à mão, ela usa "Página livre"
 * em vez do modelo comum, que acrescentaria um segundo título.
 */
add_filter(
	'page_template_hierarchy',
	function ( $modelos ) {
		$pagina = get_queried_object();
		if ( $pagina instanceof WP_Post && ! get_page_template_slug( $pagina ) && false !== strpos( $pagina->post_content, 'cabeca-pagina' ) ) {
			array_unshift( $modelos, 'pagina-livre.php' );
		}
		return $modelos;
	}
);

/* A busca do site procura nos posts do blog (a lista de resultados é a do blog). */
add_action(
	'pre_get_posts',
	function ( $consulta ) {
		if ( ! is_admin() && $consulta->is_main_query() && $consulta->is_search() ) {
			$consulta->set( 'post_type', 'post' );
		}
	}
);

/* Nomes para as áreas de navegação, para quem usa leitor de tela. */
add_filter(
	'render_block',
	function ( $html, $bloco ) {
		$classe = isset( $bloco['attrs']['className'] ) ? $bloco['attrs']['className'] : '';
		$nome   = '';
		if ( 'core/navigation' === $bloco['blockName'] && false !== strpos( $classe, 'nav-principal' ) ) {
			$nome = 'Principal';
		} elseif ( 'core/group' === $bloco['blockName'] && false !== strpos( $classe, 'rodape__nav' ) ) {
			$nome = 'Rodapé';
		}
		if ( $nome && class_exists( 'WP_HTML_Tag_Processor' ) ) {
			$tags = new WP_HTML_Tag_Processor( $html );
			if ( $tags->next_tag( 'nav' ) ) {
				$tags->set_attribute( 'aria-label', $nome );
				$html = $tags->get_updated_html();
			}
		}
		return $html;
	},
	10,
	2
);
