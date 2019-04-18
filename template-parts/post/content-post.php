<?php

include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) :

  $advanced_field = get_field('advanced_field');

  if ( $advanced_field['content'] ) :
    echo $advanced_field['content'];
  endif;

endif;