<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MaxiBooking
 */

?>

	</div><!-- #content -->

	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<div class="footer-logo">
							<img src="/wp-content/themes/maxi-booking/assets/images/logo_footer.svg" class="footer-logo" itemprop="logo" alt="maxibooking logo">
							<img src="/wp-content/themes/maxi-booking/assets/images/logo_slogan.svg" class="footer-logo" alt="maxibooking logo text">
						</div>

						<div class="footer-copyright"><?php echo get_theme_mod( 'copyright' ); ?></div>
					</div>
					<div class="col-sm-12 col-md-5">
						<div class="footer-address"><?php echo get_theme_mod( 'address' ); ?></div>
						<div class="footer-social">
							<?php if ( get_theme_mod( 'vk' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'vk' ); ?>" rel="nofollow" target="_blank" title="Мы в Контакте"><img src="<?php bloginfo("template_url"); ?>/assets/images/social/vk_f.png" alt="Мы В Контакте"></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'facebook' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'facebook' ); ?>" rel="nofollow" target="_blank" title="Мы в Facebook"><img src="<?php bloginfo("template_url"); ?>/assets/images/social/facebook_f.png" alt="Мы в Facebook"></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'youtube' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'youtube' ); ?>" target="_blank" rel="nofollow" title="Наш канал YouTube"><img src="<?php bloginfo("template_url"); ?>/assets/images/social/youtube_f.png" alt="Мы в twitter"></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'twitter' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'twitter' ); ?>" target="_blank" rel="nofollow" title="Мы в twitter"><img src="<?php bloginfo("template_url"); ?>/assets/images/social/twitter_f.png" alt="Мы в twitter"></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'instagram' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'instagram' ); ?>" rel="nofollow" target="_blank" title="Мы в Instagram"><img src="<?php bloginfo("template_url"); ?>/assets/images/social/instagram_f.png" alt="Мы в Instagram"></a>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-12 col-md-3 footer-email">
						<?php
						if ( get_theme_mod( 'email' ) ) :
							printf( esc_html__( 'E-mail: %1$s', 'max_book' ), '<a href="mailto:' . get_theme_mod( 'email' ) . '" class="inline">' . get_theme_mod( 'email' ) . '</a>' );
						endif;
						?>
						<span> </span>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3 footer-menu-services">
						<?php
							wp_nav_menu( array(
								'theme_location' 	=> 'service',
								'container'      	=> 'ul',
								'container_class'	=> 'menu',
								'depth'				=> 0,
							) );
						?>
					</div>
					<div class="col-sm-6 col-md-3 footer-menu-info">
						<?php
							wp_nav_menu( array(
								'theme_location' 	=> 'info',
								'container'      	=> 'ul',
								'container_class'	=> 'menu',
								'depth'				=> 0,
							) );
						?>
					</div>
					<div class="col-sm-6 col-md-3 footer-menu-about">
						<?php
							wp_nav_menu( array(
								'theme_location' 	=> 'about',
								'container'      	=> 'ul',
								'container_class'	=> 'menu',
								'depth'				=> 0,
							) );
						?>
					</div>
					<div class="col-sm-6 col-md-3 footer-dss">
						<img src="/wp-content/themes/maxi-booking/assets/images/ssl.png" alt="Стандарт PCI-DSS">
						<?php
							wp_nav_menu( array(
								'theme_location' 	=> 'footer-links',
								'container'      	=> 'div',
								'container_class'	=> 'footer-bottom-links',
								'items_wrap'		=> '<ul>%3$s</ul>',
								'depth'				=> 0,
							) );
						?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<!-- Widget Footer -->
	<?php get_sidebar( 'footer' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
