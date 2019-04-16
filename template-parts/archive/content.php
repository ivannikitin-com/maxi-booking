<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

?>
<div class="col-sm-6 col-lg-4">
	<div class="blog-category-item">
		<div class="img"><?php max_book_post_thumbnail(); ?></div>
		<div class="info">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php the_excerpt(); ?>
		</div>
		<a class="readmore" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Читать далее →', 'max_book' ); ?></a>
	</div>
</div>