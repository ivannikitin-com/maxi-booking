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
	$how_work 		= get_field('how_work');
	$steps 				= get_field('steps');
	$benefit 			= get_field('benefit');

	if ( $description ) : ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<h2><?php echo $description['title']; ?></h2>
				</div>
				<div class="row">
					<div class="col-lg-12 col-xl-10 m0a">
						<p class="h3 center pb60"><?php echo $description['text']; ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ( $how_work ) : ?>
	<div class="blue-bg py35">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2 mt0 mb35"><?php echo $how_work['title']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 center">
					<picture>
						<img src="<?php echo $how_work['image']['url']; ?>" alt="<?php echo $how_work['image']['alt']; ?>" />
					</picture>
				</div>
				<div class="col-lg-6">
					<ul class="squaredots mt20">
						<?php if ( $how_work['description'] ) :
							foreach( $how_work['description'] as $item ) : ?>
						<li><?php echo $item['text']; ?></li>
						<?php endforeach;
						endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $steps ) : ?>
	<div class="container py60">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<p class="h2 mt0 mb35"><?php echo $steps['title']; ?></p>
			</div>
		</div>
		<div class="row participant">
			<?php if ( $steps['step'] ) :
				foreach( $steps['step'] as $index => $item ) : ?>
			<div class="col-lg-4">
				<p class="participantnum m0"><?php echo $index + 1; ?></p>
				<p class="participanttext"><?php echo $item['text']; ?></p>
			</div>
			<?php endforeach;
			endif; ?>
			<div class="pt60 m0a">
				<p class="center m0a">
					<a href="<?php echo $steps['button']['url']; ?>" class="button w100 mw300 upper sm-w100"><?php echo $steps['button']['title']; ?></a>
				</p>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $benefit ) : ?>
	<div class="blue-bg py35">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2 mt0 mb35"><?php echo $benefit['title']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 center">
					<picture>
						<img src="<?php echo $benefit['image']['url']; ?>" alt="<?php echo $benefit['image']['alt']; ?>" />
					</picture>
				</div>
				<div class="col-lg-6">
					<ul class="squaredots mt20">
						<?php if ( $benefit['description'] ) :
							foreach( $benefit['description'] as $item ) : ?>
						<li><?php echo $item['text']; ?></li>
						<?php endforeach;
						endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="begin py80">
		<div class="container">
			<div class="row beginrow">
				<div class="col-12">
					<div class="buttonblock m0a center">
						<a href="<?php echo $benefit['button']['url']; ?>" class="button w100 mw300 upper"><?php echo $benefit['button']['title']; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
