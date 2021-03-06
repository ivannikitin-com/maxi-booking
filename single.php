<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MaxiBooking
 */

get_header();
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :

$advanced_field = get_field('advanced_field');
$alias 	= get_field('alias');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php echo $alias; ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/post/content', get_post_type() );

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
