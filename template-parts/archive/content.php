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
	<a class="blog-category-item" href="<?php the_permalink(); ?>">
		<div class="img"><?php max_book_post_thumbnail(); ?></div>
		<div class="info">
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
		</div>
		<span class="readmore"><u>Читать далее</u> →<?php //esc_html_e( 'Читать далее →', 'max_book' ); ?></span>
	</a>
</div>