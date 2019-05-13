<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

?>






<div class="search-item mt35">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
		<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<?php if ( 'post' === get_post_type() && 0 ) : ?>
		<div class="entry-meta">
			<?php
			max_book_posted_on();
			max_book_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php max_book_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php if ( 'post' === get_post_type() && 0 ) : ?>
		<footer class="entry-footer">
			<?php max_book_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>


</article><!-- #post-<?php the_ID(); ?> -->
</div>



