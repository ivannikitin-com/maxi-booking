<?php
/**
 * Template part for displaying page content in page.php
 * Template Name: Страница "Оптимизация бронирования"
 * Template Post Type: products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="section-header"><div class="container"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div></div>

		<?php
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
			if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :
				$banner = get_field('banner');

				if ( $banner ) :
		?>
		<div class="top-big oneline optimized-bookings-top" style="background-image: url(<?php echo $banner['bg']['url']; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-12 button-container xs-center sm-center"><a href="<?php echo $banner['button']['url']; ?>" class="button upper mb20"><?php echo $banner['button']['title']; ?></a></div>
					<div class="col-12 img pb30 align-self-center">
						<div class="inner inner-inline pb30 align-self-center">
							<div><img src="<?php echo $banner['image']['url']; ?>"></div>
							<?php if ( $banner['images'] ) :
								foreach( $banner['images'] as $image ) : ?>
							<div class="d-none d-sm-flex"><img src="<?php echo $image['image_desktop']['url']; ?>"></div>
							<div class="d-sm-none"><img src="<?php echo $image['image_mobile']['url']; ?>"></div>
							<?php endforeach;
							endif; ?>
							<div><img src="<?php echo $banner['image']['url']; ?>"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="breadcrumbs"><div class="container">','</div></div>' );
		}
		?>

		<main id="main" class="site-main page optimized-bookings">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'optimize' );

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
