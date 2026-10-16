<?php
/**
 * Opções em Aparência > Personalizar > Bambu Música e Arte.
 *
 * @package Bambu
 */

/**
 * Campos do Personalizar, agrupados por seção.
 * Tipos: text, textarea, url, image, checkbox.
 *
 * @return array
 */
function bambu_customizer_fields() {
	$fields = array(
		'bambu_contato'  => array(
			'title'  => 'Contato e redes sociais',
			'fields' => array(
				'phone1'       => array( 'Telefone 1', 'text' ),
				'phone2'       => array( 'Telefone 2', 'text' ),
				'whatsapp'     => array( 'WhatsApp (só números, com 55 e DDD)', 'text' ),
				'whatsapp_msg' => array( 'Mensagem automática do WhatsApp', 'textarea' ),
				'email'        => array( 'E-mail', 'text' ),
				'address'      => array( 'Endereço', 'text' ),
				'hours'        => array( 'Horário de atendimento', 'text' ),
				'instagram'    => array( 'Instagram (link)', 'url' ),
				'facebook'     => array( 'Facebook (link)', 'url' ),
				'youtube'      => array( 'YouTube (link)', 'url' ),
				'topbar_label' => array( 'Barra superior: texto do link à direita', 'text' ),
				'topbar_link'  => array( 'Barra superior: endereço do link (vazio = /trabalhe-conosco/)', 'url' ),
			),
		),
		'bambu_banner'   => array(
			'title'       => 'Banner rotativo',
			'description' => 'No campo "Link do botão" use #contato, #cursos etc. para rolar a página, "whatsapp" para abrir o WhatsApp ou um endereço completo.',
			'fields'      => array(),
		),
		'bambu_sobre'    => array(
			'title'  => 'Quem somos',
			'fields' => array(
				'about_kicker' => array( 'Chamada pequena', 'text' ),
				'about_title'  => array( 'Título', 'text' ),
				'about_text'   => array( 'Texto (linha em branco separa parágrafos)', 'textarea' ),
				'about_image'  => array( 'Foto', 'image' ),
				'about_badge'  => array( 'Selo sobre a foto', 'text' ),
				'stat1_number' => array( 'Destaque 1: número', 'text' ),
				'stat1_label'  => array( 'Destaque 1: texto', 'text' ),
				'stat2_number' => array( 'Destaque 2: número', 'text' ),
				'stat2_label'  => array( 'Destaque 2: texto', 'text' ),
				'stat3_number' => array( 'Destaque 3: número', 'text' ),
				'stat3_label'  => array( 'Destaque 3: texto', 'text' ),
			),
		),
		'bambu_inclusao' => array(
			'title'  => 'Inclusão e musicoterapia',
			'fields' => array(
				'incl_kicker' => array( 'Chamada pequena', 'text' ),
				'incl_title'  => array( 'Título', 'text' ),
				'incl_text'   => array( 'Texto', 'textarea' ),
				'incl_items'  => array( 'Lista (um item por linha)', 'textarea' ),
				'incl_image'  => array( 'Foto', 'image' ),
			),
		),
		'bambu_cta'      => array(
			'title'  => 'Chamada para aula experimental',
			'fields' => array(
				'cta_title' => array( 'Título', 'text' ),
				'cta_text'  => array( 'Texto', 'textarea' ),
				'cta_btn'   => array( 'Texto do botão', 'text' ),
			),
		),
		'bambu_form'     => array(
			'title'  => 'Formulário e mapa',
			'fields' => array(
				'form_email'     => array( 'E-mail que recebe o formulário (vazio = e-mail de contato)', 'text' ),
				'form_shortcode' => array( 'Shortcode de outro formulário (ex.: Contact Form 7). Se preenchido, substitui o formulário do tema.', 'text' ),
				'map_embed'      => array( 'Mostrar mapa do Google com o endereço', 'checkbox' ),
			),
		),
		'bambu_rodape'   => array(
			'title'  => 'Rodapé',
			'fields' => array(
				'footer_text' => array( 'Texto sobre a escola', 'textarea' ),
			),
		),
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$fields['bambu_banner']['fields'][ "slide{$i}_kicker" ] = array( "Slide {$i}: chamada pequena", 'text' );
		$fields['bambu_banner']['fields'][ "slide{$i}_title" ]  = array( "Slide {$i}: título (vazio = slide oculto)", 'text' );
		$fields['bambu_banner']['fields'][ "slide{$i}_text" ]   = array( "Slide {$i}: texto", 'textarea' );
		$fields['bambu_banner']['fields'][ "slide{$i}_btn" ]    = array( "Slide {$i}: texto do botão", 'text' );
		$fields['bambu_banner']['fields'][ "slide{$i}_url" ]    = array( "Slide {$i}: link do botão", 'text' );
		$fields['bambu_banner']['fields'][ "slide{$i}_image" ]  = array( "Slide {$i}: imagem de fundo", 'image' );
	}

	return $fields;
}

/**
 * Registra painel, seções e controles.
 *
 * @param WP_Customize_Manager $wp_customize Gerenciador.
 */
function bambu_customize_register( $wp_customize ) {
	$defaults = bambu_defaults();

	$wp_customize->add_panel(
		'bambu_panel',
		array(
			'title'    => 'Bambu Música e Arte',
			'priority' => 30,
		)
	);

	$priority = 10;
	foreach ( bambu_customizer_fields() as $section_id => $section ) {
		$wp_customize->add_section(
			$section_id,
			array(
				'title'       => $section['title'],
				'description' => isset( $section['description'] ) ? $section['description'] : '',
				'panel'       => 'bambu_panel',
				'priority'    => $priority,
			)
		);
		$priority += 10;

		foreach ( $section['fields'] as $key => $field ) {
			list( $label, $type ) = $field;
			$setting_id           = 'bambu_' . $key;

			switch ( $type ) {
				case 'textarea':
					$sanitize = 'sanitize_textarea_field';
					break;
				case 'url':
				case 'image':
					$sanitize = 'esc_url_raw';
					break;
				case 'checkbox':
					$sanitize = 'bambu_sanitize_checkbox';
					break;
				default:
					$sanitize = 'sanitize_text_field';
			}

			$wp_customize->add_setting(
				$setting_id,
				array(
					'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
					'sanitize_callback' => $sanitize,
				)
			);

			if ( 'image' === $type ) {
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						$setting_id,
						array(
							'label'   => $label,
							'section' => $section_id,
						)
					)
				);
			} else {
				$wp_customize->add_control(
					$setting_id,
					array(
						'label'   => $label,
						'section' => $section_id,
						'type'    => 'url' === $type ? 'url' : $type,
					)
				);
			}
		}
	}
}
add_action( 'customize_register', 'bambu_customize_register' );

/**
 * Sanitiza checkbox.
 *
 * @param mixed $value Valor.
 * @return string
 */
function bambu_sanitize_checkbox( $value ) {
	return $value ? '1' : '';
}
