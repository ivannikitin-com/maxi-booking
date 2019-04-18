<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

get_header();
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :

$advanced_field = get_field('advanced_field', get_option('page_for_posts'));
$alias 	= get_field('alias', get_option('page_for_posts'));
?>
	<div id="primary" class="content-area">
		<div class="section-header">
			<div class="container">
				<?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
			<div class="container blog-category-items py35">
					<div class="row">
					<?php if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/archive/content', get_post_type() );

					endwhile;

					else :

					get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
					</div>
			</div>
			<div class="container pb60">
				<div class="row">
					<div class="col-12">
					<?php wpbeginner_numeric_posts_nav(); ?>
					</div>
				</div>
			</div>
			<?php
				if ( $advanced_field['content'] ) :
					echo $advanced_field['content'];
				endif;
			?>
		</main>
	</div><!-- #primary -->

<?php
endif;
get_footer();
