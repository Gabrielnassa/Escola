<?php
/**
 * Cabeçalho: barra superior + menu.
 *
 * @package Bambu
 */

$topbar_link = bambu_opt( 'topbar_link' ) ? bambu_opt( 'topbar_link' ) : home_url( '/trabalhe-conosco/' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1d4a2a">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#conteudo">Pular para o conteúdo</a>

<div class="topbar">
	<div class="container topbar__inner">
		<ul class="topbar__contact">
			<li><a href="<?php echo esc_url( bambu_tel_url( bambu_opt( 'phone1' ) ) ); ?>"><?php echo bambu_icon( 'telefone' ); // phpcs:ignore ?> <?php echo esc_html( bambu_opt( 'phone1' ) ); ?></a></li>
			<li class="hide-sm"><a href="mailto:<?php echo esc_attr( bambu_opt( 'email' ) ); ?>"><?php echo bambu_icon( 'email' ); // phpcs:ignore ?> <?php echo esc_html( bambu_opt( 'email' ) ); ?></a></li>
			<li class="hide-md"><?php echo bambu_icon( 'local' ); // phpcs:ignore ?> <?php echo esc_html( bambu_opt( 'address' ) ); ?></li>
		</ul>
		<div class="topbar__right">
			<?php bambu_social_links( 'social social--topbar' ); ?>
			<?php if ( bambu_opt( 'topbar_label' ) ) : ?>
				<a class="topbar__link hide-sm" href="<?php echo esc_url( bambu_is_preview() ? '#contato' : $topbar_link ); ?>"><?php echo bambu_icon( 'usuario' ); // phpcs:ignore ?> <?php echo esc_html( bambu_opt( 'topbar_label' ) ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>

<header class="site-header" id="topo">
	<div class="container site-header__inner">
		<?php bambu_logo( 'dark' ); ?>

		<nav class="main-nav" id="menu" aria-label="Menu principal">
			<div class="main-nav__head">
				<?php bambu_logo( 'dark' ); ?>
				<button class="icon-btn nav-close" type="button" aria-label="Fechar menu"><?php echo bambu_icon( 'fechar' ); // phpcs:ignore ?></button>
			</div>
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'menu',
						'depth'          => 2,
					)
				);
			} else {
				bambu_menu_fallback();
			}
			?>
			<a class="btn btn--primary main-nav__cta" href="<?php echo esc_url( bambu_whatsapp_url( 'Olá! Gostaria de agendar uma aula experimental.' ) ); ?>" target="_blank" rel="noopener">Aula experimental</a>
		</nav>

		<div class="site-header__actions">
			<a class="btn btn--primary hide-md" href="<?php echo esc_url( bambu_whatsapp_url( 'Olá! Gostaria de agendar uma aula experimental.' ) ); ?>" target="_blank" rel="noopener"><?php echo bambu_icon( 'calendario' ); // phpcs:ignore ?> Aula experimental</a>
			<button class="icon-btn nav-toggle" type="button" aria-controls="menu" aria-expanded="false" aria-label="Abrir menu"><?php echo bambu_icon( 'menu' ); // phpcs:ignore ?></button>
		</div>
	</div>
</header>
<div class="nav-overlay" hidden></div>

<main id="conteudo" class="site-main">
