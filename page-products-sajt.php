<?php
/**
 * Template part for displaying page content in page.php
 * Template Name: Страница "Сайт для отеля"
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

		<?php
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
			if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :
				$banner = get_field('banner');

				if ( $banner ) :
		?>
			<div class="sajt-dlya-otelya-top pt35 pb80">
				<div class="container"><div class="text-desc"><h2 class="title left"><?php echo $banner['title']; ?></h2></div></div>
				<div class="sajt-title-smart"><div class="container"><?php echo $banner['pretitle']; ?></div></div>
				<div class="container">
					<div class="text-desc">
						<img class="sajt-comp" src="<?php echo $banner['image']['url']; ?>">
						<ul class="sajt-smart-list">
							<?php if ( $banner['transcript'] ) :
								foreach( $banner['transcript'] as $item ) : ?>
							<li><span class="letter"><?php echo $item['first_word']; ?></span><span class="letter-title h3"><?php echo $item['text']; ?></span></li>
							<?php endforeach;
							endif; ?>
						</ul>
						<div class="text-desc-bot">
							<div class="standard-btn  wpb_animate_when_almost_visible bounceInDown wpb_start_animation animated">
								<a href="<?php echo $banner['button']['url']; ?>" class="button upper"><?php echo $banner['button']['title']; ?></a>
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

		<main id="main" class="site-main page sajt-dlya-otelya">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'products-sajt' );

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
