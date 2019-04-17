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

  public function products_posts() {
    $args = array(
      'post_type' => 'products'
    );

    return get_posts( $args );
  }

  public function widget( $args, $instance ) {
    $ID = $instance['post_products'];

    if ( ! empty( $ID ) ) :
    echo $args['before_widget'];
    ?>
      <a href="<?php echo get_the_permalink( $ID ); ?>">
        <?php echo get_the_post_thumbnail( $ID ); ?>
        <p class="h3 pt20"><?php echo get_the_title( $ID ); ?></p>
      </a>
    <?php
    // Keep this line
    echo $args['after_widget'];
    endif;
  }

  public function form( $instance ) {
    $productsPosts = $this->products_posts();
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'post_products' ); ?>"><?php _e( 'Тип записи', 'max_book' ); ?>:</label><br>
      <select name="<?php echo $this->get_field_name( 'post_products' ); ?>" id="<?php echo $this->get_field_id( 'post_products' ); ?>" style="width: 100%; display: block;">
        <option value=""><?php echo esc_html__( 'Выбрать запись', 'max_book' ) ?></option>
        <?php foreach( $productsPosts as $key => $value ) : ?>
        <option value="<?php echo $value->ID; ?>" <?php echo $instance['post_products'] == $value->ID ? 'selected' : ''; ?>><?php echo $value->post_title; ?></option>
        <?php endforeach; ?>
      </select>

    </p>
    <?php
  }


  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['post_products'] = ( ! empty( $new_instance['post_products'] ) ) ? strip_tags( $new_instance['post_products'] ) : '';

    return $instance;
  }
}

// Register the widget
function product_pms_register_widget() {
  register_widget( 'Product_PMS' );
}
add_action( 'widgets_init', 'product_pms_register_widget' );