<?php
/**
 * Template part for displaying page content in page.php
 * Template Name: Страница "Модуль бронирования"
 * Template Post Type: products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="section-header <?php echo $banner ? '' : 'no-top'; ?>"><div class="container"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div></div>
		<main id="main" class="site-main page modul-page">

		<?php
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
			if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :
				$banner = get_field('banner');

				if ( $banner ) :
		?>
	<div class="top-modul-carousel">
		<div class="modul-carousel-info">
		<div class="container">
				<div class="row">
						<div class="col-lg-4 col-md-6 md-left try-button sm-center xs-center">
								<a href="<?php echo $banner['button']['url']; ?>" class="button w100 upper"><?php echo $banner['button']['title']; ?></a>
							</div>
								<div class="col-lg-8 col-md-6 md-right xs-center modul-form sm-center">
								<div id="mbh-form-wrapper"></div>
								<script>var mbhForm = {form_url: "https://online-demo.maxi-booking.ru/management/online/api/form/iframe/591ef58cd2122b21674826b2", calendar_url: "https://online-demo.maxi-booking.ru/management/online/api/form/iframe/calendar"}; var frameWidth = "300"; var frameHeight = "400"</script><script src="https://online-demo.maxi-booking.ru/bundles/mbhonline/js/online/load-form.js"></script>
							</div>
					</div>
			</div>
		</div>
		<div class="owl-carousel">
			<?php if ( $banner['slider'] ) :
				foreach( $banner['slider'] as $slide ) :
					if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) :
						echo '<div class="modul-slide" style="background-image: url(' . $slide['image_webp']['url'] . ');"></div>';
					else :
						echo '<div class="modul-slide" style="background-image: url(' . $slide['image']['url'] . ');"></div>';
					endif;
				endforeach;
			endif; ?>
		</div>
    </div>
			<?php endif; ?>
		<?php endif; ?>

		<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="breadcrumbs"><div class="container">','</div></div>' );
		}
		?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'products-bronirovaniay' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
