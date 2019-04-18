<?php
/**
 * Template part for displaying page content in page.php
 * Template Name: Страница "Партнерская программа"
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="section-header <?php echo $banner ? '' : 'no-top'; ?>"><div class="container"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div></div>

		<?php
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
			if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :
				$banner = get_field('banner');

				if ( $banner ) :
		?>
			<div class="top-big page partners-program-top" style="background-image: url(<?php echo $banner['bg']; ?>);">
				<div class="container">
					<div class="row">
						<div class="col-12 button-container xs-center sm-center"><a href="<?php echo $banner['button']['url']; ?>" class="button upper mb20"><?php echo $banner['button']['title']; ?></a></div>
						<div class="col-md-6"><p class="h2 left white-col xs-center sm-center"><?php echo $banner['title']; ?></p></div>
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

		<main id="main" class="site-main partners-program">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'partner-program' );

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
