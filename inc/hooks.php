<?php
function max_book_add_footer_custom() {
    ?>
    <div id="postload"></div>
    <style id="postload-style"></style>
    <script async>
        jQuery(document).ready(function () {
            <?php if ( ! is_front_page() ) : ?>
            jQuery("#postload").append('<link href="<?php bloginfo("template_url"); ?>/assets/css/blog-fonts.css" rel="stylesheet preload" type="text/css" as="style" />'); //@import url('https://fonts.googleapis.com/css?family=Lora:400,400i,700|Montserrat:500,600&subset=cyrillic');
            <?php endif; ?>
            jQuery("#postload-style").append("@font-face{ font-family: 'VaccineSansWebRegular';font-display: swap; src: url('<?php bloginfo("template_url"); ?>/assets/fonts/VCS55__W.eot'); src: url('<?php bloginfo("template_url"); ?>/assets/fonts/VCS55__W.eot?#iefix') format('embedded-opentype'), url('<?php bloginfo("template_url"); ?>/assets/fonts/VCS55__W.woff2') format('woff2'), url('<?php bloginfo("template_url"); ?>/assets/fonts/VCS55__W.woff') format('woff'), url('<?php bloginfo("template_url"); ?>/assets/fonts/VCS55__W.ttf') format('truetype'), url('<?php bloginfo("template_url"); ?>/assets/fonts/VCS55__W.svg#VaccineSansWeb-Regular') format('svg'); font-weight: normal; font-style: normal; }");
        });
    </script>
    <?php
}
add_action( 'wp_footer', 'max_book_add_footer_custom', 99 );

function max_book_page_blog_related_post() {
    global $post;

    // Подборка по tags
    $related_tax = 'category';

    // Gолучаем ID всех элементов (категорий, меток или таксономий), к которым принадлежит текущий пост
    $cat_tags_or_taxes = wp_get_object_terms( $post->ID, $related_tax, array( 'fields' => 'ids' ) );

    // Массив параметров
    $args = array(
        'posts_per_page' => 8,
        'post__not_in' => array( $post->ID ),
        'tax_query'      => array(
            array(
                'taxonomy'          => $related_tax,
                'field'             => 'id',
                'include_children'  => false,
                'terms'             => $cat_tags_or_taxes,
                'operator'          => 'IN'
            )
        )
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
    ?>
    <div class="container bottom-widgets mt20">
        <div class="row">
            <div class="col-12"><hr><h2><?php esc_html_e( 'Popular articles', 'max_book' ); ?></h2></div>
            <div class="col-12">
                <div class="popular-widget owl-carousel monserrat">
                    <?php while( $query->have_posts() ) :
                        $query->the_post();
                        $ID = $query->post->ID;
                    ?>
                        <div class="item">
                            <a href="<?php echo get_permalink( $ID ); ?>" class="image">
                                <picture>
                                    <?php echo get_the_post_thumbnail( $ID ); ?>
                                </picture>
                            </a>
                            <p><small class="inline"><?php echo get_the_title( $query->post->ID ); ?></small></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    endif;

    wp_reset_postdata();
}

add_action( 'page_blog', 'max_book_page_blog_related_post', 0 );

// Get zone domain and insert in tag body
add_filter('body_class', function( $classes ) {
    $siteURL = $_SERVER['SERVER_NAME'];

    $explodeSiteURL = explode( '.', $siteURL );
    $result = array_pop( $explodeSiteURL );

    switch ($result) {
        case 'ru':
            $classes[] = 'ru';

            return $classes;
            break;

        case 'com':
            $classes[] = 'en';

            return $classes;
            break;

        default:
            return $classes;
            break;
    }
});

function get_zone_domain() {

}