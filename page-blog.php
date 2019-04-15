<?php
/**
 * Template part for displaying page content in page.php
 * Template Name: Страница блога
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main class="blog blog-post">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/post/content', 'blog' );

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

