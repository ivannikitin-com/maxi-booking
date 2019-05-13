<?php
$quote      = get_field('quote');
$photograph = get_field('photograph');
$thumb      = get_field('thumb');
?>

<div class="container blog-post-top">
	<div class="row">
    <?php if($thumb):  ?>
		<div class="col-lg-5">
		<?php else: ?>
		<div class="col-lg-12">
    <?php endif; ?>
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

    <?php if($thumb):  ?>
		<div class="col-lg-7 image"><div class="desc photo-name"><?php echo $photograph; ?></div></div>
    <?php endif; ?>


		<?php echo $thumb; ?>
	</div>
</div>

<?php

include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :

  $advanced_field = get_field('advanced_field');

  if ( $advanced_field['content'] ) :
    echo $advanced_field['content'];
?>




<div class="notebook-right">
	<div class="notebook-right-inner">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-xl-5">
					<div class="title">Оформите доступ к&nbsp;программе прямо сейчас и&nbsp;получите 15&nbsp;дней бесплатного подключения</div>
					<a href="https://login.maxi-booking.ru/registration" class="button upper sm-w100">Оформить доступ</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
			<picture>
				<source type="image/png" srcset="/wp-content/themes/maxi-booking/assets/images/notebook-right/notebook_img-575w.png 575w, /wp-content/themes/maxi-booking/assets/images/notebook-right/notebook_img-768w.png 768w, /wp-content/themes/maxi-booking/assets/images/notebook-right/notebook_img-953w.png 953w" />
				<img sizes="(max-width: 991px) 575px, (max-width: 1199px) 768px, 953px" src="/wp-content/themes/maxi-booking/assets/images/notebook-right/notebook_img-575w.png" alt="" />
			</picture>
	</div>
</div>

<div class="container bottom-widgets mt20">
	<div class="row products-widget">
		<div class="col-sm-6 col-lg-3">
			<a href="/produkty/sajt-dlya-otelya/">
				<div class="image"><img src="/wp-content/themes/maxi-booking/assets/images/products_website.svg" alt=""></div>
				<h4>Сайт для отеля</h4>
			</a>
			<p><small class="inline">Готов сразу после регистрации в системе MaxiBooking</small></p>
		</div>
		<div class="col-sm-6 col-lg-3">
			<a href="/produkty/channel-manager/">
				<div class="image"><img src="/wp-content/themes/maxi-booking/assets/images/products_channel-manager.svg" alt=""></div>
				<h4>Менеджеров каналов</h4>
			</a>
			<p><small class="inline">Channel Manager Максибукинг – инструмент, позволяющий одновременно управлять всеми необходимыми вам каналами продаж</small></p>
		</div>
		<div class="col-sm-6 col-lg-3">
			<a href="/produkty/modul-onlajn-bronirovaniya/">
				<div class="image"><img src="/wp-content/themes/maxi-booking/assets/images/products_module.svg" alt=""></div>
				<h4>Модуль бронирования</h4>
			</a>
			<p><small class="inline">Увеличивает прямые продажи вашего отеля, подходит для любого сайта и работает без комиссии</small></p>
		</div>
		<div class="col-sm-6 col-lg-3">
			<a href="/produkty/pms-dlya-otelya/">
				<div class="image"><img src="/wp-content/themes/maxi-booking/assets/images/products_pms.svg" alt=""></div>
				<h4>PMS</h4>
			</a>
			<p><small class="inline">Cистема для комплексного управления процессами в гостинице или отеле</small></p>
		</div>
	</div>
</div>






<?php
	endif;

endif;

do_action( 'page_blog' );

?>