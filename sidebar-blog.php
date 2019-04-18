<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MaxiBooking
 */

if ( ! is_active_sidebar( 'blog-category-footer' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'blog-category-footer' ); ?>
