<?php
/**
 * Cursos (equivalente às "etapas de formação").
 *
 * @package Bambu
 */

$courses = bambu_get_courses();
?>
<section class="section section--soft courses" id="cursos">
	<div class="container">
		<header class="section-head reveal">
			<span class="kicker">Nossos cursos</span>
			<h2 class="section-title">Um caminho musical para cada fase da vida</h2>
			<p>Aulas individuais e em grupo, na escola, em domicílio ou online. Escolha por onde começar — a gente monta o plano com você.</p>
		</header>

		<div class="courses__grid">
			<?php foreach ( $courses as $course ) : ?>
				<?php $url = ! empty( $course['url'] ) ? $course['url'] : bambu_whatsapp_url( 'Olá! Gostaria de saber mais sobre o curso de ' . $course['title'] . '.' ); ?>
				<article class="course-card reveal">
					<span class="course-card__icon"><?php echo bambu_icon( $course['icon'] ? $course['icon'] : 'nota' ); // phpcs:ignore ?></span>
					<?php if ( ! empty( $course['tag'] ) ) : ?>
						<span class="course-card__tag"><?php echo esc_html( $course['tag'] ); ?></span>
					<?php endif; ?>
					<h3 class="course-card__title"><?php echo esc_html( $course['title'] ); ?></h3>
					<p><?php echo esc_html( $course['text'] ); ?></p>
					<a class="link-arrow" href="<?php echo esc_url( $url ); ?>"<?php echo empty( $course['url'] ) ? ' target="_blank" rel="noopener"' : ''; ?>>Saiba mais <?php echo bambu_icon( 'direita' ); // phpcs:ignore ?></a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
