<?php
/**
 * Gera a prévia estática do tema (um único arquivo HTML) usando os próprios
 * templates do tema, sem precisar de WordPress.
 *
 * Uso: php tools/render-preview.php [saida.html]
 */

define( 'BAMBU_PREVIEW', true );

$theme_dir = dirname( __DIR__ ) . '/wordpress/bambu-musica-e-arte';
$out_file  = isset( $argv[1] ) ? $argv[1] : dirname( __DIR__ ) . '/preview/index.html';

/* ---- Substitutos mínimos das funções do WordPress ---------------------- */
function get_template_directory() { global $theme_dir; return $theme_dir; }
function get_template_directory_uri() { return '.'; }
function add_action() {}
function add_filter() {}
function get_theme_mod( $name, $default = false ) { return $default; }
function esc_html( $s ) { return htmlspecialchars( (string) $s, ENT_QUOTES, 'UTF-8' ); }
function esc_attr( $s ) { return htmlspecialchars( (string) $s, ENT_QUOTES, 'UTF-8', false ); }
function esc_url( $s ) { return htmlspecialchars( str_replace( ' ', '%20', (string) $s ), ENT_QUOTES, 'UTF-8' ); }
function esc_url_raw( $s ) { return (string) $s; }
function __( $s ) { return $s; }
function home_url( $path = '' ) { return $path ? $path : '#inicio'; }
function admin_url( $path = '' ) { return '#'; }
function get_bloginfo( $key = 'name' ) { return 'Bambu Música e Arte'; }
function bloginfo( $key ) { echo 'charset' === $key ? 'UTF-8' : esc_html( get_bloginfo( $key ) ); }
function language_attributes() { echo 'lang="pt-BR"'; }
function body_class() { echo 'class="home preview"'; }
function wp_body_open() {}
function has_nav_menu() { return false; }
function wp_nav_menu() {}
function has_custom_logo() { return false; }
function the_custom_logo() {}
function is_front_page() { return true; }
function sanitize_key( $s ) { return strtolower( preg_replace( '/[^a-z0-9_\-]/i', '', $s ) ); }
function wp_unslash( $s ) { return $s; }
function wp_nonce_field() {}
function do_shortcode( $s ) { return $s; }
function get_posts() { return array(); }
function get_option() { return 0; }
function wp_strip_all_tags( $s ) { return trim( strip_tags( $s ) ); }

function get_template_part( $slug ) {
	global $theme_dir;
	include $theme_dir . '/' . $slug . '.php';
}
function get_header() { global $theme_dir; include $theme_dir . '/header.php'; }
function get_footer() { global $theme_dir; include $theme_dir . '/footer.php'; }

function wp_head() {
	global $theme_dir;
	echo '<title>Bambu Música e Arte — Escola de Música em São Paulo</title>' . "\n";
	echo '<meta name="description" content="Escola de música no Ipiranga, São Paulo. Aulas de instrumento e canto na escola, em domicílio e online, música inclusiva e musicoterapia.">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	echo '<link rel="stylesheet" href="' . esc_url( bambu_fonts_url() ) . '">' . "\n";
	echo "<style>\n" . file_get_contents( $theme_dir . '/assets/css/main.css' ) . "</style>\n";
}
function wp_footer() {
	global $theme_dir;
	echo "<script>\n" . file_get_contents( $theme_dir . '/assets/js/main.js' ) . "</script>\n";
}

/* ---- Renderização ------------------------------------------------------ */
require $theme_dir . '/functions.php';

ob_start();
include $theme_dir . '/front-page.php';
$html = ob_get_clean();

file_put_contents( $out_file, $html );
fwrite( STDOUT, 'Prévia gerada em ' . $out_file . ' (' . strlen( $html ) . " bytes)\n" );
