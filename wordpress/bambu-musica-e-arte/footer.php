<?php
/**
 * Rodapé.
 *
 * @package Bambu
 */

$home    = bambu_is_preview() ? '' : home_url( '/' );
$courses = bambu_get_courses();
?>
</main>

<footer class="site-footer">
	<div class="container site-footer__grid">
		<div class="site-footer__about">
			<?php bambu_logo( 'light' ); ?>
			<p><?php echo esc_html( bambu_opt( 'footer_text' ) ); ?></p>
			<?php bambu_social_links( 'social social--footer' ); ?>
		</div>

		<div>
			<h3 class="site-footer__title">Institucional</h3>
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'footer-links',
						'depth'          => 1,
					)
				);
			} else {
				?>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( $home . '#sobre' ); ?>">Quem somos</a></li>
					<li><a href="<?php echo esc_url( $home . '#inclusao' ); ?>">Música inclusiva</a></li>
					<li><a href="<?php echo esc_url( $home . '#escolas' ); ?>">Para escolas e profissionais</a></li>
					<li><a href="<?php echo esc_url( bambu_is_preview() ? '#blog' : bambu_blog_url() ); ?>">Blog</a></li>
					<li><a href="<?php echo esc_url( bambu_is_preview() ? '#contato' : home_url( '/trabalhe-conosco/' ) ); ?>">Trabalhe conosco</a></li>
					<li><a href="<?php echo esc_url( $home . '#contato' ); ?>">Contato</a></li>
				</ul>
				<?php
			}
			?>
		</div>

		<div>
			<h3 class="site-footer__title">Cursos</h3>
			<ul class="footer-links">
				<?php foreach ( array_slice( $courses, 0, 7 ) as $course ) : ?>
					<li><a href="<?php echo esc_url( ! empty( $course['url'] ) ? $course['url'] : $home . '#cursos' ); ?>"><?php echo esc_html( $course['title'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div>
			<h3 class="site-footer__title">Fale com a gente</h3>
			<ul class="footer-contact">
				<li><?php echo bambu_icon( 'local' ); // phpcs:ignore ?><span><?php echo esc_html( bambu_opt( 'address' ) ); ?></span></li>
				<li><?php echo bambu_icon( 'telefone' ); // phpcs:ignore ?><span>
					<a href="<?php echo esc_url( bambu_tel_url( bambu_opt( 'phone1' ) ) ); ?>"><?php echo esc_html( bambu_opt( 'phone1' ) ); ?></a>
					<?php if ( bambu_opt( 'phone2' ) ) : ?>
						<br><a href="<?php echo esc_url( bambu_tel_url( bambu_opt( 'phone2' ) ) ); ?>"><?php echo esc_html( bambu_opt( 'phone2' ) ); ?></a>
					<?php endif; ?>
				</span></li>
				<li><?php echo bambu_icon( 'email' ); // phpcs:ignore ?><span><a href="mailto:<?php echo esc_attr( bambu_opt( 'email' ) ); ?>"><?php echo esc_html( bambu_opt( 'email' ) ); ?></a></span></li>
				<?php if ( bambu_opt( 'hours' ) ) : ?>
					<li><?php echo bambu_icon( 'relogio' ); // phpcs:ignore ?><span><?php echo esc_html( bambu_opt( 'hours' ) ); ?></span></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

	<div class="site-footer__bottom">
		<div class="container site-footer__bottom-inner">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Bambu Música e Arte. Todos os direitos reservados.</p>
			<a href="#topo" class="back-top">Voltar ao topo <?php echo bambu_icon( 'acima' ); // phpcs:ignore ?></a>
		</div>
	</div>
</footer>

<a class="whatsapp-float" href="<?php echo esc_url( bambu_whatsapp_url() ); ?>" target="_blank" rel="noopener" aria-label="Fale conosco pelo WhatsApp">
	<?php echo bambu_icon( 'whatsapp' ); // phpcs:ignore ?>
	<span class="whatsapp-float__label">Fale conosco</span>
</a>

<?php wp_footer(); ?>
</body>
</html>
