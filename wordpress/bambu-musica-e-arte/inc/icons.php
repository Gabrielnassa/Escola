<?php
/**
 * Ícones SVG do tema (traço, 24x24).
 *
 * @package Bambu
 */

/**
 * Lista de ícones disponíveis. A chave é usada nos cursos e no Personalizar.
 *
 * @return array
 */
function bambu_icon_paths() {
	return array(
		'nota'        => '<path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/>',
		'piano'       => '<rect x="2.5" y="4" width="19" height="16" rx="2"/><path d="M7.5 4v16M12 4v16M16.5 4v16"/><path d="M6 4h3v9H6zM10.5 4h3v9h-3zM15 4h3v9h-3z" fill="currentColor" stroke="none"/>',
		'violao'      => '<path d="m11.9 12.1 4.5-4.5"/><path d="M20.1 2.3a1 1 0 0 0-1.4 0l-1.1 1.1a2 2 0 0 0-.6 1.4v1.4a2 2 0 0 1-.6 1.4 2 2 0 0 1 1.4-.6h1.4a2 2 0 0 0 1.4-.6l1.1-1.1a1 1 0 0 0 0-1.4z"/><path d="m6 16 2 2"/><path d="M8.2 9.9C8.7 8.8 9.8 8 11 8c2.8 0 5 2.2 5 5 0 1.2-.8 2.3-1.9 2.8l-.9.4A2 2 0 0 0 12 18a4 4 0 0 1-4 4c-3.3 0-6-2.7-6-6a4 4 0 0 1 4-4 2 2 0 0 0 1.8-1.2z"/>',
		'microfone'   => '<rect x="9" y="2" width="6" height="12" rx="3"/><path d="M19 10v1a7 7 0 0 1-14 0v-1M12 18v4M8 22h8"/>',
		'bateria'     => '<path d="m2 2 8 8M22 2l-8 8"/><ellipse cx="12" cy="9" rx="10" ry="5"/><path d="M7 13.4v7.9M12 14v8M17 13.4v7.9"/><path d="M2 9v8a10 5 0 0 0 20 0V9"/>',
		'crianca'     => '<circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><path d="M9 9h.01M15 9h.01"/>',
		'coracao'     => '<path d="M19 14c1.5-1.5 3-3.2 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.8 0-3 .5-4.5 2-1.5-1.5-2.7-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4 3 5.5l7 7z"/>',
		'ideia'       => '<path d="M9 18h6M10 22h4"/><path d="M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.2 1 2V17h6v-.3c0-.8.4-1.5 1-2A7 7 0 0 0 12 2z"/>',
		'escola'      => '<path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
		'casa'        => '<path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/><path d="M10 21v-6h4v6"/>',
		'online'      => '<rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/><path d="m10 7.5 4 2.5-4 2.5z"/>',
		'grupo'       => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/>',
		'bambu'       => '<path d="M12 2v20"/><path d="M10 7h4M10 13h4M10 19h4"/><path d="M12 9c1.8-3 4.6-4.4 8-4.5-.8 3.2-3.8 5-8 5M12 15c-1.8-3-4.6-4.4-8-4.5.8 3.2 3.8 5 8 5"/>',
		'broto'       => '<path d="M12 22V11"/><path d="M12 11C12 6 8.5 3 3 3c0 5.5 3.5 8 9 8zM12 14c0-4.5 3-7.5 9-7.5 0 5-3.5 7.5-9 7.5z"/>',
		'escudo'      => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
		'crescimento' => '<path d="M22 7 13.5 15.5 8.5 10.5 2 17"/><path d="M16 7h6v6"/>',
		'relogio'     => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
		'telefone'    => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/>',
		'email'       => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
		'local'       => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
		'calendario'  => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
		'seta'        => '<path d="M5 12h14M12 5l7 7-7 7"/>',
		'esquerda'    => '<path d="m15 18-6-6 6-6"/>',
		'direita'     => '<path d="m9 18 6-6-6-6"/>',
		'abaixo'      => '<path d="m6 9 6 6 6-6"/>',
		'acima'       => '<path d="m18 15-6-6-6 6"/>',
		'menu'        => '<path d="M3 6h18M3 12h18M3 18h18"/>',
		'fechar'      => '<path d="M18 6 6 18M6 6l12 12"/>',
		'check'       => '<path d="M20 6 9 17l-5-5"/>',
		'aspas'       => '<path d="M3 21c3 0 7-1 7-8V5H3v8h4c0 4-2 5-4 5zM14 21c3 0 7-1 7-8V5h-7v8h4c0 4-2 5-4 5z"/>',
		'usuario'     => '<circle cx="12" cy="8" r="4"/><path d="M4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/>',
		'instagram'   => '<rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/>',
		'facebook'    => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
		'youtube'     => '<path d="M2.5 17a24 24 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.6 49.6 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24 24 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.6 49.6 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/>',
	);
}

/**
 * Nomes legíveis dos ícones que podem ser escolhidos nos cursos.
 *
 * @return array
 */
function bambu_icon_choices() {
	return array(
		'nota'        => 'Nota musical',
		'piano'       => 'Piano / teclado',
		'violao'      => 'Violão / guitarra',
		'microfone'   => 'Canto / microfone',
		'bateria'     => 'Bateria / percussão',
		'crianca'     => 'Criança',
		'coracao'     => 'Coração',
		'ideia'       => 'Ideia / aprendizagem',
		'escola'      => 'Escola',
		'casa'        => 'Casa',
		'online'      => 'Online',
		'grupo'       => 'Grupo',
		'bambu'       => 'Bambu',
		'broto'       => 'Broto',
		'escudo'      => 'Escudo',
		'crescimento' => 'Crescimento',
	);
}

/**
 * Retorna o SVG de um ícone.
 *
 * @param string $name  Chave do ícone.
 * @param string $class Classe extra.
 * @return string
 */
function bambu_icon( $name, $class = '' ) {
	$paths = bambu_icon_paths();

	if ( 'whatsapp' === $name ) {
		return '<svg class="icon icon--whatsapp ' . esc_attr( $class ) . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M17.47 14.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.16-.17.2-.35.22-.64.07-.3-.15-1.26-.46-2.39-1.47-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.6.13-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.21 3.07c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.76-.72 2-1.41.25-.7.25-1.29.18-1.41-.08-.13-.27-.2-.57-.35M12.05 21.79h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.74.98 1-3.65-.24-.37a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.44-9.88 9.89-9.88 2.64 0 5.12 1.03 6.99 2.9a9.83 9.83 0 0 1 2.89 6.99c0 5.45-4.44 9.88-9.88 9.88m8.41-18.3A11.82 11.82 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.89c0 2.1.55 4.14 1.59 5.95L.06 24l6.3-1.65a11.88 11.88 0 0 0 5.68 1.45h.01c6.55 0 11.89-5.34 11.89-11.89a11.82 11.82 0 0 0-3.48-8.41z"/></svg>';
	}

	if ( ! isset( $paths[ $name ] ) ) {
		$name = 'nota';
	}

	return '<svg class="icon icon--' . esc_attr( $name ) . ' ' . esc_attr( $class ) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}
