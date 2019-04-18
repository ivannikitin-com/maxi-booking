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


// Add inline style in header
function add_inline_style_header() {
    ?>
        <style>
            html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}h1{font-size:2em;margin:.67em 0}hr{box-sizing:content-box;height:0;overflow:visible}pre{font-family:monospace,monospace;font-size:1em}a{background-color:transparent}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}code,kbd,samp{font-family:monospace,monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}img{border-style:none}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;line-height:1.15;margin:0}button,input{overflow:visible}button,select{text-transform:none}button,[type="button"],[type="reset"],[type="submit"]{-webkit-appearance:button}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner{border-style:none;padding:0}button:-moz-focusring,[type="button"]:-moz-focusring,[type="reset"]:-moz-focusring,[type="submit"]:-moz-focusring{outline:1px dotted ButtonText}fieldset{padding:.35em .75em .625em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{vertical-align:baseline}textarea{overflow:auto}[type="checkbox"],[type="radio"]{box-sizing:border-box;padding:0}[type="number"]::-webkit-inner-spin-button,[type="number"]::-webkit-outer-spin-button{height:auto}[type="search"]{-webkit-appearance:textfield;outline-offset:-2px}[type="search"]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}details{display:block}summary{display:list-item}template{display:none}[hidden]{display:none}body,button,input,select,optgroup,textarea{color:#404040;font-family:sans-serif;font-size:16px;font-size:1rem;line-height:1.5}h1,h2,h3,h4,h5,h6{clear:both}p{margin-bottom:1.5em}dfn,cite,em,i{font-style:italic}blockquote{margin:0 1.5em}address{margin:0 0 1.5em}pre{background:#eee;font-family:"Courier 10 Pitch",Courier,monospace;font-size:15px;font-size:.9375rem;line-height:1.6;margin-bottom:1.6em;max-width:100%;overflow:auto;padding:1.6em}code,kbd,tt,var{font-family:Monaco,Consolas,"Andale Mono","DejaVu Sans Mono",monospace;font-size:15px;font-size:.9375rem}abbr,acronym{border-bottom:1px dotted #666;cursor:help}mark,ins{background:#fff9c0;text-decoration:none}big{font-size:125%}html{box-sizing:border-box}*,:before,:after{box-sizing:inherit}body{background:#fff}hr{background-color:#ccc;border:0;height:1px;margin-bottom:1.5em}ul,ol{margin:0 0 1.5em 3em}ul{list-style:disc}ol{list-style:decimal}li > ul,li > ol{margin-bottom:0;margin-left:1.5em}dt{font-weight:700}dd{margin:0 1.5em 1.5em}img{height:auto;max-width:100%}figure{margin:1em 0}table{margin:0 0 1.5em;width:100%}button,input[type="button"],input[type="reset"]{border:1px solid;border-color:#ccc #ccc #bbb;border-radius:3px;background:#e6e6e6;color:rgba(0,0,0,0.8);font-size:12px;font-size:.75rem;line-height:1;padding:.6em 1em .4em}button:hover,input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover{border-color:#ccc #bbb #aaa}button:active,button:focus,input[type="button"]:active,input[type="button"]:focus,input[type="reset"]:active,input[type="reset"]:focus,input[type="submit"]:active,input[type="submit"]:focus{border-color:#aaa #bbb #bbb}input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="search"],input[type="number"],input[type="tel"],input[type="range"],input[type="date"],input[type="month"],input[type="week"],input[type="time"],input[type="datetime"],input[type="datetime-local"],input[type="color"],textarea{color:#666;border:1px solid #ccc;border-radius:3px;padding:3px}input[type="text"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="password"]:focus,input[type="search"]:focus,input[type="number"]:focus,input[type="tel"]:focus,input[type="range"]:focus,input[type="date"]:focus,input[type="month"]:focus,input[type="week"]:focus,input[type="time"]:focus,input[type="datetime"]:focus,input[type="datetime-local"]:focus,input[type="color"]:focus,textarea:focus{color:#111}select{border:1px solid #ccc}textarea{width:100%}a{color:#4169e1}a:hover,a:focus,a:active{color:#191970}a:focus{outline:thin dotted}a:hover,a:active{outline:0}.main-navigation{clear:both;display:block;float:left;width:100%}.main-navigation ul{display:none;list-style:none;margin:0;padding-left:0}.main-navigation ul ul{box-shadow:0 3px 3px rgba(0,0,0,0.2);float:left;position:absolute;top:100%;left:-999em;z-index:99999}.main-navigation ul ul ul{left:-999em;top:0}.main-navigation ul ul li:hover > ul,.main-navigation ul ul li.focus > ul{left:100%}.main-navigation ul ul a{width:200px}.main-navigation ul li:hover > ul,.main-navigation ul li.focus > ul{left:auto}.main-navigation li{float:left;position:relative}.main-navigation a{display:block;text-decoration:none}.menu-toggle,.main-navigation.toggled ul{display:block}@media screen and (min-width: 37.5em){.menu-toggle{display:none}.main-navigation ul{display:block}}.site-main .comment-navigation,.site-main
.posts-navigation,.site-main
.post-navigation{margin:0 0 1.5em;overflow:hidden}.comment-navigation .nav-previous,.posts-navigation .nav-previous,.post-navigation .nav-previous{float:left;width:50%}.comment-navigation .nav-next,.posts-navigation .nav-next,.post-navigation .nav-next{float:right;text-align:right;width:50%}.screen-reader-text{border:0;clip:rect(1px,1px,1px,1px);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute!important;width:1px;word-wrap:normal!important}.screen-reader-text:focus{background-color:#f1f1f1;border-radius:3px;box-shadow:0 0 2px 2px rgba(0,0,0,0.6);clip:auto!important;clip-path:none;color:#21759b;display:block;font-size:14px;font-size:.875rem;font-weight:700;height:auto;left:5px;line-height:normal;padding:15px 23px 14px;text-decoration:none;top:5px;width:auto;z-index:100000}#content[tabindex="-1"]:focus{outline:0}.alignleft{display:inline;float:left;margin-right:1.5em}.alignright{display:inline;float:right;margin-left:1.5em}.aligncenter{clear:both;display:block;margin-left:auto;margin-right:auto}.clear:before,.clear:after,.entry-content:before,.entry-content:after,.comment-content:before,.comment-content:after,.site-header:before,.site-header:after,.site-content:before,.site-content:after,.site-footer:before,.site-footer:after{content:"";display:table;table-layout:fixed}.clear:after,.entry-content:after,.comment-content:after,.site-header:after,.site-content:after,.site-footer:after{clear:both}.widget{margin:0 0 1.5em}.widget select{max-width:100%}.sticky{display:block}.updated:not(.published){display:none}.page-content,.entry-content,.entry-summary{margin:1.5em 0 0}.page-links{clear:both;margin:0 0 1.5em}.comment-content a{word-wrap:break-word}.bypostauthor{display:block}.infinite-scroll .posts-navigation,.infinite-scroll.neverending .site-footer{display:none}.infinity-end.neverending .site-footer{display:block}.page-content .wp-smiley,.entry-content .wp-smiley,.comment-content .wp-smiley{border:none;margin-bottom:0;margin-top:0;padding:0}embed,iframe,object{max-width:100%}.custom-logo-link{display:inline-block}.wp-caption{margin-bottom:1.5em;max-width:100%}.wp-caption img[class*="wp-image-"]{display:block;margin-left:auto;margin-right:auto}.wp-caption .wp-caption-text{margin:.8075em 0}.wp-caption-text{text-align:center}.gallery{margin-bottom:1.5em}.gallery-item{display:inline-block;text-align:center;vertical-align:top;width:100%}.gallery-columns-2 .gallery-item{max-width:50%}.gallery-columns-3 .gallery-item{max-width:33.33%}.gallery-columns-4 .gallery-item{max-width:25%}.gallery-columns-5 .gallery-item{max-width:20%}.gallery-columns-6 .gallery-item{max-width:16.66%}.gallery-columns-7 .gallery-item{max-width:14.28%}.gallery-columns-8 .gallery-item{max-width:12.5%}.gallery-columns-9 .gallery-item{max-width:11.11%}.gallery-caption{display:block}
        </style>
    <?php
}

add_action( 'wp_head', 'add_inline_style_header', 0 );

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