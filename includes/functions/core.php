<?php

/* Add David, para subir la CSS al header */
function cmc_scripts_header() {
    wp_enqueue_style('google-fonts-Lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700', false);
    wp_enqueue_style('google-fonts-Comfortaa', 'https://fonts.googleapis.com/css?family=Comfortaa:400', false);
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.min.css');
    wp_enqueue_style('cmc-style', get_stylesheet_uri(), array('normalize'), '1.0', 'all');

    /* NEW STYLES FOR HEADER AND FOOTER */
    wp_enqueue_style('nhf-bootstrap', get_template_directory_uri().'/new-header-footer/bootstrap/bootstrap.min.css');
    wp_enqueue_style('nhf-style', get_template_directory_uri().'/new-header-footer/css/style.css');
    wp_enqueue_style('nhf-override', get_template_directory_uri().'/css/override.css');
}
add_action('wp_enqueue_scripts', 'cmc_scripts_header');
/* Fin Add David, para subir la CSS al header */

function cmc_scripts() {
/* Comentado David para quitar css del pie
    wp_enqueue_style('google-fonts-Lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700', false);
    wp_enqueue_style('google-fonts-Comfortaa', 'https://fonts.googleapis.com/css?family=Comfortaa:400', false);
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.min.css');
    wp_enqueue_style('cmc-style', get_stylesheet_uri(), array('normalize'), '1.0', 'all');
*/
    wp_enqueue_script('wp-embed');
    wp_enqueue_script('cmc-global-js', get_template_directory_uri().'/js/global.js', array('jquery'), '1.0', false);
    wp_localize_script('cmc-global-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
    if(is_tax('product-category') || is_page_template('template-cafeteras.php') || is_page_template('template-molinillos.php') || is_page_template('template-espumadores-de-leche.php')) {
        wp_enqueue_script('cmc-taxonomy-js', get_template_directory_uri().'/js/taxonomy.js', array('jquery'), '1.0', false);
        wp_localize_script('cmc-taxonomy-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
    }
    if (is_singular() && comments_open() && get_option('thread_comments')) wp_enqueue_script( 'comment-reply' );

    /* NEW SCRIPTS FOR HEADER AND FOOTER */
    wp_enqueue_script('nhf-font-awesome', 'https://kit.fontawesome.com/88857f69ea.js');
    wp_enqueue_script('nhf-bootstrap', get_template_directory_uri().'/new-header-footer/bootstrap/bootstrap.bundle.min.js');
    wp_enqueue_script('nhf-script', get_template_directory_uri().'/new-header-footer/js/script.js');
}
add_action('wp_footer', 'cmc_scripts');

function cmc_jquery() {
    wp_dequeue_script('jquery');
    wp_dequeue_script('jquery-core');
    wp_dequeue_script('jquery-migrate');
    wp_enqueue_script('jquery', false, array(), false, true);
    wp_enqueue_script('jquery-core', false, array(), false, true);
    wp_enqueue_script('jquery-migrate', false, array(), false, true);
}
add_action('wp_enqueue_scripts', 'cmc_jquery');

/* Setup */
function cmc_setup() {
    register_nav_menus(
        array('header_menu' => __('Menú cabecera'),
        'menu_404_1' => __('Primer menú 404'),
        'menu_404_2' => __('Segundo menú 404'),
        'menu_404_3' => __('Tercer menú 404'),
        'footer_menu' => __('Menú pie de página'))
    );

    add_post_type_support('page', 'excerpt');
    add_post_type_support('post', 'excerpt');
    remove_filter('the_excerpt', 'wpautop');
    add_theme_support('post-thumbnails');
    add_image_size('post-list-thumbnail', 170, 170, true);
    add_image_size('post-thumbnail', 839, 472, true);
    add_image_size('product-large', 1000, 1000, true);
    add_image_size('product-medium', 300, 300, true);
    add_image_size('product-small', 75, 75, true);
    add_image_size('gallery-thumbnail', 300, 338, true);
}
add_action('after_setup_theme', 'cmc_setup');

function cmc_replace_year ($text) {
    return str_replace('%anio%', date('Y'), $text);
}
add_filter('the_title', 'cmc_replace_year', 999);
add_filter('the_content', 'cmc_replace_year', 999);
add_filter('wpseo_title', 'cmc_replace_year', 999);
add_filter('wpseo_metadesc', 'cmc_replace_year', 999);

/* Facebook Script */

function get_facebook_script() {

    return '<div id="fb-root"></div>

            <script>(function(d, s, id) {

              var js, fjs = d.getElementsByTagName(s)[0];

              if (d.getElementById(id)) return;

              js = d.createElement(s); js.id = id;

              js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.10&appId=648600791910489";

              fjs.parentNode.insertBefore(js, fjs);

            }(document, "script", "facebook-jssdk"));</script>';

}



/* Rich snippets */

function get_rich_snippets() {

    if(get_post_type() == 'main_product' || get_post_type() == 'related_product_1' || get_post_type() == 'related_product_2') {

        $data = cmc_get_prodcut_data(get_the_ID(), get_post_type());

        $score = $data['score'];

        $product = get_the_title();

        $ratingoutput = '<script type="application/ld+json">{"@context": "http://schema.org","@type": "Product","name": "' . $product . '","aggregateRating": {"@type": "AggregateRating","ratingValue": "' . $score . '"}}</script>';

        return $ratingoutput;

    }

    else

        return '';

}



function cmc_the_styles() {

    $options = get_option('cmc_options');



    $styles = '<style type="text/css">';

    $styles .= '.button{background:' . $options['theme_background_button_1']['value'] . ';color:' . $options['theme_color_button_1']['value'] . ';}.button:hover{background:' . $options['theme_background_hover_button_1']['value'] . ';}.button-2{background:' . $options['theme_background_button_2']['value'] . ';color:' . $options['theme_color_button_2']['value'] . ';}.button-2:hover{background:' . $options['theme_background_hover_button_2']['value'] . ';}.price{color:' . $options['theme_color_price']['value'] . ';}a{color:' . $options['theme_color_link']['value'] . ';}strong{color:' . $options['theme_color_strong']['value'] . ';}h1{font-size:' . $options['theme_size_h1']['value'] . 'rem;}h2{font-size:' . $options['theme_size_h2']['value'] . 'rem;}h3{font-size:' . $options['theme_size_h3']['value'] . 'rem;}p,ul{font-size:' . $options['theme_size_text']['value'] . 'px;line-height:' . $options['theme_line_height_text']['value'] . '%;}.product-button{background:' . $options['theme_background_button_product']['value'] . ';color:' . $options['theme_color_button_product']['value'] . ';}.product-button:hover{background:' . $options['theme_background_hover_button_product']['value'] . ';}.product-header h1{font-size:' . $options['theme_size_product_title']['value'] . 'rem;}.list-posts .entry-content, .search .entry-content, .search-content{font-size:' . $options['theme_size_extract_text']['value'] . 'rem;line-height:' . $options['theme_size_extract_lineheight']['value'] . ';}.price-old{color:' . $options['theme_color_price_old']['value'] . ';}';

    $styles .= '</style>';



    return $styles;

}


if(!function_exists('cmc_content_editor_on_posts_page')) {
function cmc_content_editor_on_posts_page($post) {
    if(isset($post) && $post->ID != get_option('page_for_posts')) {
        return;
    }

    remove_action('edit_form_after_title', '_wp_posts_page_notice');
    add_post_type_support('page', 'editor');
}
add_action('edit_form_after_title', 'cmc_content_editor_on_posts_page', 0);
}

add_filter('xmlrpc_methods', function($methods) {
unset( $methods['pingback.ping'] );
return $methods;
});

/** FUNCTION THAT ADDS CHEVRON AFTER MENU ITEM IF IT HAS CHILDREN */
add_filter('walker_nav_menu_start_el', 'add_extra_menu_style', 10, 4);
function add_extra_menu_style($item_output, $item, $depth, $args){
if ( 'header_menu' == $args->theme_location && $depth === 0 ) {
    if ( in_array("menu-item-has-children", $item->classes) || in_array('page_item_has_children', $item->classes ) ) {
        $item_output = str_replace( $args->link_after . '</a>', $args->link_after . ' <i class="fas fa-chevron-down menu-chevron-icon" data-toggle="menu"></i></a>', $item_output );
        $item_output .= '<span class="menu-triangle"></span>';
    }
}
return $item_output;
}

add_filter( 'nav_menu_link_attributes', function($atts, $item, $args, $depth) {
if ( $args->theme_location === 'header_menu' && $depth === 0 ) {
    if ( in_array("menu-item-has-children", $item->classes) || in_array('page_item_has_children', $item->classes ) ) {
        $atts['data-toggle'] = "sub-menu";
    }
}
return $atts;
}, 100, 4 );