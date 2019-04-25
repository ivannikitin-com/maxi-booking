<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package MaxiBooking
 */

get_header();
?>
	<div id="primary" class="content-area">
		<div class="section-header">
			<div class="container">
    			<h1 class="entry-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'max_book' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</div>
		</div>
		<main id="main" class="site-main blog-category">
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
			<?php get_sidebar( 'blog' ); ?>
		</main>
	</div><!-- #primary -->

<?php
get_footer();
