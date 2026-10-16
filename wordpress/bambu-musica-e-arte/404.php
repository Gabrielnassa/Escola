<?php
/**
 * Página não encontrada.
 *
 * @package Bambu
 */

get_header();
bambu_page_header( 'Página não encontrada' );
?>
<section class="section">
	<div class="container container--narrow empty-state">
		<span class="empty-state__icon"><?php echo bambu_icon( 'nota' ); // phpcs:ignore ?></span>
		<h2>Ops! Essa nota saiu do tom.</h2>
		<p>A página que você procura não existe ou foi movida.</p>
		<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Voltar para o início</a>
	</div>
</section>
<?php
get_footer();
