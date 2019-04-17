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
	$government 	= get_field('government');
	$update			 	= get_field('update');
	$integrate	 	= get_field('integrate');
	$access	 			= get_field('access');
	$description	= get_field('description');

	if ( $title ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h2><?php echo $title; ?></h2>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $government ) : ?>
	<div class="container">
		<?php foreach ( $government as $index => $block ) : ?>
			<?php if ( ( $index + 1 ) % 2 != 0 ) : ?>
			<div class="row">
				<?php if ( $block['block'] ) :
					foreach ( $block['block'] as $item ) : ?>
					<div class="col-xs-12 col-md-6"><?php echo $item['text']; ?></div>
				<?php endforeach;
				endif; ?>
			</div>
			<?php else : ?>
			<div class="row mb70">
				<?php if ( $block['block'] ) :
					foreach ( $block['block'] as $index => $item ) : ?>
					<div class="col-lg-12"><?php echo $item['text']; ?></div>
				<?php endforeach;
				endif; ?>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php if ( $update ) : ?>
	<div class="lightgray-bg pb60">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2"><?php echo $update['title']; ?></p>
				</div>
			</div>
			<div class="row">
				<?php if ( $update['items'] ) :
					foreach( $update['items'] as $index => $item ) : ?>
				<div class="col-lg-4 cir<?php echo $index + 1; ?>">
					<div class="wpb_wrapper">
						<div class="circleblock">
							<div class="wrapper1">
								<div class="circle1 left-anim">
									<span class="invisible">invisible</span>
								</div>
								<div class="circle1 right-anim">
									<span class="invisible">invisible</span>
								</div>
							</div>
						</div>
					</div>
					<p class="circle-p"><?php echo $item['text']; ?></p>
				</div>
				<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $integrate ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<p class="h2"><?php echo $integrate['title']; ?></p>
			</div>
		</div>
		<div class="row">
			<?php if ( $integrate['images'] ) :
				foreach( $integrate['images'] as $image ) : ?>
			<div class="col-lg-2 col-md-2 col-sm-4 col-4">
				<img src="<?php echo $image['image']['url']; ?>" alt="<?php echo $image['image']['alt']; ?>" />
			</div>
			<?php endforeach;
			endif; ?>
		</div>
		<div class="row pb60">
			<div class="col-lg-12">
				<p class="mt35"><?php echo $integrate['after_title']; ?></p>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $access ) : ?>
	<div class="blue-bg py80 tryfree">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<p class="h2 left mt0">
						<?php echo $access['title']; ?>
					</p>
					<a href="<?php echo $access['button']['url']; ?>" class="button w100 mw300 upper d-none d-md-block"
						><?php echo $access['button']['title']; ?></a
					>
				</div>
				<div class="col-md-5">
					<img src="<?php echo $access['image']['url']; ?>" alt="<?php echo $access['image']['alt']; ?>" />
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
		<div class="row pt60">
			<div class="col-lg-12">
				<?php echo $description['description']; ?>
			</div>
		</div>
		<div class="row pb60">
			<?php if ( $description['block'] ) :
				foreach ( $description['block'] as $block ) : ?>
			<div class="col-lg-6"><?php echo $block['text']; ?></div>
			<?php endforeach;
			endif; ?>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
