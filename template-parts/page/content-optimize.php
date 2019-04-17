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
	$windows 			= get_field('windows');
	$bg						= get_field('bg');
	$bg_webp			= get_field('bg_webp');
	$access				= get_field('access');
	$reviews			= get_field('reviews');

?>
	<?php if ( $description ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h2><?php echo $description['title']; ?></h2>
			</div>
			<div class="col-lg-12 m0a">
				<p class="h3 center"><?php echo $description['description']; ?></p>
			</div>
		</div>
		<div class="row pb60">
			<div class="col-12 col-md-6">
				<?php echo $description['block_1']; ?>
			</div>
			<div class="col-12 col-md-6">
				<?php echo $description['block_2']; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $windows ) : ?>
	<?php
		if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
			echo '<div class="okna" style="background-image: url(' . $bg_webp['url'] . ');">';
		} else {
			echo '<div class="okna" style="background-image: url(' . $bg['url'] . ');">';
		}
	?>
		<div class="container">
			<div class="row pb60">
				<div class="col-lg-12">
					<?php foreach( $windows as $item ) : ?>
					<p class="h2">
						<?php echo $item['title']; ?>
					</p>
					<?php
						if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
							echo '<img src="' . $item['image_webp']['url'] . '" alt="' . $item['imimage_webpage']['alt'] . '">';
						} else {
							echo '<img src="' . $item['image']['url'] . '" alt="' . $item['image']['alt'] . '">';
						}
					?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $access ) : ?>
	<div class="blue-bg py80 tryfree">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<p class="h2 left mt0"><?php echo $access['title']; ?></p>
					<a href="<?php echo $access['button']['url']; ?>" class="button w100 mw300 upper d-none d-md-block"
						><?php echo $access['button']['title']; ?></a
					>
				</div>
				<div class="col-md-5">
					<img src="<?php echo $access['image']['url']; ?>" alt="<?php echo $access['image']['alt']; ?>">
				</div>
				<div class="col-md-12 d-md-none">
					<a href="<?php echo $access['button']['url']; ?>" class="button w100 mw300 upper sm-w100"
						><?php echo $access['button']['title']; ?></a
					>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $reviews ) : ?>
	<div class="reviews-carousel py60 lightgray-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 m0a">
					<div class="owl-carousel">
						<?php if ( $reviews['review'] ) :
							foreach( $reviews['review'] as $item ) : ?>
						<div class="row">
							<div class="col-lg-4">
								<picture>
									<img src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['image']['alt']; ?>">
								</picture>
								<picture>
									<img src="<?php echo $item['image_company']['url']; ?>" alt="<?php echo $item['image_company']['alt']; ?>">
								</picture>
							</div>
							<div class="col-lg-8">
								<?php echo $item['description']; ?>
							</div>
						</div>
						<?php endforeach;
						endif; ?>
					</div>
					<div class="center mt20">
						<a href="<?php echo $reviews['button']['url']; ?>" class="button button-gray w100 mw300 sm-w100 upper"><?php echo $reviews['button']['title']; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
