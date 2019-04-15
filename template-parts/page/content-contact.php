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

	$contact_us = get_field('contact_us');
	$info				= get_field('info');
	$contact		= get_field('contact');

	if ( $contact_us ) : ?>
	<div class="container pb60">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $contact_us['title']; ?></h2></div>
		</div>
		<div class="row">
			<?php
			if ( $contact_us['items'] ) :
				foreach ($contact_us['items'] as $items) :
			?>
			<div class="col-sm-6 col-md-3 center">
				<p><img src="<?php echo $items['image']['url']; ?>"></p>
				<p>
					<?php echo $items['title']; ?><br>
					<?php if ( $items['advanced_link'] ): ?>
						<a href="<?php echo $items['advanced_link']['url']; ?>" class="underline black-col"><small><?php echo $items['advanced_link']['title']; ?></small></a><br>
					<?php endif; ?>
					<a href="<?php echo $items['primary_link']['url']; ?>" class="underline black-col"><?php echo $items['primary_link']['title']; ?></a>
				</p>
			</div>
			<?php
				endforeach;
			endif;
			?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $info ) : ?>
	<div class="contacts-info" style="background-image: url(<?php echo $info['bg']; ?>);">
		<div>
			<div class="container py35">
				<div class="row">
					<div class="col-12">
						<?php echo $info['description']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $contact ): ?>
	<div class="gray-bg map-container black-transp-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-lg-4 col-xl-3">
					<div class="inner white-col px30 py30 black-transp-bg w100 xs-center sm-center">
						<h3 class="white-col xs-center sm-center"><?php echo $contact['title']; ?></h3>
						<?php echo $description; ?>
						<p class="mb0"><a href="<?php echo $contact['link']['url']; ?>" target="_blank" class="underline white-col"><?php echo $contact['link']['title']; ?></a></p>
					</div>
				</div>
			</div>
		</div>
		<?php echo $contact['map']; ?>
	</div>
	<?php endif; ?>
<?php endif; ?>

<?php max_book_post_thumbnail(); ?>
