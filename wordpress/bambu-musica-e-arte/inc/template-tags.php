<?php
/**
 * Funções usadas pelos templates.
 *
 * @package Bambu
 */

/**
 * Está rodando na prévia estática (tools/render-preview.php)?
 *
 * @return bool
 */
function bambu_is_preview() {
	return defined( 'BAMBU_PREVIEW' ) && BAMBU_PREVIEW;
}

/**
 * Estilo de fundo com imagem e gradiente de reserva (se a imagem não
 * carregar, o gradiente continua aparecendo).
 *
 * @param string $image   URL da imagem.
 * @param string $overlay Gradiente sobre a imagem.
 * @return string
 */
function bambu_bg_style( $image, $overlay = '' ) {
	$layers = array();
	if ( $overlay ) {
		$layers[] = $overlay;
	}
	if ( $image ) {
		$layers[] = 'url(' . esc_url( $image ) . ')';
	}
	$layers[] = 'linear-gradient(135deg, #1d4a2a 0%, #3d8b3d 55%, #a4c639 100%)';
	return 'background-image:' . implode( ',', $layers ) . ';';
}

/**
 * Logo: usa o logo enviado em Personalizar > Identidade do site ou o logo SVG do tema.
 *
 * @param string $variant "dark" (fundo claro) ou "light" (fundo escuro).
 */
function bambu_logo( $variant = 'dark' ) {
	if ( 'dark' === $variant && function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	?>
	<a class="brand brand--<?php echo esc_attr( $variant ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		<span class="brand__mark"><?php echo bambu_icon( 'bambu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
		<span class="brand__text">
			<strong>Bambu</strong>
			<small>Música e Arte</small>
		</span>
	</a>
	<?php
}

/**
 * Ícones das redes sociais preenchidas no Personalizar.
 *
 * @param string $class Classe do <ul>.
 */
function bambu_social_links( $class = 'social' ) {
	$networks = array(
		'instagram' => 'Instagram',
		'facebook'  => 'Facebook',
		'youtube'   => 'YouTube',
	);
	echo '<ul class="' . esc_attr( $class ) . '">';
	foreach ( $networks as $key => $label ) {
		$url = bambu_opt( $key );
		if ( ! $url ) {
			continue;
		}
		printf(
			'<li><a href="%1$s" target="_blank" rel="noopener" aria-label="%2$s">%3$s</a></li>',
			esc_url( $url ),
			esc_attr( $label ),
			bambu_icon( $key ) // phpcs:ignore WordPress.Security.EscapeOutput
		);
	}
	printf(
		'<li><a href="%1$s" target="_blank" rel="noopener" aria-label="WhatsApp">%2$s</a></li>',
		esc_url( bambu_whatsapp_url() ),
		bambu_icon( 'whatsapp' ) // phpcs:ignore WordPress.Security.EscapeOutput
	);
	echo '</ul>';
}

/**
 * Cursos: os cadastrados em Cursos no painel ou a lista padrão.
 *
 * @return array
 */
function bambu_get_courses() {
	$posts = bambu_is_preview() ? array() : get_posts(
		array(
			'post_type'      => 'curso',
			'posts_per_page' => 24,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
		)
	);

	if ( empty( $posts ) ) {
		return bambu_default_courses();
	}

	$courses = array();
	foreach ( $posts as $post ) {
		$courses[] = array(
			'icon'  => get_post_meta( $post->ID, '_bambu_icon', true ),
			'title' => get_the_title( $post ),
			'text'  => get_the_excerpt( $post ),
			'tag'   => get_post_meta( $post->ID, '_bambu_tag', true ),
			'url'   => get_permalink( $post ),
		);
	}
	return $courses;
}

/**
 * Depoimentos cadastrados no painel (ou exemplos na prévia).
 *
 * @return array
 */
function bambu_get_testimonials() {
	if ( bambu_is_preview() ) {
		return bambu_preview_testimonials();
	}

	$items = array();
	$posts = get_posts(
		array(
			'post_type'      => 'depoimento',
			'posts_per_page' => 12,
		)
	);
	foreach ( $posts as $post ) {
		$items[] = array(
			'text' => wp_strip_all_tags( $post->post_content ),
			'name' => get_the_title( $post ),
			'role' => get_post_meta( $post->ID, '_bambu_role', true ),
		);
	}
	return $items;
}

/**
 * Últimos posts do blog para a página inicial.
 *
 * @return array
 */
function bambu_get_latest_posts() {
	if ( bambu_is_preview() ) {
		return bambu_preview_posts();
	}

	$items = array();
	$posts = get_posts(
		array(
			'post_type'           => 'post',
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
		)
	);
	foreach ( $posts as $post ) {
		$cats    = get_the_category( $post->ID );
		$items[] = array(
			'title' => get_the_title( $post ),
			'text'  => get_the_excerpt( $post ),
			'date'  => get_the_date( 'd M Y', $post ),
			'cat'   => $cats ? $cats[0]->name : '',
			'image' => get_the_post_thumbnail_url( $post, 'bambu-card' ),
			'url'   => get_permalink( $post ),
		);
	}
	return $items;
}

/**
 * Link da página do blog.
 *
 * @return string
 */
function bambu_blog_url() {
	$page_for_posts = (int) get_option( 'page_for_posts' );
	return $page_for_posts ? get_permalink( $page_for_posts ) : home_url( '/blog/' );
}

/**
 * Menu padrão (usado até um menu ser criado em Aparência > Menus).
 */
function bambu_menu_fallback() {
	$home    = bambu_is_preview() ? '' : home_url( '/' );
	$courses = bambu_default_courses();
	?>
	<ul id="menu-principal" class="menu">
		<li class="menu-item current-menu-item"><a href="<?php echo esc_url( $home . '#inicio' ); ?>">Início</a></li>
		<li class="menu-item"><a href="<?php echo esc_url( $home . '#sobre' ); ?>">Quem somos</a></li>
		<li class="menu-item menu-item-has-children">
			<a href="<?php echo esc_url( $home . '#cursos' ); ?>">Cursos</a>
			<ul class="sub-menu">
				<?php foreach ( array_slice( $courses, 0, 6 ) as $course ) : ?>
					<li class="menu-item"><a href="<?php echo esc_url( $home . '#cursos' ); ?>"><?php echo esc_html( $course['title'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</li>
		<li class="menu-item"><a href="<?php echo esc_url( $home . '#inclusao' ); ?>">Musicoterapia</a></li>
		<li class="menu-item"><a href="<?php echo esc_url( $home . '#escolas' ); ?>">Para escolas</a></li>
		<li class="menu-item"><a href="<?php echo esc_url( bambu_is_preview() ? '#blog' : bambu_blog_url() ); ?>">Blog</a></li>
		<li class="menu-item"><a href="<?php echo esc_url( $home . '#contato' ); ?>">Contato</a></li>
	</ul>
	<?php
}

/**
 * Faixa de título das páginas internas (com "Início / Página").
 *
 * @param string $title    Título.
 * @param string $subtitle Subtítulo opcional.
 */
function bambu_page_header( $title, $subtitle = '' ) {
	$image = has_post_thumbnail() && is_singular() ? get_the_post_thumbnail_url( null, 'full' ) : bambu_opt( 'slide1_image' );
	?>
	<section class="page-hero" style="<?php echo esc_attr( bambu_bg_style( $image, 'linear-gradient(90deg, rgba(18,46,27,.92) 0%, rgba(18,46,27,.65) 100%)' ) ); ?>">
		<div class="container">
			<nav class="breadcrumb" aria-label="Você está em">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Início</a>
				<span aria-hidden="true">/</span>
				<span><?php echo esc_html( wp_strip_all_tags( $title ) ); ?></span>
			</nav>
			<h1><?php echo esc_html( wp_strip_all_tags( $title ) ); ?></h1>
			<?php if ( $subtitle ) : ?>
				<p><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>
		</div>
	</section>
	<?php
}
