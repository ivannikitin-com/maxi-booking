<?php
$quote      = get_field('quote');
$photograph = get_field('photograph');
$thumb      = get_field('thumb');
?>

<div class="container blog-post-top">
	<div class="row">
		<div class="col-lg-5">
      <?php
      if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
		  } ?>
			<div class="category">
        <?php
						$posttags = get_the_tags();
						if ($posttags) {
							foreach($posttags as $tag) {
								echo $tag->name . ' ';
							}
						}
        ?>
      </div>
			<?php the_title( '<h1>', '</h1>' ); ?>
			<div class="author">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
				<div class="info">
					<div class="name"><?php the_author_lastname(); ?> <?php the_author_firstname(); ?></div>
					<div class="desc"><?php the_author_description(); ?></div>
				</div>
			</div>
			<div class="quote"><?php echo $quote; ?></div>
		</div>
		<div class="col-lg-7 image"><div class="desc photo-name"><?php echo $photograph; ?></div></div>
		<?php echo $thumb; ?>
	</div>
</div>

<?php

include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :

  $advanced_field = get_field('advanced_field');

  if ( $advanced_field['content'] ) :
    echo $advanced_field['content'];
  endif;

endif;

do_action( 'page_blog' );

?>