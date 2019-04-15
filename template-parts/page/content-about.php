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

	$description = get_field('description');
	$devis			 = get_field('devis');
	$bg_devis    = get_field('bg_devis');
	$benefits		 = get_field('benefits');
	$clients		 = get_field('clients');

	if ( $description ) : ?>
	<div class="container py60">
		<div class="row">
			<div class="col-12 col-md-6"><?php echo $description['column_1']; ?></div>
			<div class="col-12 col-md-6"><?php echo $description['column_2']; ?></div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $devis ) : ?>
	<div class="deviz" style="background-image: url(<?php echo $bg_devis; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-12">
						<div class="deviz-inner-block">
							<h2 class="py20 my70"><?php echo $devis; ?></h2>
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php endif; ?>
	<?php if ( $benefits ) : ?>
	<div class="lightgray-bg">
		<div class="container">
			<div class="row pt60">
				<div class="col-12 col-md-6">
					<ul class="semicircle">
						<?php if ( $benefits['column_1'] ) : 
							foreach ( $benefits['column_1'] as $item ) :
						?>
						<li><?php echo $item['text']; ?></li>
						<?php 
							endforeach;
						endif; ?>
					</ul>
				</div>
				<div class="col-12 col-md-6">
					<ul class="semicircle">
					<?php if ( $benefits['column_2'] ) : 
							foreach ( $benefits['column_2'] as $item ) :
						?>
						<li><?php echo $item['text']; ?></li>
						<?php 
							endforeach;
						endif; ?>
					</ul>
				</div>
			</div>
			<div class="row pb35">
				<div class="col-lg-10 col-xl-9 m0a">
					<p class="h2"><?php echo $benefits['text']; ?></p>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $clients ) : ?>
	<div class="container mb70">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<div class="h2"><?php echo $clients['title']; ?></div>
			</div>
			<div class="col-12">
				<div class="clients-carousel owl-carousel">
					<?php if ( $clients['carousel'] ) :
						foreach ( $clients['carousel'] as $item ) :
					?>
					<img
						src="<?php echo $item['image']['url']; ?>"
						alt="<?php echo $item['image']['alt']; ?>"
						width="220"
						height="100"
					/>
					<?php 
						endforeach;
					endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
