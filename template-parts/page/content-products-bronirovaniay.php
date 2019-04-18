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

	$title 				= get_field('title');
	$module 			= get_field('module');
	$access 			= get_field('access');
	$description 	= get_field('description');
	$government 	= get_field('government');
	$what_include = get_field('what_include');
	$reach 				= get_field('reach');
	$slider 			= get_field('slider');
	$page_bottom 	= get_field('page_bottom');

	if ( $title ) : ?>
    <div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<h2><?php echo $title; ?></h2>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ( $module ) : ?>
	<div class="container">
		<div class="row py60">
			<div class="col-xs-12 col-md-6">
				<ul class="semicircle">
					<?php if ( $module['description'] ) :
						foreach( $module['description'] as $item ) : ?>
					<li style="background-image: url(<?php echo $item['image']['url']; ?>);"><?php echo $item['text'] ?></li>
					<?php endforeach;
					endif; ?>
				</ul>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="chart">
					<div class="bar-wrap">
						<span class="bar bar-1"></span>
						<span class="bar bar-2"></span>
						<span class="bar bar-3"></span>
						<span class="bar bar-4"></span>
						<span class="bar bar-5"></span>
						<span class="bar bar-6"></span>
						<span class="bar bar-7"></span>
					</div>
					<div class="arr">
						<span class="arrow-chart"></span><img style=" margin-top:90px; display:inline-block;  margin-left:-11px;vertical-align:top;z-index:10;" src="<?php echo $module['image']['url']; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="row mb70">
			<?php if ( $module['advanced'] ) :
				foreach( $module['advanced'] as $block ) : ?>
			<div class="col-lg-3 col-sm-6 col-xs-12">
				<?php echo $block['text']; ?>
			</div>
			<?php endforeach;
			endif; ?>
		</div>
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
						<img src="<?php echo $access['image']['url']; ?>" alt="<?php echo $access['image']['title']; ?>">
					</picture>
				</div>
				<div class="col-md-12 d-md-none">
					<a href="<?php echo $access['button']['url']; ?>" class="button w100 mw300 upper sm-w100"><?php echo $access['button']['title']; ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $description ) : ?>
	<div class="container">
		<div class="row py60">
			<?php if ( $description['block'] ) :
				foreach( $description['block'] as $block ) : ?>
			<div class="col-lg-6"><?php echo $block['text']; ?></div>
			<?php endforeach;
			endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $government ) : ?>
	<div class="lightgray-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2"><?php echo $government['title']; ?></p>
				</div>
			</div>
			<?php echo $government['example']; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $what_include ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<p class="h2"><?php echo $what_include['title']; ?></p>
				<p class="h3 center"><?php echo $what_include['description']; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-11 col-xs-12 m0a mb35 mt20">
				<div class="pay-img">
					<p>
						<?php if ( $what_include['images'] ) :
							foreach( $what_include['images'] as $image ) : ?>
						<img src="<?php echo $image['image']['url']; ?>" alt="<?php echo $image['image']['alt']; ?>" class="mb20">
						<?php endforeach;
						endif; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $reach ) : ?>
	<div class="blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2"><?php echo $reach['title']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<p class="bigimg">
						<picture>
							<img
								src="<?php echo $reach['images']['url']; ?>"
								alt="<?php echo $reach['images']['alt']; ?>"
								class="mb20"
							/>
						</picture>
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $slider ) : ?>
	<div class="bottom-modul-carousel">
		<div class="modul-carousel-info">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-xl-9 m0a">
						<p class="h2"><?php echo $slider['title']; ?></p>
					</div>
				</div>
				<div class="row">
					<div
						class="col-lg-7 col-md-12 modul-form md-center sm-center xs-center">
						<p class="h3">
							<?php echo $slider['description']; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="owl-carousel">
			<?php if ( $slider['carousel'] ) :
				foreach( $slider['carousel'] as $index => $slide ) : ?>
			<div class="modul-slide mslide0<?php echo $index+1; ?>" style="background-image: url(<?php echo $slide['bg']['url']; ?>);">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<picture>
								<img
									src="<?php echo $slide['slide']['url']; ?>"
									alt="<?php echo $slide['slide']['alt']; ?>"
									class="mb20"
								/>
							</picture>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach;
			endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $page_bottom ) : ?>
	<div class="page-main-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2"><?php echo $page_bottom['title']; ?></p>
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
