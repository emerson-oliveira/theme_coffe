<?php

//Taxonomy
function cmc_create_mainproduct_taxonomy() {
    $labels = array(
        'name' => _x('Categorías Cafeteras', 'Taxonomy General Name'),
        'singular_name' => _x('Categoría Cafetera', 'Taxonomy Singular Name'),
        'menu_name' => __('Categoría Cafeteras'),
        'all_items' => __('Todas las categorías'),
        'parent_item' => __('Categoría padre'),
        'parent_item_colon' => __('Categoría padre:'),
        'new_item_name' => __('Nuevo nombre de categoría'),
        'add_new_item' => __('Añadir nueva categoría'),
        'edit_item' => __('Editar categoría'),
        'update_item' => __('Actualizar categoría'),
        'view_item' => __('Ver categoría'),
        'separate_items_with_commas' => __('Separar las categorías por comas'),
        'add_or_remove_items' => __('Añadir o eliminar categorías'),
        'choose_from_most_used' => __('Elija entre las más utilizadas'),
        'popular_items' => __('Categorías populares'),
        'search_items' => __('Buscar categorías'),
        'not_found' => __('No encontrado'),
        'no_terms' => __('No hay categorías'),
        'items_list' => __('Lista de categorías'),
        'items_list_navigation' => __('Navegación lista de categorías'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'product-category')
    );

    register_taxonomy('product-category', array('main_product'), $args);
}
add_action('init', 'cmc_create_mainproduct_taxonomy', 0);

function cmc_create_taxonomy_gallery() {
    $labels = array(
        'name' => _x('Categorías Galerías', 'Taxonomy General Name'),
        'singular_name' => _x('Categoría Galería', 'Taxonomy Singular Name'),
        'menu_name' => __('Categoría Galería'),
        'all_items' => __('Todas las categorías'),
        'parent_item' => __('Categoría padre'),
        'parent_item_colon' => __('Categoría padre:'),
        'new_item_name' => __('Nuevo nombre de categoría'),
        'add_new_item' => __('Añadir nueva categoría'),
        'edit_item' => __('Editar categoría'),
        'update_item' => __('Actualizar categoría'),
        'view_item' => __('Ver categoría'),
        'separate_items_with_commas' => __('Separar las categorías por comas'),
        'add_or_remove_items' => __('Añadir o eliminar categorías'),
        'choose_from_most_used' => __('Elija entre las más utilizadas'),
        'popular_items' => __('Categorías populares'),
        'search_items' => __('Buscar categorías'),
        'not_found' => __('No encontrado'),
        'no_terms' => __('No hay categorías'),
        'items_list' => __('Lista de categorías'),
        'items_list_navigation' => __('Navegación lista de categorías'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'gallery-category')
    );

    register_taxonomy('gallery-category', array('product-gallery'), $args);
}
add_action('init', 'cmc_create_taxonomy_gallery', 0);