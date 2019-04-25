<?php

add_filter( 'upload_mimes', 'upload_allow_types' );

function upload_allow_types( $mimes ) {
    // разрешаем новые типы
    // https://wp-kama.ru/id_8643/spisok-rasshirenij-fajlov-i-ih-mime-tipov.html
    $mimes['svg']  = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';

	return $mimes;
}

// Optimize
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );

function disable_wp_emojicons() {
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
add_filter( 'emoji_svg_url', '__return_false' );

// Change Contact Form 7 span-wrap
add_filter( 'wpcf7_form_elements', function($content) {
    $formfind = '/wpcf7-form-control-wrap/';
    $formreplace = 'wpcf7-form-control-wrap formspan';

    $content = preg_replace( $formfind, $formreplace, $content );

    return $content;
});

add_filter( 'wpcf7_form_class_attr', function($class) {
    $newClass = $class . ' form';

    return $newClass;
} );

// Remove title archive
function theme_archive_title($title)
{
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  } elseif (is_tax()) {
    $title = single_term_title('', false);
  }

  return $title;
}

add_filter('get_the_archive_title', 'theme_archive_title');

// Custom pagination
function wpbeginner_numeric_posts_nav() {

  if( is_singular() )
      return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
      return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }

  echo '<nav class="pagination">' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
      printf( '%s' . "\n", get_previous_posts_link('') );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class="active"' : '';

      printf( '<a href="%s">%s</a>' . "\n", esc_url( get_pagenum_link( 1 ) ), '1' );

      if ( ! in_array( 2, $links ) )
          echo '<span>…</span>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="active"' : '';

      if ( $class ) {
        printf( '<span%s>%s</span>' . "\n", $class, $link );
      } else {
        printf( '<a href="%s">%s</a>' . "\n", esc_url( get_pagenum_link( $link ) ), $link );
      }
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<span>…</span>' . "\n";

      $class = $paged == $max ? ' class="active"' : '';

      if ( $class ) {
        printf( '<span%s>%s</span>' . "\n", $class, $max );
      } else {
        printf( '<a href="%s">%s</a>' . "\n", esc_url( get_pagenum_link( $max ) ), $max );
      }
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
      printf( '%s' . "\n", get_next_posts_link('') );

  echo '</nav>' . "\n";

}


// Add custom cluss for paginate next and previous
add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_previous');

function posts_link_attributes_next() {
    return 'class="next"';
}

function posts_link_attributes_previous() {
    return 'class="previous"';
}

function acf_wysiwyg_remove_wpautop() {
  remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

// Deregister custom files
function wps_deregister_styles() {
  wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

// Отключаем сам REST API
// add_filter('rest_enabled', '__return_false');

// Отключаем фильтры REST API
// remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
// remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
// remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
// remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
// remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Отключаем события REST API
// remove_action( 'init', 'rest_api_init' );
// remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
// remove_action( 'parse_request', 'rest_api_loaded' );

// Отключаем Embeds связанные с REST API
// remove_action( 'rest_api_init', 'wp_oembed_register_route');
// remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );


function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_footer', 'my_deregister_scripts' );

// Подключение css и js Contact Form 7, только на указанных страницах
function my_deregister_javascript(){
	if( ! is_page ( array( 1266 ) ) ){
		wp_deregister_script( 'contact-form-7' ); // отключаем скрипты плагина
		wp_deregister_style( 'contact-form-7' ); // отключаем стили плагина
	}
}

add_action('wp_print_styles', 'my_deregister_javascript', 100 );

// Remove p br in "the_content"
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// Search in constents
function filter_search($query) {
    if ($query->is_search) {
    $query->set('post_type', array('post', 'page'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');