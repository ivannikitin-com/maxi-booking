<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */

?>

<?php
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :

	$description 	= get_field('description');
	$partners			= get_field('partners');
	$bottom_image = get_field('bottom_image');

	if ( $description ) : ?>
	<div class="container py60">
		<div class="row">
			<div class="col-12 col-md-6"><?php echo $description['column_1']; ?></div>
			<div class="col-12 col-md-6"><?php echo $description['column_2']; ?></div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $partners ) : ?>
	<div class="lightgray-bg py60">
		<div class="container">
			<div class="row">
				<?php foreach( $partners as $item ) : ?>
				<div class="col-6 col-md-6 col-lg-3">
					<img src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['image']['alt']; ?>" class="mb35" />
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php
	if ( $bottom_image ) :
		if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) :
			echo '<div class="partners-bottom-img" style="background-image: url('. $bottom_image['image_webp']['url'] .');"></div>';
		else :
			echo '<div class="partners-bottom-img" style="background-image: url('. $bottom_image['image']['url'] .');"></div>';
		endif;		
	endif;
	?>
<?php endif; ?>
