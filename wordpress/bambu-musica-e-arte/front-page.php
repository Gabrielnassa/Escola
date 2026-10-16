<?php
/**
 * Página inicial (layout institucional de escola).
 *
 * @package Bambu
 */

get_header();

$sections = array( 'hero', 'quick-links', 'about', 'courses', 'values', 'inclusion', 'schools', 'testimonials', 'blog', 'cta', 'contact' );
foreach ( $sections as $section ) {
	get_template_part( 'template-parts/home/' . $section );
}

get_footer();
