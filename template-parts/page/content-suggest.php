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
	$description 	= get_field('description');

	if ( $title ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h2>
					<?php echo $title; ?>
				</h2>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="lightgray-bg py60">
		<div class="container">
		<?php if ( $description ) : ?>
			<div class="row">
				<div class="col-12">
					<p class="h3">
						<?php echo $description['title']; ?>
					</p>
					<div class="h3 gray-link">
						<?php echo $description['text']; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
			<div class="row">
				<div class="col-lg-6">
					<?php echo do_shortcode( '[contact-form-7 id="561" title="Предложения по улучшению сервиса"]' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
