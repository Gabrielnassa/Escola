<?php
/**
 * Tipos de conteúdo: Cursos e Depoimentos.
 *
 * @package Bambu
 */

/**
 * Registra Cursos e Depoimentos.
 */
function bambu_register_post_types() {
	register_post_type(
		'curso',
		array(
			'labels'       => array(
				'name'          => 'Cursos',
				'singular_name' => 'Curso',
				'add_new_item'  => 'Adicionar curso',
				'edit_item'     => 'Editar curso',
				'all_items'     => 'Todos os cursos',
			),
			'public'       => true,
			'has_archive'  => 'cursos',
			'rewrite'      => array( 'slug' => 'cursos' ),
			'menu_icon'    => 'dashicons-format-audio',
			'menu_position' => 20,
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		)
	);

	register_post_type(
		'depoimento',
		array(
			'labels'              => array(
				'name'          => 'Depoimentos',
				'singular_name' => 'Depoimento',
				'add_new_item'  => 'Adicionar depoimento',
				'edit_item'     => 'Editar depoimento',
				'all_items'     => 'Todos os depoimentos',
			),
			'public'              => false,
			'show_ui'             => true,
			'exclude_from_search' => true,
			'menu_icon'           => 'dashicons-format-quote',
			'menu_position'       => 21,
			'show_in_rest'        => true,
			'supports'            => array( 'title', 'editor' ),
		)
	);
}
add_action( 'init', 'bambu_register_post_types' );

/**
 * Atualiza os links permanentes ao ativar o tema (para /cursos/ funcionar).
 */
function bambu_flush_rewrites() {
	bambu_register_post_types();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bambu_flush_rewrites' );

/**
 * Título do depoimento = nome da pessoa.
 *
 * @param string  $title Placeholder.
 * @param WP_Post $post  Post.
 * @return string
 */
function bambu_title_placeholder( $title, $post ) {
	if ( 'depoimento' === $post->post_type ) {
		return 'Nome de quem deu o depoimento';
	}
	return $title;
}
add_filter( 'enter_title_here', 'bambu_title_placeholder', 10, 2 );

/**
 * Caixas de informações extras.
 */
function bambu_add_meta_boxes() {
	add_meta_box( 'bambu_curso', 'Exibição na página inicial', 'bambu_curso_meta_box', 'curso', 'side' );
	add_meta_box( 'bambu_depoimento', 'Informações', 'bambu_depoimento_meta_box', 'depoimento', 'side' );
}
add_action( 'add_meta_boxes', 'bambu_add_meta_boxes' );

/**
 * Campos do curso: ícone e etiqueta.
 *
 * @param WP_Post $post Post.
 */
function bambu_curso_meta_box( $post ) {
	wp_nonce_field( 'bambu_meta', 'bambu_meta_nonce' );
	$icon = get_post_meta( $post->ID, '_bambu_icon', true );
	$tag  = get_post_meta( $post->ID, '_bambu_tag', true );
	?>
	<p>
		<label for="bambu_icon"><strong>Ícone</strong></label><br>
		<select name="bambu_icon" id="bambu_icon" style="width:100%">
			<?php foreach ( bambu_icon_choices() as $key => $label ) : ?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $icon, $key ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p>
		<label for="bambu_tag"><strong>Etiqueta</strong> (ex.: Individual, A partir de 4 anos)</label><br>
		<input type="text" name="bambu_tag" id="bambu_tag" value="<?php echo esc_attr( $tag ); ?>" style="width:100%">
	</p>
	<p class="description">O texto do card vem do campo "Resumo". Use "Ordem" (Atributos) para ordenar.</p>
	<?php
}

/**
 * Campo do depoimento: curso / relação com a escola.
 *
 * @param WP_Post $post Post.
 */
function bambu_depoimento_meta_box( $post ) {
	wp_nonce_field( 'bambu_meta', 'bambu_meta_nonce' );
	$role = get_post_meta( $post->ID, '_bambu_role', true );
	?>
	<p>
		<label for="bambu_role"><strong>Curso ou relação</strong> (ex.: Aluna de piano)</label><br>
		<input type="text" name="bambu_role" id="bambu_role" value="<?php echo esc_attr( $role ); ?>" style="width:100%">
	</p>
	<p class="description">Escreva o depoimento no editor principal.</p>
	<?php
}

/**
 * Salva os campos extras.
 *
 * @param int $post_id ID do post.
 */
function bambu_save_meta( $post_id ) {
	if ( ! isset( $_POST['bambu_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bambu_meta_nonce'] ) ), 'bambu_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'bambu_icon' => '_bambu_icon',
		'bambu_tag'  => '_bambu_tag',
		'bambu_role' => '_bambu_role',
	);
	foreach ( $fields as $field => $meta_key ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}
}
add_action( 'save_post', 'bambu_save_meta' );
