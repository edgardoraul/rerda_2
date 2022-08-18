<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite" class="nav-top">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-dark navbar-fixed-top px-0" aria-labelledby="main-nav-label">
		<?php if( have_rows('noticias', 'option') ): ?>
			<div class="news">
				<div class="swiper sl-news">
					<div class="swiper-wrapper">
					<?php while( have_rows('noticias', 'option') ) : the_row(); $sub_value = get_sub_field('noticia'); ?>
						<div class="swiper-slide"><div class="news-info"><?php echo $sub_value; ?></div></div>
					<?php endwhile;	?>
					</div>
				</div>
				<a href="#0" class="close-news"><?php $path = get_template_directory_uri().'/images/closew.svg'; echo file_get_contents($path); ?></a>
			</div>
		<?php endif; ?>

			<div class="container-fluid">

			<a href="#0" class="burger-btn closed d-md-none d-block"><?php $path = get_template_directory_uri().'/images/mobile-burger.svg'; echo file_get_contents($path); ?></a>
					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->
				
				<div id="mobile-menu" class="burger-end">
					<div class="m-top">
						<a href="#volver"><?php $path = get_template_directory_uri().'/images/back.svg'; echo file_get_contents($path); ?>Volver</a>
						<button class="burger-btn btn-close"><?php $path = get_template_directory_uri().'/images/close.svg'; echo file_get_contents($path); ?></button>
						<div class="mob-search"><?php get_template_part( 'page-templates/advanced', 'searchform' ); ?></div>
					</div>
					<div class="m-mid">
					<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'nav-mobile',
								'container_id'    => 'navbarMobile',
								'menu_class'      => 'navbar-mobile',
								'fallback_cb'     => '',
								'menu_id'         => 'mobile-menus',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						);
						?>
					</div>
					<div class="m-bot">
						<span class="pedido"><?php
						wp_nav_menu(
							array(
								'theme_location'  => 'cart',
								'container_class' => '',
								'container_id'    => 'cartNav',
								'menu_class'      => 'cart-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'cart-menu',
								'depth'           => 1,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						);
					?>Mi Pedido</span>
						<a class="micuenta" href="<?php echo esc_url( get_page_link( 107 ) ); ?>">
						<?php
						if( is_user_logged_in() ) {
							$user = wp_get_current_user();
							
							if ( $user ) : ?>
								<img class="usr-avatar" src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
							<?php endif; 
						
						} else {
							$path = get_template_directory_uri().'/images/user-none.svg'; echo file_get_contents($path);
						} ?>
							Mi cuenta</a>
						<a class="mob-hablemos" href="#"><?php $path = get_template_directory_uri().'/images/ws.svg'; echo file_get_contents($path); ?> Hablemos</a>
					</div>

				</div>

				<div class="searcho d-md-flex d-none"><?php get_template_part( 'page-templates/advanced', 'searchform' ); ?></div>

				<!-- The Desktop Menu goes here -->
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'nav-desktop',
						'container_id'    => 'navbarNav',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 3,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
				<div class="extra-menu">
					<ul>
						<li class="d-md-block d-none">
						<a class="micuenta" href="<?php echo esc_url( get_page_link( 107 ) ); ?>">
						<?php
						if( is_user_logged_in() ) {
							$user = wp_get_current_user();
							
							if ( $user ) : ?>
								<img class="usr-avatar" src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
							<?php endif; 
						
						} else {
							$path = get_template_directory_uri().'/images/user-none.svg'; echo file_get_contents($path);
						} ?>
							Mi cuenta</a>
						</li>
						<li class="d-md-block d-none">
							<span class="searcher" href="#"><?php $path = get_template_directory_uri().'/images/search.svg'; echo file_get_contents($path); ?></span>
						</li>
					</ul>
					<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'cart',
								'container_class' => '',
								'container_id'    => 'cartNav',
								'menu_class'      => 'cart-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'cart-menu',
								'depth'           => 1,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						);
					?>
				</div>	
			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
