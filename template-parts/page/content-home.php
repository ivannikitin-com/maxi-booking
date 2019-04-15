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
	$slider = get_field('mainslide');
	$banner_title = get_field('banner_title');
	$benefits = get_field('benefits');
	$offer = get_field('offer');
	$clients = get_field('clients');
	$reviews = get_field('reviews');
	$result = get_field('result');
	$finish = get_field('finish');

	if( $slider ): ?>
	<div class="mainslide">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2"><?php echo $slider['mainslide_title']; ?></p>
				</div>
				<div class="col-lg-12">
					<div class="center">
						<picture>
							<img sizes="(max-width: 767px) 510px, 804px" src="<?php echo $slider['mainslide_image']['url']; ?>" width="804" height="455" alt="<?php echo $slider['mainslide_image']['url']; ?>" />
						</picture>
					</div>
				</div>
			</div>
			<div class="row links">
				<?php 
				if ( $slider['mainslide_links'] ) :
					foreach ($slider['mainslide_links'] as $link) :
				?>
				<div class="col-md-4">
					<a href="<?php echo $link['mainslide_link']['url']; ?>" class="h3"><?php echo $link['mainslide_link']['title']; ?></a>
				</div>
				<?php 
					endforeach; 
				endif;
				?>
			</div>
			<div class="row">
				<div class="col-md-4 offset-md-4 center">
					<a href="<?php echo $slider['mainslide_button']['url']; ?>" class="button w100 upper"><?php echo $slider['mainslide_button']['title']; ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( $banner_title ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h1><?php echo $banner_title; ?></h1>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="page-main-slider"></div>

	<?php if ( $benefits ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h2><?php echo $benefits['benefits_title']; ?></h2>
			</div>
		</div>
		<div class="row">
			<?php 
			if ( $benefits['benefits_array'] ) :
				foreach ($benefits['benefits_array'] as $item) : 
			?>
			<div class="col-md-4 center mb80">
				<picture>
					<img src="<?php echo $item['benefits_array_image']['url']; ?>" alt="<?php echo $item['benefits_array_image']['alt']; ?>" class="mb20">
				</picture>
				<div><?php echo $item['benefits_array_description']; ?></div>
			</div>
			<?php 
				endforeach; 
			endif;
			?>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( $offer ) : ?>
	<div class="blue-bg py80 tryfree">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<p class="h2 left mt0"><?php echo $offer['offer_title']; ?></p>
					<a href="<?php echo $offer['offer_button']['url']; ?>" class="button w100 mw300 upper d-none d-md-block"><?php echo $offer['offer_button']['title']; ?></a>
				</div>
				<div class="col-md-5">
					<picture>
						<img src="<?php echo $offer['offer_image']['url']; ?>" alt="<?php echo $offer['offer_image']['alt']; ?>">
					</picture>
				</div>
				<div class="col-md-12 d-md-none">
					<a href="<?php echo $offer['offer_button']['url']; ?>" class="button w100 mw300 upper sm-w100"><?php echo $offer['offer_button']['title']; ?></a>
				</div>

			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( $clients ) : ?>
	<div class="container mb70">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<div class="h2"><?php echo $clients['clients_title']; ?></div>
			</div>
			<div class="col-12">
				<div class="clients-carousel owl-carousel">
					<?php
					if ( $clients['clients_images'] ) :
						foreach ($clients['clients_images'] as $image) : 
					?>
					<img src="<?php echo $image['clients_image']['url']; ?>" alt="<?php echo $image['clients_image']['alt']; ?>" width="220" height="100">
					<?php
						endforeach; 
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( $reviews ) : ?>
	<div class="reviews-carousel py60">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<div class="owl-carousel">
						<?php
						if ( $reviews['reviews_review'] ) :
							foreach ($reviews['reviews_review'] as $review) : 
							?>
							<div class="center">
								<p><?php echo $review['reviews_text']; ?></p>
							</div>
							<?php
							endforeach;
						endif;
						?>
					</div>
					<div class="center mt20">
						<a href="<?php echo $reviews['reviews_button']['url']; ?>" class="button button-gray w100 mw300 sm-w100 upper"><?php echo $reviews['reviews_button']['title']; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( $result ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h2><?php echo $result['result_title']; ?></h2>
			</div>
			<?php
			if ( $result['result_description'] ) :
				foreach ($result['result_description'] as $item) : ?>
				<div class="col-md-6">
					<?php echo $item['result_text']; ?>
				</div>
				<?php
				endforeach;
			endif;
			?>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( $finish ) : ?>
	<div class="page-main-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2"><?php echo $finish['finish_title']; ?></p>
				</div>
			</div>
		</div>
		<div class="image" style="background-image: url(<?php echo $finish['finish_image']['url']; ?>);'">
			<picture class="d-md-none">
				<img sizes="(max-width: 575px) 575px, 767px" src="<?php echo $finish['finish_image']['url']; ?>" alt="<?php echo $finish['finish_image']['alt']; ?>" />
			</picture>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>

