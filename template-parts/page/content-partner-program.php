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

	$main_title 	= get_field('main_title');
	$description 	= get_field('description');
	$partner			= get_field('partner');
	$how_work			= get_field('how_work');

	if ( $main_title ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h2><?php echo $main_title; ?></h2>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $description ) : ?>
	<div class="container shahm">
		<?php foreach ( $description as $index => $item ) : ?>
			<?php if ( ($index + 1) % 2 == 0) : ?>
			<div class="row lightgray-bg">
				<?php
					if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
						echo '<div class="col-md-6 col-12 partnery imageblock" style="background-image: url('. $item['block']['image_webp'] .');"></div>';
					} else {
						echo '<div class="col-md-6 col-12 partnery imageblock" style="background-image: url('. $item['block']['image'] .');"></div>';
					}
				?>
				<div class="col-md-6 col-12 textblock">
					<p class="h3"><?php echo $item['block']['title']; ?></p>
					<?php echo $item['block']['text']; ?>
				</div>
			</div>
			<?php	else : ?>
			<div class="row">
				<div class="col-md-6 col-12 textblock">
					<p class="h3"><?php echo $item['block']['title']; ?></p>
					<?php echo $item['block']['text']; ?>
				</div>
				<?php
					if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
						echo '<div class="col-md-6 col-12 dohod imageblock" style="background-image: url('. $item['block']['image_webp'] .');"></div>';
					} else {
						echo '<div class="col-md-6 col-12 dohod imageblock" style="background-image: url('. $item['block']['image'] .');"></div>';
					}
				?>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php if ( $partner ) : ?>
	<?php
		if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
			echo '<div class="begin py35" style="  background-image: url('. $partner['bg_webp'] .');">';
		} else {
			echo '<div class="begin py35" style="  background-image: url('. $partner['bg'] .');">';
		}
	?>
	<div class="container">
		<div class="row beginrow">
			<div class="col-12">
				<div class="h2block mb35">
					<p class="h2 m0a py20">
						<?php echo $partner['title']; ?>
					</p>
				</div>
				<div class="buttonblock m0a center">
					<a href="<?php echo $partner['button']['url']; ?>" class="button w100 mw300 upper"><?php echo $partner['button']['title']; ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $how_work ) : ?>
	<div class="container mb70">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<p class="h2"><?php echo $how_work['title']; ?></p>
			</div>
		</div>
		<div class="row">
			<?php if ( $how_work['items'] ) :
				foreach ($how_work['items'] as $index => $item) :
			?>
			<div class="col-md-3 col-6">
				<p class="partners-number"><?php echo $index + 1; ?></p>
				<p class="center h3"><?php echo $item['text']; ?></p>
			</div>
			<?php endforeach;
			endif; ?>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
