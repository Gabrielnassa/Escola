<?php
/**
 * SEO local: dados estruturados da escola, título e descrição da página inicial.
 * Se um plugin de SEO (Yoast, Rank Math, SEOPress, All in One SEO) estiver ativo,
 * o título, a descrição e o Open Graph ficam com ele; os dados da escola continuam aqui.
 *
 * @package bambu-caderno
 */

defined( 'ABSPATH' ) || exit;

function bambu_tem_plugin_seo() {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'SEOPRESS_VERSION' ) || defined( 'AIOSEO_VERSION' );
}

/**
 * Dados da escola. Para mudar, use o filtro "bambu_dados_escola" ou edite aqui.
 */
function bambu_dados_escola() {
	return apply_filters(
		'bambu_dados_escola',
		array(
			'nome'        => 'Bambu Escola de Música e Arte',
			'descricao'   => 'Escola de música e arte no Ipiranga (SP). Aulas de instrumento e canto, musicalização infantil e musicoterapia, na escola ou a domicílio.',
			'rua'         => 'Rua Bom Pastor, 1077 - Ipiranga',
			'cidade'      => 'São Paulo',
			'estado'      => 'SP',
			'cep'         => '04203-051',
			'telefones'   => array( '+55-11-94079-3838', '+55-11-94006-1498' ),
			'email'       => 'atendimento@bambumusicaearte.com.br',
			'redes'       => array(
				'https://www.instagram.com/bambumusicaearte/',
				'https://www.facebook.com/bambumusicaearte/',
				'https://www.youtube.com/@bambumusicaearte',
				'https://br.pinterest.com/bambumusicaearte/',
			),
		)
	);
}

add_action(
	'wp_head',
	function () {
		if ( ! is_front_page() ) {
			return;
		}
		$d    = bambu_dados_escola();
		$logo = get_theme_mod( 'custom_logo' ) ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : '';
		$json = array(
			'@context'     => 'https://schema.org',
			'@type'        => array( 'MusicSchool', 'LocalBusiness' ),
			'@id'          => home_url( '/#escola' ),
			'name'         => $d['nome'],
			'url'          => home_url( '/' ),
			'description'  => $d['descricao'],
			'telephone'    => $d['telefones'][0],
			'email'        => $d['email'],
			'address'      => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => $d['rua'],
				'addressLocality' => $d['cidade'],
				'addressRegion'   => $d['estado'],
				'postalCode'      => $d['cep'],
				'addressCountry'  => 'BR',
			),
			'contactPoint' => array_map(
				function ( $tel ) {
					return array(
						'@type'             => 'ContactPoint',
						'telephone'         => $tel,
						'contactType'       => 'customer service',
						'availableLanguage' => 'pt-BR',
					);
				},
				$d['telefones']
			),
			'sameAs'       => $d['redes'],
		);
		if ( $logo ) {
			$json['logo']  = $logo;
			$json['image'] = $logo;
		}
		echo '<script type="application/ld+json">' . wp_json_encode( $json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
	}
);

add_filter(
	'pre_get_document_title',
	function ( $titulo ) {
		if ( is_front_page() && ! bambu_tem_plugin_seo() ) {
			return 'Bambu | Escola de Música e Arte no Ipiranga, São Paulo';
		}
		return $titulo;
	}
);

add_action(
	'wp_head',
	function () {
		if ( bambu_tem_plugin_seo() ) {
			return;
		}
		$d = bambu_dados_escola();
		if ( is_front_page() ) {
			$titulo    = 'Bambu | Escola de Música e Arte no Ipiranga, São Paulo';
			$descricao = $d['descricao'];
			$url       = home_url( '/' );
		} elseif ( is_singular() ) {
			$titulo    = wp_get_document_title();
			$descricao = has_excerpt() ? get_the_excerpt() : wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', get_queried_object_id() ) ), 28, '…' );
			$url       = get_permalink();
		} else {
			return;
		}
		$imagem = is_singular() && has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'large' ) : '';
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $descricao ) );
		printf( '<meta property="og:type" content="website"><meta property="og:locale" content="pt_BR"><meta property="og:site_name" content="%s">' . "\n", esc_attr( $d['nome'] ) );
		printf( '<meta property="og:title" content="%s"><meta property="og:description" content="%s"><meta property="og:url" content="%s">' . "\n", esc_attr( $titulo ), esc_attr( $descricao ), esc_url( $url ) );
		if ( $imagem ) {
			printf( '<meta property="og:image" content="%s"><meta name="twitter:card" content="summary_large_image">' . "\n", esc_url( $imagem ) );
		}
	},
	5
);
