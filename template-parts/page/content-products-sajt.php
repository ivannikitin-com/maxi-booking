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

	$smart_list 	= get_field('smart_list');
	$logo 				= get_field('logo');
	$how_learn 		= get_field('how_learn');
	$get_website 	= get_field('get_website');
	$keisies 			= get_field('keisies');
	$what_get 		= get_field('what_get');
	$features 		= get_field('features');
	$decision 		= get_field('decision');
	$komu 				= get_field('komu');
	$economy 			= get_field('economy');
	$sait_price 	= get_field('sait-price');
	$description 	= get_field('description');

	if ( $smart_list ) : ?>
	<div class="sajt-smart-list-container container my70">
		<div class="row">
			<?php if ( $smart_list ) :
				foreach( $smart_list as $item ) : ?>
			<div class="col-md-6">
				<ul class="sajt-smart-list">
					<?php if ( $item['block'] ) :
						foreach( $item['block'] as $content ) : ?>
					<li><span class="letter"><?php echo $content['first_word']; ?></span><span class="letter-title h3"><?php echo $content['advanced_text']; ?></span><br><?php echo $content['description']; ?></li>
					<?php endforeach;
					endif; ?>
				</ul>
			</div>
			<?php endforeach;
			endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $logo ) : ?>
	<div class="logos-container pb60">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a">
					<div class="h2"><?php echo $logo['title']; ?></div>
				</div>
				<div class="col-12">
					<?php if ( $logo['block'] ) :
						foreach( $logo['block'] as $block ) : ?>
					<div class="logos">
						<?php if ( $block['logos'] ) :
							foreach( $block['logos'] as $image ) : ?>
						<div><img src="<?php echo $image['image']['url']; ?>" alt="<?php echo $image['image']['alt']; ?>"></div>
						<?php endforeach;
						endif; ?>
					</div>
					<?php endforeach;
					endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $how_learn ) : ?>
	<div class="kak-uznayut py60">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2 class="mt0 left xs-center sm-center"><?php echo $how_learn['title']; ?></h2>
					<img src="<?php echo $how_learn['image']['url']; ?>" class="d-md-none">
					<ul>
						<?php if ( $how_learn['description'] ) :
							foreach( $how_learn['description'] as $text ) : ?>
						<li class="h3"><span><img src="<?php echo $text['image']['url']; ?>"></span><?php echo $text['text']; ?></li>
						<?php endforeach;
						endif; ?>
					</ul>
				</div>
				<div class="col-md-6 d-none d-md-flex">
					<img src="<?php echo $how_learn['image']['url']; ?>">
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $get_website ) : ?>
	<div class="get-website">
		<div class="blue-bg py35 pt60">
			<div class="container first">
				<div class="row">
					<div class="bg" style="background-image: url(<?php echo $get_website['image']['url']; ?>);"></div>
					<div class="col-md-6 sm-center">
						<h2 class="mt0 mb20	left sm-center"><?php echo $get_website['title']; ?></h2>
						<div class="h3 mb0"><?php echo $get_website['description']; ?></div>
						<img src="<?php echo $get_website['image']['url']; ?>" class="d-md-none my35">
					</div>
				</div>
			</div>
		</div>
		<div class="lightblue-bg py35">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="h3 mb0">
							<p class="sm-center"><?php echo $get_website['steps']['title']; ?></p>
							<ol class="mb0">
								<?php if ( $get_website['steps']['step'] ) :
									foreach( $get_website['steps']['step'] as $step ) : ?>
								<li><?php echo $step['text']; ?></li>
								<?php endforeach;
								endif; ?>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blue-bg py35 pb60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 sm-center">
						<div class="h3"><?php echo $get_website['bottom_text']; ?></div>
						<a href="<?php echo $get_website['button']['url']; ?>" class="button upper w100 mw300"><?php echo $get_website['button']['title']; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $keisies ) : ?>
	<div class="container templates pb60">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $keisies['title']; ?></h2></div>
		</div>
		<div class="row">
			<div class="col-12"><div class="h3 center"><?php echo $keisies['description']; ?></div></div>
		</div>
		<div class="row template-links d-none d-md-flex">
			<?php if ( $keisies['keis'] ) :
				foreach( $keisies['keis'] as $keis ) : ?>
			<div class="col-md-4">
				<div class="template-link">
					<img class="text-center aligncenter" src="<?php echo $keis['image']['url']; ?>" alt="<?php echo $keis['image']['alt']; ?>" width="100%"><br>
					<a href="<?php echo $keis['link']; ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Перейти на сайт', 'max_book' ); ?></a>
				</div>
			</div>
			<?php endforeach;
			endif; ?>
		</div>
		<div class="row d-md-none">
			<div class="col-12 col-sm-10 offset-sm-1">
				<div class="template-links-slider owl-carousel">
				<?php if ( $keisies['keis'] ) :
					foreach( $keisies['keis'] as $keis ) : ?>
					<div class="template-link">
						<img class="text-center aligncenter" src="<?php echo $keis['image']['url']; ?>" alt="<?php echo $keis['image']['alt']; ?>" width="100%"><br>
						<a href="<?php echo $keis['link']; ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Перейти на сайт', 'max_book' ); ?></a>
					</div>
					<?php endforeach;
					endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $what_get ) : ?>
	<div class="gray-bg pb35">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a mt0"><h2><?php echo $what_get['title']; ?></h2></div>
			</div>
			<div class="row">
				<?php if ( $what_get['block'] ) :
					foreach( $what_get['block'] as $item ) : ?>
				<div class="col-md-4">
					<?php echo $item['text']; ?>
				</div>
				<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $features ) : ?>
	<div class="blue-bg features">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-lg-10 col-xl-9 m0a mt0"><h2><?php echo $features['title']; ?></h2></div>
				</div>
				<?php if ( $features['block'] ) :
					foreach( $features['block'] as $block ) : ?>
				<div class="col-sm-6 col-md-3 center mb35">
					<p><img src="<?php echo $block['image']['url']; ?>"></p>
					<p class="h3"><?php echo $block['description'] ?></p>
				</div>
				<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $decision ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a mt0">
				<h2><?php echo $decision['title']; ?></h2>
				<p class="h3 center"><?php echo $decision['description']; ?></p>
			</div>
		</div>
	</div>
	<div class="sajt-img2">
		<div class="item">
			<?php if ( $decision['блок'] ) :
				foreach( $decision['блок'] as $index => $item ) : ?>
				<?php if ( ( $index + 1 ) % 2 != 0 ) : ?>
				<div class="row">
					<div class="col-md-6 item-text">
						<div class="h2 left my20 mt0"><?php echo $item['title']; ?></div>
						<p><?php echo $item['description']; ?></p>
						<a class="create" href="<?php echo $item['button']; ?>"><?php esc_html_e( 'Создать сайт', 'maxi_book' ); ?></a>
					</div>
					<div class="col-md-6 item-img" style="background-image: url(<?php echo $item['bg']['url']; ?>);">
						<img src="<?php echo $item['image']['url']; ?>" class="align-self-center py30">
					</div>
				</div>
				<?php else : ?>
				<div class="row">
					<div class="col-md-6 item-img" style="background-image: url(<?php echo $item['bg']['url']; ?>">
						<img src="<?php echo $item['image']['url']; ?>" class="align-self-center py30">
					</div>
					<div class="col-md-6 item-text">
						<div class="h2 left my20 mt0"><?php echo $item['title']; ?></div>
						<p><?php echo $item['description']; ?></p>
						<a class="create" href="<?php echo $item['button']; ?>"><?php esc_html_e( 'Создать сайт', 'maxi_book' ); ?></a>
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach;
			 endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $komu ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a mt0">
				<div class="h2"><?php echo $komu['title']; ?></div>
			</div>
		</div>
	</div>
	<div class="komu py60" style="background-image: url(<?php echo $komu['bg']['url'] ?>);">
		<div class="container">
			<div class="row">
				<?php if ( $komu['block'] ) :
					foreach( $komu['block'] as $block ) : ?>
				<div class="col-md-6">
					<div>
						<p class="center"><img src="<?php echo $block['image']['url']; ?>"></p>
						<p><?php echo $block['description'] ?></p>
					</div>
				</div>
				<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $economy ) : ?>
	<div class="sajt-price py60 pb0 gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-7 xs-center sm-center pb60 align-self-center">
					<div class="h2 left mt0 xs-center sm-center"><?php echo $economy['title']; ?></div>
					<div class="h3"><?php echo $economy['description']; ?></div>
					<a href="<?php echo $economy['button']['url']; ?>" class="button upper w100 mw300"><?php echo $economy['button']['title']; ?></a>
				</div>
				<div class="col-md-5 center">
					<div class="pb60 inline">
						<div class="center d-flex flex-wrap justify-content-around white-bg" style="padding: 65px 30px; border-radius: 1000px; height: 300px; width: 300px;">
							<?php echo $economy['recomended']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $sait_price ) : ?>
	<div class="sajt-price green-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 pb35 align-self-center xs-center sm-center md-center">
					<div class="h2 left mt35 mb20 white-col xs-center sm-center md-center"><?php echo $sait_price['title']; ?></div>
					<div class="h3 white-col"><?php echo $sait_price['description']; ?></div>
					<a href="<?php echo $sait_price['button']['url']; ?>" class="button upper w100 mw300"><?php echo $sait_price['button']['title']; ?></a>
				</div>
				<div class="col-lg-5 center align-self-center">
					<div class="site-tryfree owl-carousel">
						<?php if ( $sait_price['slider'] ) :
							foreach( $sait_price['slider'] as $slide ) : ?>
						<img src="<?php echo $slide['image']['url']; ?>">
						<?php endforeach;
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $description ) : ?>
	<div class="gray-bg py60">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<?php echo $description['block_1']['text_1']; ?>
				</div>
				<div class="col-md-6">
					<?php echo $description['block_1']['text_2']; ?>
				</div>
				<div class="col-md-12">
					<?php echo $description['block_2']['text']; ?>
				</div>
			</div>
			<div class="row mt35">
				<div class="col-md-6">
					<?php echo $description['block_3']['text']; ?>
				</div>
				<div class="col-md-6">
					<?php echo $description['block_4']['text']; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
