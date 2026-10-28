<?php
/**
 * Logo provisório: aparece no bloco "Logo do site" enquanto nenhum logo for escolhido.
 * Para usar o logo oficial, clique no logo no editor e escolha a imagem na biblioteca de mídia.
 *
 * @package bambu-caderno
 */

defined( 'ABSPATH' ) || exit;

/**
 * Marcação do logo provisório: cata-vento de colcheias + "BAMBU" + "Música & Arte".
 *
 * @return string
 */
function bambu_logo_provisorio() {
	$pa = '<g><ellipse cx="-5" cy="-33" rx="9.5" ry="7" transform="rotate(-20 -5 -33)"/><rect x="2.2" y="-34" width="3.6" height="31" rx="1.2"/><path d="M5.8-3.5C6.5-12 16-14.5 19.5-25 23.5-15 16.5-8.5 5.8-9.5Z"/></g>';
	$svg = '<svg class="logo-bambu__catavento" viewBox="-50 -50 100 100" aria-hidden="true" focusable="false">'
		. str_replace( '<g>', '<g fill="var(--azul)">', $pa )
		. str_replace( '<g>', '<g fill="var(--verde)" transform="rotate(90)">', $pa )
		. str_replace( '<g>', '<g fill="var(--magenta)" transform="rotate(180)">', $pa )
		. str_replace( '<g>', '<g fill="var(--coral)" transform="rotate(270)">', $pa )
		. '</svg>';

	return sprintf(
		'<a class="logo-bambu" href="%1$s" rel="home" aria-label="%2$s">%3$s<span class="logo-bambu__nome" aria-hidden="true"><span class="logo-bambu__bambu">BAMBU</span><span class="logo-bambu__sub">Música &amp; Arte</span></span></a>',
		esc_url( home_url( '/' ) ),
		esc_attr( get_bloginfo( 'name' ) . ', página inicial' ),
		$svg
	);
}

add_filter(
	'render_block_core/site-logo',
	function ( $conteudo, $bloco ) {
		if ( trim( $conteudo ) !== '' ) {
			return $conteudo;
		}
		$classe = 'wp-block-site-logo';
		if ( ! empty( $bloco['attrs']['className'] ) ) {
			$classe .= ' ' . $bloco['attrs']['className'];
		}
		return '<div class="' . esc_attr( $classe ) . '">' . bambu_logo_provisorio() . '</div>';
	},
	10,
	2
);
