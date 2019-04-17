<?php
/**
 * Template part for displaying page content in page.php
 * Template Name: Страница "Цены"
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="section-header notop"><div class="container"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div></div>

		<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="breadcrumbs"><div class="container">','</div></div>' );
		}
		?>

		<main id="main" class="site-main page page-prices">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'price' );

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
