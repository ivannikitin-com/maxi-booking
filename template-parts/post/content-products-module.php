<?php

include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :

  $advanced_field = get_field('advanced_field');

  if ( $advanced_field['header'] ) :
    echo $advanced_field['header'];
  endif;

  if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<div id="breadcrumbs"><div class="container">','</div></div>' );
  }

  if ( $advanced_field['content'] ) :
    echo $advanced_field['content'];
  endif;

endif;