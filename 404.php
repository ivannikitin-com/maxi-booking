<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MaxiBooking
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="page-404">

			<section class="error-404 not-found container">
				<div class="row">
					<div class="col-12">

						<header class="page-header">
							<p class="h2 center mb0 mt35" style="font-size: 60px;">404</p>
							<h1 class="mt0"><br><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'max_book' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content pb60 center">
							<p>
								<?php //esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'max_book' ); ?>
								Похоже, что ничего не было найдено в этом месте. Может быть, попробуйте одну из ссылок ниже или навигацию по меню?
							</p>


							<?php
							get_search_form();
							//the_widget( 'WP_Widget_Recent_Posts' );
							?>



							<?php
							/* translators: %1$s: smiley */
							//$max_book_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'max_book' ), convert_smilies( ':)' ) ) . '</p>';
							//the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$max_book_archive_content" );

							//the_widget( 'WP_Widget_Tag_Cloud' );
							?>
						</div><!-- .page-content -->
					</div>
				</div>
			</section><!-- .error-404 -->

			<div class="container">
				<div class="row include mt35">
					<div class="col-md-3 center mb20">
						<a href="/produkty/modul-onlajn-bronirovaniya/">
							<img src="/wp-content/uploads/products_pms/icon_incl_mb.png">
							<p class="h3 mt20">Модуль бронирования</p>
						</a>
					</div>
					<div class="col-md-3 center mb20">
						<a href="/produkty/channel-manager/">
							<img src="/wp-content/uploads/products_pms/icon_incl_ch.png">
							<p class="h3 mt20">Менеджеров каналов</p>
						</a>
					</div>
					<div class="col-md-3 center mb20">
						<a href="/produkty/pms-dlya-otelya/">
							<img src="/wp-content/uploads/products_pms/icon_incl_cl.png">
							<p class="h3 mt20">PMS для отеля</p>
						</a>
					</div>
					<div class="col-md-3 center mb20">
						<a href="/produkty/sajt-dlya-otelya/">
							<img src="/wp-content/uploads/products_pms/icon_incl_cs.png">
							<p class="h3 mt20">Готовый сайт для отеля</p>
						</a>
					</div>
				</div>
			</div>


			<div class="blue-bg py80 tryfree">
				<div class="container">
					<div class="row">
						<div class="col-md-7">
							<p class="h2 left mt0">Оформите доступ к программе<br>прямо сейчас и получите 15 дней<br>бесплатного подключения.<br>Без обязательств.</p>
							<a href="https://login.maxi-booking.ru/registration" class="button w100 mw300 upper d-none d-md-block">Попробовать бесплатно</a>
						</div>
						<div class="col-md-5">
							<picture>
								<source srcset="/wp-content/uploads/main/comp.webp" type="image/webp">
								<source srcset="/wp-content/uploads/main/comp.jpg" type="image/jpeg">
								<img src="/wp-content/uploads/main/comp.jpg" alt="">
							</picture>
						</div>
						<div class="col-md-12 d-md-none">
							<a href="https://login.maxi-booking.ru/registration" class="button w100 mw300 upper sm-w100">Попробовать бесплатно</a>
						</div>
					</div>
				</div>
			</div>




		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
