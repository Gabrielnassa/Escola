<?php
/**
 * Conteúdo padrão do tema. Tudo aqui pode ser alterado em
 * Aparência > Personalizar > Bambu Música e Arte, ou pelos menus
 * "Cursos" e "Depoimentos" do painel.
 *
 * @package Bambu
 */

/**
 * Valores padrão das opções do Personalizar.
 *
 * @return array
 */
function bambu_defaults() {
	$img = 'https://images.unsplash.com/photo-';
	$q   = '?auto=format&fit=crop&w=1920&q=70';

	return array(
		// Contato e redes.
		'phone1'         => '(11) 94079-3838',
		'phone2'         => '(11) 94006-1498',
		'whatsapp'       => '5511940793838',
		'whatsapp_msg'   => 'Olá! Vim pelo site e gostaria de saber mais sobre as aulas da Bambu.',
		'email'          => 'contato@bambumusicaearte.com.br',
		'address'        => 'R. Bom Pastor, 1077 – Ipiranga, São Paulo – SP',
		'hours'          => 'Segunda a sábado · horários sob consulta',
		'instagram'      => 'https://www.instagram.com/bambumusicaearte/',
		'facebook'       => '',
		'youtube'        => '',
		'topbar_link'    => '',
		'topbar_label'   => 'Trabalhe conosco',

		// Banner rotativo.
		'slide1_kicker'  => 'Escola de Música em São Paulo',
		'slide1_title'   => 'Música para todas as idades, no seu tempo',
		'slide1_text'    => 'Aulas de instrumento e canto para crianças, jovens e adultos — na escola, na sua casa ou online.',
		'slide1_btn'     => 'Agende uma aula experimental',
		'slide1_url'     => '#contato',
		'slide1_image'   => $img . '1520523839897-bd0b52f945a0' . $q,

		'slide2_kicker'  => 'Inclusão e cuidado',
		'slide2_title'   => 'Música inclusiva, musicoterapia e psicopedagogia',
		'slide2_text'    => 'Cursos especializados para pessoas e crianças com deficiência, com um olhar atento ao desenvolvimento de cada aluno.',
		'slide2_btn'     => 'Conheça o trabalho',
		'slide2_url'     => '#inclusao',
		'slide2_image'   => $img . '1511379938547-c1f69419868d' . $q,

		'slide3_kicker'  => 'Aulas em domicílio',
		'slide3_title'   => 'O professor vai até você',
		'slide3_text'    => 'Aulas individuais de instrumento ou canto no conforto da sua casa, em São Paulo.',
		'slide3_btn'     => 'Fale pelo WhatsApp',
		'slide3_url'     => 'whatsapp',
		'slide3_image'   => $img . '1510915361894-db8b60106cb1' . $q,

		// Apresentação.
		'about_kicker'   => 'Conheça a Bambu',
		'about_title'    => 'Uma escola flexível, como o bambu',
		'about_text'     => "A Bambu Música e Arte nasceu para ensinar música de um jeito flexível, que respeita o ritmo e a história de cada aluno. Atendemos crianças, jovens e adultos — inclusive pessoas com deficiência — em aulas individuais e em grupo.\n\nO bambu é o nosso símbolo: flexibilidade, resiliência e crescimento constante. É assim que acreditamos que a música deve ser aprendida.",
		'about_image'    => $img . '1507838153414-b4b713384a76?auto=format&fit=crop&w=1000&q=70',
		'about_badge'    => 'Unidade Ipiranga · São Paulo',
		'stat1_number'   => '3',
		'stat1_label'    => 'formatos de aula: escola, domicílio e online',
		'stat2_number'   => 'Todas',
		'stat2_label'    => 'as idades: dos pequenos da musicalização aos adultos',
		'stat3_number'   => '1:1',
		'stat3_label'    => 'aulas individuais com plano pensado para cada aluno',

		// Inclusão.
		'incl_kicker'    => 'Música para todos',
		'incl_title'     => 'Inclusão, musicoterapia e psicopedagogia',
		'incl_text'      => 'Oferecemos cursos de música especializados para pessoas e crianças com deficiência, além de atendimentos em musicoterapia e psicopedagogia. A musicoterapia trabalha necessidades mentais, sociais e cognitivas, visando desenvolver potenciais e restabelecer funções.',
		'incl_items'     => "Planos individuais, construídos com a família\nRespeito ao tempo e às particularidades de cada aluno\nProfissionais com formação em música e educação\nAtendimento na escola ou em domicílio",
		'incl_image'     => $img . '1514320291840-2e0a9bf2a9ae?auto=format&fit=crop&w=1000&q=70',

		// Chamada para agendamento.
		'cta_title'      => 'Venha fazer uma aula experimental',
		'cta_text'       => 'Conte pra gente o que você quer aprender. Montamos o melhor horário e formato para você.',
		'cta_btn'        => 'Agendar pelo WhatsApp',

		// Contato.
		'form_email'     => '',
		'form_shortcode' => '',
		'map_embed'      => '1',

		// Rodapé.
		'footer_text'    => 'Escola de música e arte no Ipiranga, São Paulo. Aulas na escola, em domicílio e online para todas as idades.',
	);
}

/**
 * Lê uma opção do Personalizar com o valor padrão do tema.
 *
 * @param string $key Chave da opção.
 * @return string
 */
function bambu_opt( $key ) {
	$defaults = bambu_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'bambu_' . $key, $default );
}

/**
 * Link do WhatsApp com mensagem.
 *
 * @param string $msg Mensagem opcional.
 * @return string
 */
function bambu_whatsapp_url( $msg = '' ) {
	$number = preg_replace( '/\D+/', '', bambu_opt( 'whatsapp' ) );
	$msg    = $msg ? $msg : bambu_opt( 'whatsapp_msg' );
	return 'https://wa.me/' . $number . '?text=' . rawurlencode( $msg );
}

/**
 * Link de telefone (tel:).
 *
 * @param string $phone Telefone formatado.
 * @return string
 */
function bambu_tel_url( $phone ) {
	$digits = preg_replace( '/\D+/', '', $phone );
	return 'tel:+55' . $digits;
}

/**
 * Converte um link do Personalizar: "whatsapp" vira o link do WhatsApp,
 * "#ancora" vira link para a página inicial.
 *
 * @param string $url URL ou palavra-chave.
 * @return string
 */
function bambu_resolve_url( $url ) {
	if ( 'whatsapp' === $url ) {
		return bambu_whatsapp_url();
	}
	if ( 0 === strpos( $url, '#' ) ) {
		return is_front_page() ? $url : home_url( '/' . $url );
	}
	return $url;
}

/**
 * Atalhos de formatos de aula exibidos logo abaixo do banner.
 *
 * @return array
 */
function bambu_quick_links() {
	return array(
		array(
			'icon'  => 'escola',
			'title' => 'Aulas na escola',
			'text'  => 'Unidade Ipiranga',
			'url'   => '#contato',
		),
		array(
			'icon'  => 'casa',
			'title' => 'Aulas em domicílio',
			'text'  => 'Em São Paulo',
			'url'   => 'whatsapp',
		),
		array(
			'icon'  => 'online',
			'title' => 'Aulas online',
			'text'  => 'De onde você estiver',
			'url'   => 'whatsapp',
		),
		array(
			'icon'  => 'grupo',
			'title' => 'Aulas em grupo',
			'text'  => 'Para todas as idades',
			'url'   => '#cursos',
		),
	);
}

/**
 * Cursos padrão (usados enquanto nenhum curso for cadastrado no painel).
 *
 * @return array
 */
function bambu_default_courses() {
	return array(
		array(
			'icon'  => 'crianca',
			'title' => 'Musicalização Infantil',
			'text'  => 'Aula lúdica de experimentação de instrumentos, sons e sentidos para os pequenos descobrirem a música brincando.',
			'tag'   => 'A partir de bebês',
		),
		array(
			'icon'  => 'piano',
			'title' => 'Piano e Teclado',
			'text'  => 'Do primeiro contato às peças favoritas: leitura, técnica e repertório no ritmo de cada aluno.',
			'tag'   => 'Individual',
		),
		array(
			'icon'  => 'violao',
			'title' => 'Violão e Guitarra',
			'text'  => 'Acordes, ritmos e repertório para tocar as músicas que você ama — sozinho ou em grupo.',
			'tag'   => 'Individual ou grupo',
		),
		array(
			'icon'  => 'microfone',
			'title' => 'Canto',
			'text'  => 'Técnica vocal, respiração, afinação e interpretação para cantar com saúde e confiança.',
			'tag'   => 'Individual',
		),
		array(
			'icon'  => 'bateria',
			'title' => 'Bateria e Percussão',
			'text'  => 'Coordenação, ritmo e groove: dos fundamentos aos estilos populares brasileiros.',
			'tag'   => 'Individual',
		),
		array(
			'icon'  => 'coracao',
			'title' => 'Música Inclusiva',
			'text'  => 'Cursos de música especializados para pessoas e crianças com deficiência, com planos individuais.',
			'tag'   => 'Inclusão',
		),
		array(
			'icon'  => 'nota',
			'title' => 'Musicoterapia',
			'text'  => 'Trabalho com necessidades mentais, sociais e cognitivas, visando desenvolver potenciais e restabelecer funções.',
			'tag'   => 'Atendimento terapêutico',
		),
		array(
			'icon'  => 'ideia',
			'title' => 'Psicopedagogia',
			'text'  => 'Apoio ao processo de aprendizagem, integrando música, arte e educação.',
			'tag'   => 'Atendimento individual',
		),
		array(
			'icon'  => 'escola',
			'title' => 'Escolas e Profissionais',
			'text'  => 'Consultoria em currículo musical para escolas e cursos para profissionais da música e da educação.',
			'tag'   => 'Formação',
		),
	);
}

/**
 * Valores (símbolo do bambu).
 *
 * @return array
 */
function bambu_values() {
	return array(
		array(
			'icon'  => 'bambu',
			'title' => 'Flexibilidade',
			'text'  => 'Formatos, horários e métodos que se adaptam a quem aprende.',
		),
		array(
			'icon'  => 'escudo',
			'title' => 'Resiliência',
			'text'  => 'Persistência e acolhimento para superar cada desafio do caminho.',
		),
		array(
			'icon'  => 'crescimento',
			'title' => 'Crescimento constante',
			'text'  => 'Evolução contínua, aula após aula, com metas claras.',
		),
		array(
			'icon'  => 'coracao',
			'title' => 'Respeito ao tempo',
			'text'  => 'Cada aluno tem seu ritmo — e ele é sempre respeitado.',
		),
	);
}

/**
 * Depoimentos de exemplo, exibidos apenas na prévia em HTML.
 * No WordPress, cadastre depoimentos reais em Depoimentos > Adicionar.
 *
 * @return array
 */
function bambu_preview_testimonials() {
	return array(
		array(
			'text' => 'Faço aulas de piano em casa desde janeiro de 2021. A flexibilidade da professora com os horários faz toda a diferença na minha rotina.',
			'name' => 'Aluna de piano',
			'role' => 'Aulas em domicílio',
		),
		array(
			'text' => 'Meu filho espera a semana inteira pela aula de musicalização. Ele chega em casa cantando e mostrando os instrumentos que conheceu.',
			'name' => 'Mãe de aluno',
			'role' => 'Musicalização Infantil',
		),
		array(
			'text' => 'Encontramos na Bambu um lugar que respeita o tempo da nossa filha. A música virou um momento de alegria e desenvolvimento.',
			'name' => 'Família de aluna',
			'role' => 'Música Inclusiva',
		),
	);
}

/**
 * Posts de exemplo, exibidos apenas na prévia em HTML.
 *
 * @return array
 */
function bambu_preview_posts() {
	$img = 'https://images.unsplash.com/photo-';
	return array(
		array(
			'title' => 'Qual a idade ideal para começar a estudar música?',
			'text'  => 'Da musicalização para bebês às aulas para adultos: entenda o que cada fase da vida oferece no aprendizado musical.',
			'date'  => '08 out 2026',
			'cat'   => 'Dicas',
			'image' => $img . '1511379938547-c1f69419868d?auto=format&fit=crop&w=720&q=70',
		),
		array(
			'title' => 'Musicoterapia: o que é e para quem é indicada',
			'text'  => 'Como a música ajuda no desenvolvimento cognitivo, social e emocional — e como funciona um atendimento.',
			'date'  => '24 set 2026',
			'cat'   => 'Musicoterapia',
			'image' => $img . '1514320291840-2e0a9bf2a9ae?auto=format&fit=crop&w=720&q=70',
		),
		array(
			'title' => 'Aula em casa, na escola ou online: como escolher?',
			'text'  => 'Vantagens de cada formato para encaixar a música na sua rotina sem abrir mão da qualidade.',
			'date'  => '10 set 2026',
			'cat'   => 'Aulas',
			'image' => $img . '1510915361894-db8b60106cb1?auto=format&fit=crop&w=720&q=70',
		),
	);
}
