<?php
/**
 * Template part for displaying page content in page-blog.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaxiBooking
 */
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :

	$author = get_field('author');
	$social_links = get_field('social_links');
	$text = get_field('text');
	$description = get_field('description');
	$additional_program = get_field('additional_program');
	$reports = get_field('reports');
	$issue = get_field('issue');
	$reservation = get_field('reservation');
?>

<div class="container blog-post-top">
	<div class="row">
		<div class="col-lg-5">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
			}
			?>
			
			<div class="category"><?php the_tags( '', ', ', '' ); ?></div>
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php if ( $author ) :  ?>
			<div class="author">
				<img src="<?php echo $author['author_image']['url']; ?>" alt="<?php echo $author['author_image']['alt']; ?>">
				<div class="info">
					<div class="name"><?php echo $author['author_name']; ?></div>
					<div class="desc"><?php echo $author['author_about']; ?></div>
				</div>
			</div>
			<div class="quote"><?php echo $author['author_description']; ?></div>
			<?php endif; ?>
		</div>
		<?php if ( $author ) :  ?>
		<div class="col-lg-7 image"><div class="desc photo-name"><?php echo $author['author_name_fotograph']; ?></div></div>
		<style scoped>
			.blog-post-top .image{ background-image: url('<?php echo $author['author_photo']['url']; ?>'); }
		</style>
		<?php endif; ?>
	</div>
</div>
<div class="entry-content container">
	<div class="row">
		<div class="col-lg-1 offset-lg-1">
			<?php if ( $social_links ) : ?>
			<div class="share d-none d-lg-block">
				<div class="share-inner">
					<?php if ( $social_links['social_links_vk']['url'] ) : ?>
						<a href="<?php echo $social_links['social_links_vk']['url']; ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/share/share_vk.svg" alt=""></a>
					<?php endif; ?>
					<?php if ( $social_links['social_links_fs']['url'] ) : ?>
						<a href="<?php echo $social_links['social_links_fs']['url']; ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/share/share_fb.svg" alt=""></a>
					<?php endif; ?>
					<?php if ( $social_links['social_links_twitter']['url'] ) : ?>
						<a href="<?php echo $social_links['social_links_twitter']['url']; ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/share/share_tw.svg" alt=""></a>
					<?php endif; ?>
					<?php if ( $social_links['social_links_google']['url'] ) : ?>
						<a href="<?php echo $social_links['social_links_google']['url']; ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/share/share_g.svg" alt=""></a>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="col-lg-8">
			<?php if ( $text ) :
				echo $text;	
			endif; ?>
		</div>
	</div>
	<?php if ( $description ) : ?>
	<div class="row pad-left mt35">
		<div class="col-lg-7 offset-lg-1">
			<picture>
				<img sizes="(max-width: 767px) 480px, 670px" src="<?php echo $description['description_image']['url']; ?>" alt="<?php echo $description['description_image']['alt']; ?>" />
			</picture>
			<p class="photo-name center"><?php echo $description['description_image_description']; ?></p>
		</div>
		<div class="col-lg-3">
			<?php echo $description['description_description']; ?>
			<a href="<?php echo $description['description_button']['url']; ?>" class="button w100 px15"><?php echo $description['description_button']['title']; ?></a>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $additional_program ) : ?>
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<?php echo $additional_program; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $reports ) : ?>
	<div class="row monserrat">
		<?php foreach ($reports as $key => $repost) : ?>
			<div class="col-lg-2 <?php if ( $key == 0 ) echo "offset-lg-2"; ?>">
				<p><small class="inline"><?php echo $repost['report']; ?></small></p>
			</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>
<?php if ( $social_links ) : ?>
<div class="share-container mb35 mb80 container">
	<div class="row">
		<div class="col-lg-1 offset-lg-1">
			<div class="share d-lg-none">
				<div class="share-inner">
				<?php if ( $social_links['social_links_vk']['url'] ) : ?>
					<a href="<?php echo $social_links['social_links_vk']['url']; ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/share/share_vk.svg" alt=""></a>
				<?php endif; ?>
				<?php if ( $social_links['social_links_fs']['url'] ) : ?>
					<a href="<?php echo $social_links['social_links_fs']['url']; ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/share/share_fb.svg" alt=""></a>
				<?php endif; ?>
				<?php if ( $social_links['social_links_twitter']['url'] ) : ?>
					<a href="<?php echo $social_links['social_links_twitter']['url']; ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/share/share_tw.svg" alt=""></a>
				<?php endif; ?>
				<?php if ( $social_links['social_links_google']['url'] ) : ?>
					<a href="<?php echo $social_links['social_links_google']['url']; ?>"><img src="<?php bloginfo("template_url"); ?>/assets/images/share/share_g.svg" alt=""></a>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if ( $issue ) : ?>
	<div class="notebook-right">
		<div class="notebook-right-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-xl-5">
						<div class="title"><?php echo $issue['issue_title']; ?></div>
						<a href="<?php echo $issue['issue_button']['url']; ?>" class="button upper sm-w100"><?php echo $issue['issue_button']['title']; ?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<picture>
				<img sizes="(max-width: 991px) 575px, (max-width: 1199px) 768px, 953px" src="<?php echo $issue['issue_image']['url']; ?>" alt="<?php echo $issue['issue_image']['alt']; ?>" />
			</picture>
		</div>
	</div>
<?php endif; ?>
<div class="container bottom-widgets mt20">
	<?php if ( $reservation ) : ?>
	<div class="row products-widget">
		<?php foreach ($reservation['reservation_item'] as $key => $item) : ?>
		<div class="col-sm-6 col-lg-3">
			<div class="image"><img src="<?php echo $item['reservation_image']['url']; ?>" alt="<?php echo $item['reservation_image']['alt']; ?>"></div>
			<h4><?php echo $item['reservation_title']; ?></h4>
			<p><small class="inline"><?php echo $item['reservation_description']; ?></small></p>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	

	<?php 
	/**
	 * @hooked max_book_page_blog_recent_post
	 */
	do_action('page_blog'); 
	?>
</div>

<?php endif; ?>

