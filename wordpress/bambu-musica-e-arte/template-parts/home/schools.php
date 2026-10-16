<?php
/**
 * Para escolas e profissionais.
 *
 * @package Bambu
 */

$cards = array(
	array(
		'icon'  => 'escola',
		'title' => 'Consultoria para escolas',
		'text'  => 'Planejamento e acompanhamento do currículo de música na educação infantil e no ensino fundamental.',
	),
	array(
		'icon'  => 'grupo',
		'title' => 'Formação de professores',
		'text'  => 'Cursos para profissionais da área musical e pedagógica, com práticas aplicáveis em sala de aula.',
	),
	array(
		'icon'  => 'coracao',
		'title' => 'Inclusão na prática',
		'text'  => 'Estratégias musicais para incluir alunos com deficiência nas atividades da escola.',
	),
);
?>
<section class="section section--soft schools" id="escolas">
	<div class="container">
		<div class="schools__box reveal">
			<div class="schools__intro">
				<span class="kicker">Escolas e profissionais</span>
				<h2 class="section-title">Levamos a música para dentro da sua escola</h2>
				<p>Além das aulas, a Bambu apoia instituições e educadores que querem ter a música como parte do projeto pedagógico.</p>
				<a class="btn btn--outline" href="<?php echo esc_url( bambu_whatsapp_url( 'Olá! Represento uma escola e gostaria de saber sobre a consultoria em música.' ) ); ?>" target="_blank" rel="noopener">Solicitar proposta</a>
			</div>
			<ul class="schools__list">
				<?php foreach ( $cards as $card ) : ?>
					<li>
						<span class="schools__icon"><?php echo bambu_icon( $card['icon'] ); // phpcs:ignore ?></span>
						<div>
							<h3><?php echo esc_html( $card['title'] ); ?></h3>
							<p><?php echo esc_html( $card['text'] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
