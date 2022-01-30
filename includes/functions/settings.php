<?php

function cmc_create_cpt_related_product_1() {
    $labels = array(
        'name' => __('Molinillos'),
        'singular_name' => __('Molinillo'),
        'menu_name' => __('Molinillos'),
        'name_admin_bar' => __('Molinillos'),
        'archives' => __('Archivo de molinillos'),
        'parent_item_colon' => __('Molinillo padre:'),
        'all_items' => __('Todos los elementos'),
        'add_new' => __('Añadir nuevo'),
        'add_new_item' => __('Añadir nuevo elemento'),
        'edit' => __('Editar'),
        'edit_item' => __('Editar molinillo'),
        'new_item' => __('Nuevo molinillo'),
        'view' => __('Ver'),
        'view_item' => __('Ver molinillo'),
        'update_item' => __('Actualizar molinillo'),
        'search_items' => __('Buscar molinillo'),
        'not_found' => __('No se ha encontrado ningún elemento que coincida'),
        'not_found_in_trash' => __('No se ha encontrado ningún molinillo que coincida en la papelera'),
        'featured_image' => __('Imagen destacada'),
        'set_featured_image' => __('Asignar imagen destacada'),
        'remove_featured_image' => __('Quitar la imagen destacada'),
        'use_featured_image' => __('Usar una imagen destacada'),
        'insert_into_item' => __('Insertar en el molinillo'),
        'uploaded_to_this_item' => __('Subido a este molinillo'),
        'items_list' => __('Lista de molinillos'),
        'items_list_navigation' => __('Navegación lista de molinillos'),
        'filter_items_list' => __('Filtrar lista de molinillos')
    );

    $args = array(
        'label' => __('related_product_1'),
        'description' => __('Lista de molinillos'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'comments'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 27,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'capability_type' => 'page',
        'menu_icon' => get_template_directory_uri().'/img/icon/icon-dashboard-1.png',
        'publicly_queryable' => true,
        'rewrite' => array('slug' => 'molinillos'),
        'show_in_rest' => true
    );

    register_post_type('related_product_1', $args);

}
add_action('init', 'cmc_create_cpt_related_product_1');

function cmc_create_cpt_related_product_2() {
    $labels = array(
        'name' => __('Espumadores de Leche'),
        'singular_name' => __('Espumador'),
        'menu_name' => __('Espumadores de leche'),
        'name_admin_bar' => __('Espumadores de leche'),
        'archives' => __('Archivo de espumadores'),
        'parent_item_colon' => __('Espumador padre:'),
        'all_items' => __('Todos los elementos'),
        'add_new' => __('Añadir nuevo'),
        'add_new_item' => __('Añadir nuevo elemento'),
        'edit' => __('Editar'),
        'edit_item' => __('Editar espumador'),
        'new_item' => __('Nuevo espumador'),
        'view' => __('Ver'),
        'view_item' => __('Ver espumador'),
        'update_item' => __('Actualizar espumador'),
        'search_items' => __('Buscar espumador'),
        'not_found' => __('No se ha encontrado ningún elemento que coincida'),
        'not_found_in_trash' => __('No se ha encontrado ningún espumador que coincida en la papelera'),
        'featured_image' => __('Imagen destacada'),
        'set_featured_image' => __('Asignar imagen destacada'),
        'remove_featured_image' => __('Quitar la imagen destacada'),
        'use_featured_image' => __('Usar una imagen destacada'),
        'insert_into_item' => __('Insertar en el espumador'),
        'uploaded_to_this_item' => __('Subido a este espumador'),
        'items_list' => __('Lista de espumadores'),
        'items_list_navigation' => __('Navegación lista de espumadores'),
        'filter_items_list' => __('Filtrar lista de espumadores')
    );

    $args = array(
        'label' => __('related_product_2'),
        'description' => __('Lista de espumadores'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'comments'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 28,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'capability_type' => 'page',
        'menu_icon' => get_template_directory_uri().'/img/icon/icon-dashboard-1.png',
        'publicly_queryable' => true,
        'rewrite' => array('slug' => 'espumadores-de-leche'),
        'show_in_rest' => true
    );

    register_post_type('related_product_2', $args);
}
add_action('init', 'cmc_create_cpt_related_product_2');

function cmc_create_cpt_brands() {
    $labels = array(
        'name' => __('Marcas'),
        'singular_name' => __('Marca'),
        'menu_name' => __('Marcas'),
        'name_admin_bar' => __('Marcas'),
        'archives' => __('Archivo de marcas'),
        'parent_item_colon' => __('Marca padre:'),
        'all_items' => __('Todos los elementos'),
        'add_new' => __('Añadir nuevo'),
        'add_new_item' => __('Añadir nuevo elemento'),
        'edit' => __('Editar'),
        'edit_item' => __('Editar marca'),
        'new_item' => __('Nuevo marca'),
        'view' => __('Ver'),
        'view_item' => __('Ver marca'),
        'update_item' => __('Actualizar marca'),
        'search_items' => __('Buscar marca'),
        'not_found' => __('No se ha encontrado ningún elemento que coincida'),
        'not_found_in_trash' => __('No se ha encontrado ninguna marca que coincida en la papelera'),
        'featured_image' => __('Imagen destacada'),
        'set_featured_image' => __('Asignar imagen destacada'),
        'remove_featured_image' => __('Quitar la imagen destacada'),
        'use_featured_image' => __('Usar una imagen destacada'),
        'insert_into_item' => __('Insertar en la marca'),
        'uploaded_to_this_item' => __('Subido a esta marca'),
        'items_list' => __('Lista de marcas'),
        'items_list_navigation' => __('Navegación lista de marcas'),
        'filter_items_list' => __('Filtrar lista de marcas')
    );

    $args = array(
        'label' => __('brands'),
        'description' => __('Lista de marcas'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'comments'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 29,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-screenoptions',
        'publicly_queryable' => true,
        'rewrite' => array('slug' => 'marca-cafeteras'),
        'show_in_rest' => true
    );

    register_post_type('brands', $args);
}
add_action('init', 'cmc_create_cpt_brands');

function cmc_create_cpt_main_product() {
    $labels = array(
        'name' => __('Cafeteras'),
        'singular_name' => __('Cafetera'),
        'menu_name' => __('Cafeteras'),
        'name_admin_bar' => __('Cafeteras'),
        'archives' => __('Archivo de cafeteras'),
        'parent_item_colon' => __('Cafetera padre:'),
        'all_items' => __('Todos los elementos'),
        'add_new' => __('Añadir nuevo'),
        'add_new_item' => __('Añadir nuevo elemento'),
        'edit' => __('Editar'),
        'edit_item' => __('Editar cafetera'),
        'new_item' => __('Nueva cafetera'),
        'view' => __('Ver'),
        'view_item' => __('Ver cafetera'),
        'update_item' => __('Actualizar cafetera'),
        'search_items' => __('Buscar cafeteras'),
        'not_found' => __('No se ha encontrado ningún elemento que coincida'),
        'not_found_in_trash' => __('No se ha encontrado ninguna cafetera que coincida en la papelera'),
        'featured_image' => __('Imagen destacada'),
        'set_featured_image' => __('Asignar imagen destacada'),
        'remove_featured_image' => __('Quitar la imagen destacada'),
        'use_featured_image' => __('Usar una imagen destacada'),
        'insert_into_item' => __('Insertar en la cafetera'),
        'uploaded_to_this_item' => __('Subido a esta cafetera'),
        'items_list' => __('Lista de cafeteras'),
        'items_list_navigation' => __('Navegación lista de cafeteras'),
        'filter_items_list' => __('Filtrar lista de cafeteras')
    );

    $args = array(
        'label' => __('main_product'),
        'description' => __('Lista de cafeteras'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'comments'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 26,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'capability_type' => 'page',
        'menu_icon' => get_template_directory_uri().'/img/icon/icon-dashboard-1.png',
        'publicly_queryable' => true,
        'rewrite' => array('slug' => 'cafeteras'),
        'show_in_rest' => true
    );

    register_post_type('main_product', $args);
}
add_action('init', 'cmc_create_cpt_main_product');

function cmc_create_cpt_gallery() {
    $labels = array(
        'name' => __('Galerías'),
        'singular_name' => __('Galería'),
        'menu_name' => __('Galerías'),
        'name_admin_bar' => __('Galerías'),
        'archives' => __('Archivo de galerías'),
        'parent_item_colon' => __('Galería padre:'),
        'all_items' => __('Todos los elementos'),
        'add_new' => __('Añadir nuevo'),
        'add_new_item' => __('Añadir nuevo elemento'),
        'edit' => __('Editar'),
        'edit_item' => __('Editar galería'),
        'new_item' => __('Nueva galería'),
        'view' => __('Ver'),
        'view_item' => __('Ver galería'),
        'update_item' => __('Actualizar galería'),
        'search_items' => __('Buscar galerías'),
        'not_found' => __('No se ha encontrado ningún elemento que coincida'),
        'not_found_in_trash' => __('No se ha encontrado ninguna galería que coincida en la papelera'),
        'featured_image' => __('Imagen destacada'),
        'set_featured_image' => __('Asignar imagen destacada'),
        'remove_featured_image' => __('Quitar la imagen destacada'),
        'use_featured_image' => __('Usar una imagen destacada'),
        'insert_into_item' => __('Insertar en la galería'),
        'uploaded_to_this_item' => __('Subido a esta galería'),
        'items_list' => __('Lista de galerías'),
        'items_list_navigation' => __('Navegación lista de galerías'),
        'filter_items_list' => __('Filtrar lista de galerías')
    );

    $args = array(
        'label' => __('product-gallery'),
        'description' => __('Lista de galerías de la empresa'),
        'labels' => $labels,
        'supports' => array('title', 'excerpt', 'thumbnail'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 30,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-format-gallery',
        'publicly_queryable' => true
    );

    register_post_type('product-gallery', $args);
}
add_action('init', 'cmc_create_cpt_gallery');

//1. Add theme settings page to menu

function cmc_add_settings_page() {

    $tt_page = add_menu_page('Personalización de la plantilla', 'Comprar mi cafetera', 'manage_options', 'cmc_settings_page', 'cmc_settings', 'dashicons-admin-generic', 59);

    add_action('admin_print_styles-'.$tt_page,'cmc_settings_scripts');

}

add_action('admin_menu', 'cmc_add_settings_page');



//Styles y scripts que se cargarán únicamente en la página de la plantilla

function cmc_settings_scripts() {

    wp_enqueue_style('admin', get_template_directory_uri() . '/css/admin.css');

}



//2. Create options when install theme

function cmc_create_settings_options() {

    //if(!get_option('cmc_options')) {

        $options = array();

        $shortname = 'theme';



        //General Settings

        $options[$shortname.'_general_settings'] = array('type' => 'section',

                        'id' => $shortname.'_general_settings',

                        'name' => __('Ajustes Generales'),

                        'desc' => __('Configuración de las opciones generales de la plantilla'));



        $options[$shortname.'_logo'] = array('type' => 'hidden-image',

                        'id' => $shortname.'_logo',

                        'name' => __('Logo'),

                        'desc' => __('Logo de la página web'),

                        'value' => __('/wp-content/themes/comprarmicafetera/img/logo.png'));



        $options[$shortname.'_favicon'] = array('type' => 'hidden-image',

                        'id' => $shortname.'_favicon',

                        'name' => __('Favicon'),

                        'desc' => __('Favicon de la página web'),

                        'value' => __('/wp-content/themes/comprarmicafetera/img/favicon.png'));



        $options[$shortname.'_subtitle'] = array('type' => 'text',

                        'id' => $shortname.'_subtitle',

                        'name' => __('Subtítulo'),

                        'desc' => __('Texto del subtítulo que hay debajo del logo'),

                        'value' => __('Análisis y opiniones de cafeteras, molinillos de café y espumadores de leche'));



        $options[$shortname.'_404_text'] = array('type' => 'wp-editor',

                        'id' => $shortname.'_404_text',

                        'name' => __('Texto página 404'),

                        'desc' => __('Texto que aparecerá en la página de error 404'),

                        'value' => __(''));

        $options[$shortname.'_search_text'] = array('type' => 'wp-editor',

                        'id' => $shortname.'_search_text',

                        'name' => __('Texto página búsqueda'),

                        'desc' => __('Texto que aparecerá cuando no hay resultados al hacer una búsqueda'),

                        'value' => __(''));

        //Elementos

        $options[$shortname.'_elements_settings'] = array('type' => 'section',

                        'id' => $shortname.'_elements_settings',

                        'name' => __('Botones y otros elementos'),

                        'desc' => __('Configuración de los botones y elementos'));



        $options[$shortname.'_background_button_1'] = array('type' => 'text',

                        'id' => $shortname.'_background_button_1',

                        'name' => __('Fondo botón 1'),

                        'desc' => __('Color de fondo del botón principal'),

                        'value' => __('#ebc462'));



        $options[$shortname.'_background_hover_button_1'] = array('type' => 'text',

                        'id' => $shortname.'_background_hover_button_1',

                        'name' => __('Fondo hover botón 1'),

                        'desc' => __('Color de fondo del botón principal al pasar el ratón'),

                        'value' => __('#efb522'));



        $options[$shortname.'_color_button_1'] = array('type' => 'text',

                        'id' => $shortname.'_color_button_1',

                        'name' => __('Color texto botón 1'),

                        'desc' => __('Color del texto del botón principal'),

                        'value' => __('#326dab'));



        $options[$shortname.'_background_button_2'] = array('type' => 'text',

                        'id' => $shortname.'_background_button_2',

                        'name' => __('Fondo botón 2'),

                        'desc' => __('Color de fondo del botón de análisis'),

                        'value' => __('#326dab'));



        $options[$shortname.'_background_hover_button_2'] = array('type' => 'text',

                        'id' => $shortname.'_background_hover_button_2',

                        'name' => __('Fondo hover botón 2'),

                        'desc' => __('Color de fondo del botón de análisis al pasar el ratón'),

                        'value' => __('#144b86'));



        $options[$shortname.'_color_button_2'] = array('type' => 'text',

                        'id' => $shortname.'_color_button_2',

                        'name' => __('Color texto botón 2'),

                        'desc' => __('Color del texto del botón de análisis'),

                        'value' => __('#ffffff'));



        $options[$shortname.'_color_price'] = array('type' => 'text',

                        'id' => $shortname.'_color_price',

                        'name' => __('Color precio'),

                        'desc' => __('Color del precio en los shortcodes'),

                        'value' => __('#339900'));



        $options[$shortname.'_color_price_old'] = array('type' => 'text',

                        'id' => $shortname.'_color_price_old',

                        'name' => __('Color precio tachado'),

                        'desc' => __('Color del precio tachado'),

                        'value' => __('#b4b4b4'));


        $options[$shortname.'_color_link'] = array('type' => 'text',

                        'id' => $shortname.'_color_link',

                        'name' => __('Color enlaces'),

                        'desc' => __('Color de los enlaces en los textos'),

                        'value' => __('#326dab'));



        $options[$shortname.'_color_strong'] = array('type' => 'text',

                        'id' => $shortname.'_color_strong',

                        'name' => __('Color negritas'),

                        'desc' => __('Color de los textos dentro de la etiqueta strong'),

                        'value' => __('#000000'));



        $options[$shortname.'_size_h1'] = array('type' => 'text',

                        'id' => $shortname.'_size_h1',

                        'name' => __('Tamaño H1 (rem)'),

                        'desc' => __('Tamaño de fuente de la etiqueta H1'),

                        'value' => __('2.5'));



        $options[$shortname.'_size_h2'] = array('type' => 'text',

                        'id' => $shortname.'_size_h2',

                        'name' => __('Tamaño H2 (rem)'),

                        'desc' => __('Tamaño de fuente de la etiqueta H2'),

                        'value' => __('1.5'));



        $options[$shortname.'_size_h3'] = array('type' => 'text',

                        'id' => $shortname.'_size_h3',

                        'name' => __('Tamaño H3 (rem)'),

                        'desc' => __('Tamaño de fuente de la etiqueta H3'),

                        'value' => __('1.2'));



        $options[$shortname.'_size_text'] = array('type' => 'text',

                        'id' => $shortname.'_size_text',

                        'name' => __('Tamaño letra contenido (px)'),

                        'desc' => __('Tamaño letra del texto de los productos y artículos'),

                        'value' => __('18'));



        $options[$shortname.'_line_height_text'] = array('type' => 'text',

                        'id' => $shortname.'_line_height_text',

                        'name' => __('Line height Texto (%)'),

                        'desc' => __('Line height del contenido'),

                        'value' => __('155'));



        //Ficha producto

        $options[$shortname.'_products_settings'] = array('type' => 'section',

                        'id' => $shortname.'_products_settings',

                        'name' => __('Ficha del producto'),

                        'desc' => __('Configuración de los elementos en la ficha del producto'));



        $options[$shortname.'_background_button_product'] = array('type' => 'text',

                        'id' => $shortname.'_background_button_product',

                        'name' => __('Fondo botón producto'),

                        'desc' => __('Color de fondo del botón, dentro de la ficha del producto'),

                        'value' => __('#f0c350'));



        $options[$shortname.'_background_hover_button_product'] = array('type' => 'text',

                        'id' => $shortname.'_background_hover_button_product',

                        'name' => __('Fondo hover botón producto'),

                        'desc' => __('Color de fondo del botón del producto al pasar el ratón'),

                        'value' => __('#efb522'));



        $options[$shortname.'_color_button_product'] = array('type' => 'text',

                        'id' => $shortname.'_color_button_product',

                        'name' => __('Color texto botón producto'),

                        'desc' => __('Color del texto del botón dentro del producto'),

                        'value' => __('#ffffff'));



        $options[$shortname.'_size_product_title'] = array('type' => 'text',

                        'id' => $shortname.'_size_product_title',

                        'name' => __('Tamaño título producto (rem)'),

                        'desc' => __('Tamaño de fuente del título del producto'),

                        'value' => __('2.3'));

        $options[$shortname.'_size_extract_text'] = array('type' => 'text',
                        'id' => $shortname.'_size_extract_text',
                        'name' => __('Tamaño del extracto (rem)'),
                        'desc' => __('Tamaño de fuente del extracto'),
                        'value' => __('1'));

        $options[$shortname.'_size_extract_lineheight'] = array('type' => 'text',
                        'id' => $shortname.'_size_extract_lineheight',
                        'name' => __('Tamaño del interlineado (rem)'),
                        'desc' => __('Tamaño de interlineado del extracto'),
                        'value' => __('1.3'));

        // Configuraciones - Amazon
        $options[$shortname.'_configs_amazon'] = array(
            'type' => 'section',
            'id' => $shortname.'_configs_amazon',
            'name' => __('Configuraciones Amazon'),
            'desc' => __('Configuración de información de Amazon para la plantilla')
        );
        $options[$shortname.'_api_accessKeyId'] = array(
            'type' => 'text',
            'id' => $shortname.'_api_accessKeyId',
            'name' => __('API Access Key ID'),
            'value' => $options[$shortname.'_api_accessKeyId']['value']
        );
        $options[$shortname.'_api_secretKey'] = array(
            'type' => 'text',
            'id' => $shortname.'_api_secretKey',
            'name' => __('API Secret Key'),
            'value' => $options[$shortname.'_api_secretKey']['value']
        );
        $options[$shortname.'_api_trackingId'] = array(
            'type' => 'text',
            'id' => $shortname.'_api_trackingId',
            'name' => __('API Tracking ID'),
            'value' => $options[$shortname.'_api_trackingId']['value']
        );

        // Redes Sociales
        $options[$shortname.'_social_network'] = array(
            'type' => 'section',
            'id' => $shortname.'_social_network',
            'name' => __('Redes Sociales'),
            'desc' => __('Configuración de los elementos de redes sociales en el menú de cabecera')
        );
        $options[$shortname.'_social_network_facebook'] = array(
            'type' => 'text',
            'id' => $shortname.'_social_network_facebook',
            'name' => __('Facebook'),
            'desc' => __('Configuración del enlace de la página de Facebook'),
            'value' => __('https://facebook.com/')
        );
        $options[$shortname.'_social_network_twitter'] = array(
            'type' => 'text',
            'id' => $shortname.'_social_network_twitter',
            'name' => __('Twitter'),
            'desc' => __('Configuración del enlace de la página de Twitter'),
            'value' => __('https://twitter.com/')
        );
        $options[$shortname.'_social_network_instagram'] = array(
            'type' => 'text',
            'id' => $shortname.'_social_network_instagram',
            'name' => __('Instagram'),
            'desc' => __('Configuración del enlace de la página de Instagram'),
            'value' => __('https://instagram.com/')
        );

        
        update_option('cmc_options', $options);

        update_option('cmc_shortname', $shortname);
    //}

}

add_action('after_switch_theme','cmc_create_settings_options'); //Se ejecuta después de instalar la plantilla


//3. Admin settings page

function cmc_settings() {

    cmc_update_options();

    $options = get_option('cmc_options');

    /*if(!array_key_exists('theme_legal_comments', $options)) {

                $options['theme_legal_comments'] = array('type' => 'wp-editor',

                                'id' => 'theme_legal_comments',

                                'name' => __('Texto legal comentarios'),

                                'desc' => __('Texto legal que se mostrará en los comentarios'),

                                'value' => __(''));

                update_option('cmc_options', $options);
    }*/

    ?>

        <div class="wrap">

            <h1><?php _e('Configuración de la plantilla') ?></h1>

            <div>

                <?php echo cmc_format_options($options); ?>

            </div>

        </div>

    <?php

}



//4. HTML format options

function cmc_format_options($options) {

    $html_options = '<form method="post" enctype="multipart/form-data">';

    $opened_section = false;



    foreach($options as $option) {

        switch ($option['type']) {

            case 'section':

                if($opened_section) $html_options .= '</div>';

                $html_options .= '<div id="' . $option['id'] . '" class="cmc-section-tab"><input class="cmc-button" type="submit" name="' . $option['id'] . '" value="' . __('Guardar') . '"><h1>' . $option['name'] . '</h1>';

                $opened_section = true;

                break;



            case 'text':

                $html_options .= '<div class="cmc-input"><label>' . $option['name'] . ':<small>' . $option['desc'] . '</small></label> <input type="text" id="' . $option['id'] . '" name="' . $option['id'] . '" value="' . esc_attr($option['value']) . '" placeholder="' . $option['desc'] . '"></div>';

                break;



            case 'wp-editor':

                $html_options .= '<div class="cmc-wpeditor"><label>' . $option['name'] . ':<small>' . $option['desc'] . '</small></label> ';

                ob_start();

                wp_editor($option['value'], $option['id'], array('textarea_name' => $option['id']));

                $html_options .= ob_get_clean() . '</div>';

                break;



            case 'hidden-image':

                $html_options .= '<div class="cmc-input"><label>' . $option['name'] . ':<small>' . $option['desc'] . '</small></label> <input type="file" id="' . $option['id'] . '" name="' . $option['id'] . '" value="' . $option['value'] . '">';

                if(!empty($option['value'])) $html_options .= '<img src="' . esc_attr($option['value']) . '"></div>';

                break;

        }

    }

    if($opened_section) $html_options .= '</div>';



    $html_options .= '</form>';

    return $html_options;

}



//5. Update options

function cmc_update_options() {

    $options = get_option('cmc_options');



    if(!function_exists('wp_handle_upload')) {

        require_once(ABSPATH . 'wp-admin/includes/file.php');

    }



    foreach($options as $option) {

        if(array_key_exists($option['id'], $_POST) || array_key_exists($option['id'], $_FILES)) {

            switch ($option['type']) {

                case 'text':

                case 'wp-editor':

                    $option['value'] = stripslashes($_POST[$option['id']]);

                    break;



                case 'hidden-image':

                    if(!empty($_FILES[$option['id']])) {

                        $uploadedfile = $_FILES[$option['id']];

                        $upload_overrides = array('test_form' => false);

                        $movefile = wp_handle_upload($uploadedfile, $upload_overrides);



                        if($movefile && !isset($movefile['error'])) {

                            $option['value'] = $movefile['url'];

                        }

                    }

                    else {

                        $option['value'] = $_POST[$option['id']];

                    }

                    break;

            }

            $options[$option['id']] = $option;

        }

    }



    update_option('cmc_options', $options);

}

/** FUNCTION THAT ADDS SOCIAL ICONS TO MENU */
add_filter('wp_nav_menu_items', 'register_social_links', 10, 2);
 function register_social_links($items, $args) {
    if ($args->theme_location == 'header_menu') {
		$options = get_option('cmc_options');
        if (!empty($options['theme_social_network_facebook']['value'])) {
            $items .= '<li class="nav-social-menu ml-md"><a href="'.$options['theme_social_network_facebook']['value'].'" target="_blank" title=""><i class="fab fa-facebook-f"></i></a></li>';
        }
        if (!empty($options['theme_social_network_twitter']['value'])) {
            $items .= '<li class="nav-social-menu"><a href="'.$options['theme_social_network_twitter']['value'].'" target="_blank" title=""><i class="fab fa-twitter"></i></a></li>';
        }
        if (!empty($options['theme_social_network_instagram']['value'])) {
            $items .= '<li class="nav-social-menu"><a href="'.$options['theme_social_network_instagram']['value'].'" target="_blank" title=""><i class="fab fa-instagram"></i></a></li>';
        }
    }
    return $items;
 }