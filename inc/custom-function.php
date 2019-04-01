<?php

add_filter( 'upload_mimes', 'upload_allow_types' );

function upload_allow_types( $mimes ) {
    // разрешаем новые типы
    // https://wp-kama.ru/id_8643/spisok-rasshirenij-fajlov-i-ih-mime-tipov.html
	$mimes['svg']  = 'image/svg+xml';

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

// Remove jquery-migrate
function isa_remove_jquery_migrate( &$scripts ) {
    if( !is_admin() ) {
    $scripts->remove( 'jquery' );
    $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
    }
   }
   add_filter( 'wp_default_scripts', 'isa_remove_jquery_migrate' );