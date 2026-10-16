<?php
/**
 * Funções do tema Bambu Música e Arte.
 *
 * @package Bambu
 */

if ( ! defined( 'BAMBU_VERSION' ) ) {
	define( 'BAMBU_VERSION', '1.0.0' );
}

require get_template_directory() . '/inc/icons.php';
require get_template_directory() . '/inc/defaults.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/contact-form.php';

/**
 * Recursos do tema.
 */
function bambu_setup() {
	load_theme_textdomain( 'bambu', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 360,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_image_size( 'bambu-card', 720, 480, true );

	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'bambu' ),
			'footer'  => __( 'Menu do rodapé', 'bambu' ),
		)
	);
}
add_action( 'after_setup_theme', 'bambu_setup' );

/**
 * Fontes, CSS e JS.
 */
function bambu_assets() {
	wp_enqueue_style( 'bambu-fonts', bambu_fonts_url(), array(), null );
	wp_enqueue_style( 'bambu-main', get_template_directory_uri() . '/assets/css/main.css', array(), BAMBU_VERSION );
	wp_enqueue_script( 'bambu-main', get_template_directory_uri() . '/assets/js/main.js', array(), BAMBU_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bambu_assets' );

/**
 * URL do Google Fonts usado pelo tema.
 *
 * @return string
 */
function bambu_fonts_url() {
	return 'https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@500;600;700;800&display=swap';
}

/**
 * Resumo mais curto nos cards do blog.
 */
function bambu_excerpt_length() {
	return 22;
}
add_filter( 'excerpt_length', 'bambu_excerpt_length' );

function bambu_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'bambu_excerpt_more' );
