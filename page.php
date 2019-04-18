<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

get_header();

include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :

$advanced_field = get_field('advanced_field');
$alias 	= get_field('alias');
$header = $advanced_field['header'];
?>

	<div id="primary" class="content-area">
		<div class="section-header <?php echo $header ? '' : 'no-top'; ?>">
			<div class="container">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
		</div>

		<?php
		if ( $advanced_field['header'] ) :
			echo $advanced_field['header'];
		endif;

		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="breadcrumbs"><div class="container">','</div></div>' );
		}
		?>
		<main id="main" class="site-main <?php echo $alias; ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
endif;
get_footer();
