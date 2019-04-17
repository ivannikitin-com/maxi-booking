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

	$title 			= get_field('title');
	$what_get 	= get_field('what_get');
	$access 		= get_field('access');

	if ( $title ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $title; ?></h2></div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $what_get ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 calc-left mb35">
				<div class="gray-bg py20 px20">
					<?php if ( $what_get['block'] ) :
						foreach( $what_get['block'] as $block ) : ?>
					<div class="item d-flex">
						<img class="align-self-center mr35" style="vertical-align: top" src="<?php echo $block['image']['url']; ?>" width="80" height="80">
						<p class="h3 mb0 align-self-center"><?php echo $block['description']; ?></p>
					</div>
					<?php endforeach;
					endif; ?>
				</div>
			</div>
			<?php echo $what_get['calculator']; ?>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h3 class="center"><?php echo $what_get['description']; ?></h3>
				<p class="center pt60">
					<a href="<?php echo $what_get['button']['url']; ?>" class="button w100 mw300 upper sm-w100"><?php echo $what_get['button']['title']; ?></a>
				</p>
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
					<a href="<?php echo $access['button']['url']; ?>" class="button w100 mw300 upper d-none d-md-block"><?php echo $access['button']['title']; ?></a>
				</div>
				<div class="col-md-5">
					<img src="<?php echo $access['image']['url']; ?>" alt="<?php echo $access['image']['alt']; ?>">
				</div>
				<div class="col-md-12 d-md-none">
					<a href="<?php echo $access['button']['url']; ?>" class="button w100 mw300 upper sm-w100"><?php echo $access['button']['title']; ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
