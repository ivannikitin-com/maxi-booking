<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MaxiBooking
 */

if ( ! is_active_sidebar( 'footer' ) ) {
	return;
}
?>


<?php dynamic_sidebar( 'footer' ); ?>
