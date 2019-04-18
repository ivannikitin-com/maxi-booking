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

	$reviews 				= get_field('reviews');
	$button					= get_field('button');
	$access					= get_field('access');
	$page_bottom		= get_field('page_bottom');

	if ( $reviews ) : ?>
	<div class="reviews-block">
		<?php foreach( $reviews as $review ) : ?>
		<div class="onereview py35 lightgray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<picture>
							<img
								src="<?php echo $review['image']['url']; ?>"
								alt="<?php echo $review['image']['alt']; ?>"
							/>
						</picture>
						<picture>
							<img
								src="<?php echo $review['image_company']['url']; ?>"
								alt="<?php echo $review['image_company']['alt']; ?>"
							/>
						</picture>
					</div>
					<div class="col-lg-8">
						<?php echo $review['description']; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php if ( $button ) : ?>
		<div class="container addareview mb70">
			<div class="row">
				<div class="col-12">
					<div class="mt20">
						<a href="<?php echo $button['url']; ?>" class="button button-gray w100 mw300 sm-w100 upper"><?php echo $button['title']; ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<?php if ( $access ) : ?>
	<div class="blue-bg py80 tryfree">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<p class="h2 left mt0"><?php echo $access['title']; ?></p>
					<a href="<?php echo $access['button']['url']; ?>" class="button w100 mw300 upper d-none d-md-block"><?php echo $access['button']['title']; ?></a>
				</div>
				<div class="col-md-5">
					<picture>
						<img src="<?php echo $access['image']['url']; ?>" alt="<?php echo $access['image']['alt']; ?>" />
					</picture>
				</div>
				<div class="col-md-12 d-md-none">
					<a href="<?php echo $access['button']['url']; ?>" class="button w100 mw300 upper sm-w100"><?php echo $access['button']['title']; ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $page_bottom ) : ?>
	<div class="page-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2">
						<?php echo $page_bottom['title']; ?>
					</p>
				</div>
			</div>
		</div>
		<div class="image" style="background-image: url(<?php echo $page_bottom['image']['url']; ?>);">
			<picture class="d-md-none">
				<img
					sizes="(max-width: 575px) 575px, 767px"
					src="<?php echo $page_bottom['image']['url']; ?>"
					alt="<?php echo $page_bottom['image']['alt']; ?>"
				/>
			</picture>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
