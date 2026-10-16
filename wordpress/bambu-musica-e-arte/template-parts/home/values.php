<?php
/**
 * Valores — o símbolo do bambu.
 *
 * @package Bambu
 */

?>
<section class="section values" id="valores">
	<div class="values__bg" aria-hidden="true">
		<?php echo bambu_icon( 'bambu', 'values__bamboo values__bamboo--1' ); // phpcs:ignore ?>
		<?php echo bambu_icon( 'bambu', 'values__bamboo values__bamboo--2' ); // phpcs:ignore ?>
	</div>
	<div class="container">
		<header class="section-head section-head--light reveal">
			<span class="kicker kicker--light">Nossa identidade</span>
			<h2 class="section-title">O que o bambu nos ensina</h2>
			<p>Flexível, resiliente e em crescimento constante: é assim que acreditamos que a música deve ser aprendida.</p>
		</header>
		<ul class="values__grid">
			<?php foreach ( bambu_values() as $value ) : ?>
				<li class="value reveal">
					<span class="value__icon"><?php echo bambu_icon( $value['icon'] ); // phpcs:ignore ?></span>
					<h3><?php echo esc_html( $value['title'] ); ?></h3>
					<p><?php echo esc_html( $value['text'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
