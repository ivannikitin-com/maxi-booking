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

	$proces 						= get_field('proces');
	$governments 				= get_field('governments');
	$benefits						= get_field('benefits');
	$benefits_advanced 	= get_field('benefits_advanced');
	// transaction_log и interactive_chess перепутаны названиями не стал менять, было лень занового вносить инфу:))
	$transaction_log		= get_field('transaction_log');
	$interactive_chess	= get_field('interactive_chess');
	$control_system			= get_field('control_system');
	$for_whom						= get_field('for_whom');
	$for_what						= get_field('for_what');
	$issue							= get_field('issue');
	$what_include				= get_field('what_include');
	$description				= get_field('description');

	if ( $proces ) : ?>
	<div class="container pb35">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h2><?php echo $proces['title']; ?></h2>
				<h3 class="center"><?php echo $proces['after_title']; ?></h3>
			</div>
		</div>
		<div class="row krest">
			<?php if ( $proces['governments'] ) :
				foreach( $proces['governments'] as $item ) : ?>
			<div class="col-6 col-md-4"><div><?php echo $item['government']; ?></div></div>
			<?php endforeach;
			endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if( $governments ) :
		foreach( $governments as $item ) : ?>
	<div class="darkblue-bg d-none d-md-block">
		<div class="container">
			<div class="row">
				<?php if ( $item['block'] ) :
					foreach ( $item['block'] as $item_block ) : ?>
				<div class="col-md-4"><h3 class="white-col my20"><?php echo $item_block['title']; ?></h3></div>
				<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>

	<div class="container py35">
		<div class="row">
			<?php if ( $item['block'] ) :
				foreach ( $item['block'] as $item_block ) : ?>
			<div class="col-md-4">
				<h3><?php echo $item_block['title']; ?></h3>
				<p><?php echo $item_block['description']; ?></p>
			</div>
			<?php endforeach;
				endif; ?>
		</div>
	</div>
	<?php endforeach;
	endif; ?>
	<?php if ( $benefits ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a">
				<h2><?php echo $benefits['title']; ?></h2>
			</div>
		</div>
	</div>
	<div class="preimushestva" style="background-image: url(<?php echo $benefits['bg']['url']; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-lg-7 black-transp-bg py35 px30">
					<ul class="bulllist-white">
						<?php if ( $benefits['items'] ) :
							foreach( $benefits['items'] as $item ) : ?>
						<li><?php echo $item['text']; ?></li>
						<?php endforeach;
						endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $benefits_advanced ) : ?>
	<div class="container py35">
		<div class="row">
			<?php foreach( $benefits_advanced as $item ) : ?>
			<div class="col-md-6">
				<?php echo $item['text']; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $transaction_log ) : ?>
	<div class="gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $transaction_log['title']; ?></h2></div>
			</div>
			<div class="row">
				<div class="col-12 pad-graylist">
					<img src="<?php echo $transaction_log['image']['url']; ?>">
					<div class="list">
					<ul>
						<?php if ( $transaction_log['benefits'] ) :
							foreach( $transaction_log['benefits'] as $benefit ) : ?>
						<li><?php echo $benefit['text']; ?></li>
						<?php endforeach;
						endif; ?>
					</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container py35">
			<div class="row">
				<?php if ( $transaction_log['description'] ) :
					foreach( $transaction_log['description'] as $text ) : ?>
				<div class="col-md-6"><p><?php echo $text['text']; ?></p></div>
				<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $interactive_chess ) : ?>
	<div class="blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $interactive_chess['title']; ?></h2></div>
			</div>
			<div class="row">
				<div class="col-12 pad-graylist">
					<img src="<?php echo $interactive_chess['image']['url']; ?>">
					<div class="list">
					<ul>
						<?php if ( $interactive_chess['benefits'] ) :
							foreach( $interactive_chess['benefits'] as $benefit ) : ?>
						<li><?php echo $benefit['text']; ?></li>
						<?php endforeach;
						endif; ?>
					</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container py35">
			<div class="row">
				<?php if ( $interactive_chess['description'] ) :
					foreach( $interactive_chess['description'] as $text ) : ?>
				<div class="col-md-6"><p><?php echo $text['text']; ?></p></div>
				<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $control_system ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $control_system['title']; ?></h2></div>
		</div>
		<div class="row">
			<?php if ( $control_system['items'] ) :
				foreach( $control_system['items'] as $item ) : ?>
			<div class="col-md-4 center mb20">
				<img src="<?php echo $item['image']['url']; ?>">
				<p class="h3 mt20"><?php echo $item['title']; ?></p>
				<p><?php echo $item['description']; ?></p>
			</div>
			<?php endforeach;
			endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $for_whom ) : ?>
	<div class="gray-bg">
		<div class="container pb35">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $for_whom['title']; ?></h2></div>
			</div>
			<div class="row">
				<?php if( $for_whom['items'] ) :
					foreach( $for_whom['items'] as $item ) : ?>
				<div class="col-md-4 center mb20">
					<img src="<?php echo $item['image']['url']; ?>">
					<p class="mt20"><?php echo $item['description']; ?></p>
				</div>
				<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $for_what ) : ?>
	<div class="container pt60">
		<div class="row">
			<?php if ( $for_what['items'] ) :
				foreach( $for_what['items'] as $item ) : ?>
			<div class="col-md-6">
				<?php echo $item['description'] ?>
			</div>
			<?php endforeach;
			endif; ?>
			<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $for_what['title']; ?></h2></div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $issue ) : ?>
	<div class="blue-bg py80 tryfree">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<p class="h2 left mt0"><?php echo $issue['title'] ?></p>
					<a href="<?php echo $issue['button']['url']; ?>" class="button w100 mw300 upper d-none d-md-block"><?php echo $issue['button']['title']; ?></a>
				</div>
				<div class="col-md-5">
					<img src="<?php echo $issue['image']['url']; ?>" alt="<?php echo $issue['image']['alt']; ?>">
				</div>
				<div class="col-md-12 d-md-none">
					<a href="<?php echo $issue['button']['url']; ?>" class="button w100 mw300 upper sm-w100"><?php echo $issue['button']['title']; ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $what_include ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $what_include['title']; ?></h2></div>
		</div>
		<div class="row include">
			<?php if ( $what_include['products'] ) :
				foreach( $what_include['products'] as $product ) : ?>
			<div class="col-md-3 center mb20">
				<a href="<?php echo get_the_permalink( $product->ID ); ?>">
					<?php echo get_the_post_thumbnail( $product->ID ); ?>
					<p class="h3 mt20"><?php echo get_the_title( $product->ID ); ?></p>
				</a>
			</div>
			<?php endforeach;
			endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ( $description ) : ?>
	<div class="gray-bg">
		<div class="container pb35">
			<div class="row">
				<div class="col-lg-10 col-xl-9 m0a"><h2><?php echo $description['title']; ?></h2></div>
			</div>
			<div class="row">
				<?php if ( $description['items'] ) :
					foreach( $description['items'] as $item ) : ?>
				<div class="col-md-6">
					<?php echo $item['text']; ?>
				</div>
				<?php endforeach;
				endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
