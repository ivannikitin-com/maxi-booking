<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MaxiBooking
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<style>#navbar nav > ul > li > ul{visibility: hidden;}</style>
	<header id="navbar-container">
		<div class="container" id="navbar">
			<a href="<?php echo esc_url( home_url() ); ?>" id="logo">
				<?php 
				$logo_img = '';
				if( $custom_logo_id = get_theme_mod( 'custom_logo' ) ){
					$logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
						'class'    => 'footer-logo',
						'itemprop' => 'logo',
					) );

					if ( $custom_logo_id_slogan = get_theme_mod( 'slogan' ) ) {
						$logo_img .= '<img src="' . $custom_logo_id_slogan . '" alt="maxibooking logo" class="footer-logo">';
					}
				}
				echo $logo_img;
				?>
			</a>
			<div id="menu-trigger"></div>
		
			<nav>
				<a href="<?php echo esc_url( '//login.maxi-booking.ru/registration' ); ?>" class="button upper d-lg-none d-xl-none"><?php esc_html_e( 'Try for free', 'max_book' ); ?></a>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'header',
					'menu_id'        => 'menu',
					'container'       => '',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) );
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
