<?php

class Product_PMS extends WP_Widget {
  public function __construct() {
    $options = array(
      'classname'   => 'product_pms_widget',
    );

    parent::__construct(
      'product_pms_widget_max_book', 'Product PMS',
      $options
    );
  }

  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    ?>
      <a href="#">
        <img src="<?php echo esc_url($instance['image_uri']); ?>" />
				<p class="h3 pt20">Модуль<br>бронирования</p>
      </a>
    <?php

    // Keep this line
    echo $args['after_widget'];
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['text'] = strip_tags( $new_instance['text'] );
    $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );

    return $instance;
  }

  public function form( $instance ) {
    ?>
    <p>
      <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image</label>
      <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
      <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
      <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
    </p>
    <?php
  }
}

// Register the widget
function product_pms_register_widget() {
  register_widget( 'Product_PMS' );
}
add_action( 'widgets_init', 'product_pms_register_widget' );

// Enqueue additional admin scripts
add_action('admin_enqueue_scripts', 'ctup_wdscript');
function ctup_wdscript() {
    wp_enqueue_media();
    wp_enqueue_script('ads_script', get_template_directory_uri() . '/assets/js/widget.js', false, '1.0.0', true);
}