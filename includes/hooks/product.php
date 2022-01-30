<?php

//Compatibilidad con antigua plantilla
function cmc_get_prodcut_data($postId, $postType) {
    $data = array();
    switch($postType) {
        case 'main_product':
            // PROCESO ANTIGUA PLANTILLA //
            $current_specs = unserialize(get_post_meta($postId, '_uat_ama_specs', true));
            if(is_array($current_specs)) {
                foreach($current_specs as $key => $subarray) {
                    foreach($subarray as $subkey => $subsubarray) {
                        if($subkey=='spec_value'):
                            $current_specs[$key][$subkey] = htmlspecialchars(stripslashes(base64_decode($subsubarray)));
                        else: 
                            $current_specs[$key][$subkey] = htmlspecialchars(stripslashes($subsubarray));
                        endif;
                    }
                }
            }

            $temp_specs = get_option('uat_options_product');
            $_temp_specs = $temp_specs['uat_main_product_custom_specs'];
            if(!is_array($_temp_specs)) {
                $custom_options = unserialize($_temp_specs);
            } else {
                $custom_options = $_temp_specs;
            }

            $_groupings = $custom_options;
            $groupings = array();
            if(is_array($_groupings)) {
                foreach ($_groupings as $field => $group) {
                    for ($i=0; $i<count($group); $i++) {
                        $groupings[$i][$field] = $group[$i];
                    }
                }
            }

            $affiliate_link='';
            $product_name='';
            foreach ($groupings as $field => $grouping) {
                if($grouping['uat_ama_spec_toggle'] == 'off'):
                    $hide_show = ' inactive-spec';
                else:
                    $hide_show = '';
                endif;

                $spec_value = '';
                foreach ($grouping as $value_name => $value){
                    if($value_name == 'uat_ama_spec_meta_key'):
                        if (is_array($current_specs)) :
                            foreach ($current_specs as $field => $spec_meta_key) {
                                if($spec_meta_key['spec_meta_key'] == $grouping['uat_ama_spec_meta_key']){
                                    $spec_value =  $spec_meta_key['spec_value'];
                                }
                            }
                        endif;
                    //PRIMER BLOQUE DE DATOS
                    elseif($value_name == 'uat_ama_spec_name'):
                        if($value=='Product Affiliate Link'):
                            $data['affiliate-link']=$spec_value;
                        endif;
                        if($value=='Product Name'):
                            $data['product-name']=$spec_value;
                        endif;
                        if($value!='Product Affiliate Link' && $value != '' && $hide_show != ' inactive-spec' && $spec_value != ''):

                            if($value=='Marca'):
                                $data['brand'] = $spec_value;
                            elseif($value=='Tipo'):
                                $data['type'] = $spec_value;
                            elseif($value=='Operación'):
                                $data['transaction'] = $spec_value;
                            elseif($value=='Capacidad'):
                                $data['capacitance'] = $spec_value;
                            elseif($value=='Rating'):
                                $data['score'] = $spec_value;
                                $data['score-stars'] = '';
                                $data['score-stars-small'] = '';
                            endif;
                        endif;
                    endif;
                }
            }
            // FIN PROCESO ANTIGUA PLANTILLA //

            for($i = 1; $i <= $data['score']; $i++) {
                if(is_float($data['score']+0) && (($i+0.5) == $data['score'])) {
                    $data['score-stars-small'] .= '<i class="icon-star-small"></i><i class="icon-star-middle-small"></i>';
                    $data['score-stars'] .= '<i class="icon-star"></i><i class="icon-star-middle"></i>';
                    $i++;
                }
                else {
                    $data['score-stars-small'] .= '<i class="icon-star-small"></i>';
                    $data['score-stars'] .= '<i class="icon-star"></i>';
                }
            }
            for($j = $i; $j <= 5; $j++) {
                $data['score-stars-small'] .= '<i class="icon-star-small-empty"></i>';
                $data['score-stars'] .= '<i class="icon-star-empty"></i>';
            }

            $main_prod_image = get_post_meta(get_the_ID(), '_main_product_img', true);
            $data['image'] = wp_get_attachment_image_src(esc_attr($main_prod_image), 'product-large')[0];
            $data['image-medium'] = wp_get_attachment_image_src(esc_attr($main_prod_image), 'product-medium')[0];
            $data['image-small'] = wp_get_attachment_image_src(esc_attr($main_prod_image), 'product-small')[0];
            break;

        case 'related_product_1':
            $data = unserialize(get_post_meta($postId, 'cmc-relatedproduct1-options', true));
            $data['image'] = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'product-large')[0];
            $data['image-medium'] = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'product-medium')[0];
            $data['image-small'] = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'product-small')[0];
            break;

        case 'related_product_2':
            $data = unserialize(get_post_meta($postId, 'cmc-relatedproduct2-options', true));
            $data['image'] = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'product-large')[0];
            $data['image-medium'] = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'product-medium')[0];
            $data['image-small'] = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'product-small')[0];
            break;
    }

    // SEGUNDO BLOQUE DE DATOS (comunes todos los productos)
    if($postType == 'main_product')
        $data['asin'] = get_post_meta($postId, 'cmc-mainproduct-asin', true);
    else if($postType == 'main_product')
        $data['asin'] = get_post_meta($postId, 'cmc-relatedproduct1-options', true)['asin'];
    else if($postType == 'main_product')
        $data['asin'] = get_post_meta($postId, 'cmc-relatedproduct2-options', true)['asin'];
    if(!empty($data['asin'])) {
        //$cmc_amazon_info = cmc_amazon_get_data($data['asin']);
        //$data['price'] = $cmc_amazon_info['price'];
        $data['price'] = do_shortcode('[aawp fields="' . $data['asin'] . '" value="price"]');
        $data['price'] = (int)str_replace(',', '.', rtrim($data['price'], ' €'));
        //$data['discount'] = $cmc_amazon_info['discount'];
        $data['discount'] = 0;
        //$data['available'] = $cmc_amazon_info['available'];
        $data['available'] = '';
        $data['button-text'] = get_post_meta($postId, 'cmc-mainproduct-button-text', true);
        if($data['price'] > 49.99) {
            $data['price'] = round($data['price']);
            $data['discount'] = round($data['discount']);
        }

        if(empty($data['button-text']) && $data['price'] == 0) {
                $data['button-text'] = __('Comprar AHORA');
        }
        else if(empty($data['button-text'])) {
            if(!empty($data['discount']) && $data['discount'] != 0) {
                $data['button-text'] = __('Comprar AHORA - ') . $data['price'] . ' €' . '<span class="old-price">' . ($data['price'] + $data['discount']) . ' €</span> ';
            }
            else {
                $data['button-text'] = __('Comprar AHORA - ') . $data['price'] . ' €';
            }
        }
        else {
            if(!empty($data['discount']) && $data['discount'] != 0) {
                $data['button-text'] = $data['button-text'] . ' - ' . $data['price'] . ' €' . '<span class="old-price">' . ($data['price'] + $data['discount']) . ' €</span> ';
            }
            else {
                $data['button-text'] = $data['button-text'] . ' - ' . $data['price'] . ' €';
            }

        }

    }

    else {

        $data['price'] = '';

        $data['discount'] = '';

        $data['available'] = 1;

        $data['button-text'] = get_post_meta($postId, 'cmc-mainproduct-button-text', true);

        if(empty($data['button-text'])) {

            $data['button-text'] = __('Comprar AHORA');

        }

        else {

            $data['button-text'] = $data['button-text'];

        }

    }

    // FIN

    return $data;

}

function cmc_related_products($post_type, $taxonomy, $term, $exclude) {

    $args = array(

        'post__not_in' => array($exclude),

        'posts_per_page' => 3,

        'post_type' => $post_type,

        'orderby' => 'rand',

        'tax_query' => array(

            array(

                'taxonomy' => $taxonomy,

                'field' => 'slug',

                'terms' => $term

            )

        )

    );

    $query = new WP_Query($args);

    $result = '<div class="gallery">';

    while($query->have_posts()): $query->the_post();

        $data = cmc_get_prodcut_data(get_the_ID(), $post_type);

        $result .= '<div class="product-gallery">

                    <div class="gallery-img"><a href="' . get_the_permalink() . '"><img src="' . $data['image'] . '"></a></div>

                    <span class="gallery-name"><a href="' .  get_the_permalink() . '">' . get_the_title() . '</a></span>

                    <div class="gallery-excerpt">' . $data['type'] . ' - ' . $data['transaction'] . ' - ' . $data['capacitance'] . '</div>';

        if(!empty($data['discount']) && $data['discount'] != 0) {
            $result .= '<span class="price-old">' . $data['price'] . '</span>';
            $result .= '<span class="price">' . ($data['price'] - $data['discount']) . '€</span>';
        }

        $result .= '</div>';

    endwhile; wp_reset_postdata();

    $result .= '</div><div class="clear"></div>';

    return $result;

}

function cmc_get_products_by_id($id, $postType) {

    $args = array(

        'posts_per_page' => -1,

        'post__in' => $id,

        'post_type' => $postType,

        'orderby' => 'date',

        'order' => 'DESC'

    );

    $query = new WP_Query($args);

    return $query;

}

function cmc_get_products_by_asin($asin, $postType) {

    $args = array(

        'meta_query'  => array(

            array(

                'key' => 'cmc-mainproduct-asin',

                'value' => $asin,

                'compare' => 'IN'

            )

        ),

        'post_type' => $postType,

        'posts_per_page' => -1,

        'orderby' => 'date',

        'order' => 'DESC'

    );

    $query = new WP_Query($args);

    return $query;

}

/* Infinite Scroll */

function cmc_get_next_products() {

    if(!empty($_POST['taxonomy']) && !empty($_POST['term'])) {

        $args = array(

            'posts_per_page' => 12,

            'offset' => $_POST['offset'],

            'post_type' => $_POST['postType'],

            'orderby' => 'date',

            'tax_query' => array(

                array(

                    'taxonomy' => $_POST['taxonomy'],

                    'field' => 'slug',

                    'terms' => $_POST['term']

                )

            )

        );

    }

    else {

        $args = array(

            'posts_per_page' => 12,

            'offset' => $_POST['offset'],

            'post_type' => $_POST['postType'],

            'orderby' => 'date'

        );

    }

    $query = new WP_Query($args);



    if(!$query->have_posts()) {

        echo 2;

        die;

    }

    else {

        $result = '';

        while($query->have_posts()): $query->the_post();

            $data = cmc_get_prodcut_data(get_the_ID(), get_post_type());


            if($data['price'] != '') {
                $price = '<div class="read-more price"><span>' . $data['price'] . ' €</span></div>';
            } else {
                $price = '<div class="read-more"><a href="' . get_the_permalink() . '">' . __('Acceder >>') . '</a></div>';
            }
            $result .= '<div class="article-2">
                            <div class="entry-header-2">
                                <a class="post-thumbnail-2" href="' . get_the_permalink() . '"><img src="' . $data['image-medium'] . '"></a>
                                <a class="post-title-2" href="' . get_the_permalink() . '"><h2>' . get_the_title() . '</h2></a>
                            </div>
                            <div class="entry-content-2">' . mb_substr(wp_strip_all_tags(get_the_content()), 0, 135) . '...</div>
                            ' . $price . '
                        </div>';

        endwhile; wp_reset_postdata();

        echo $result;
        die;
    }
}

add_action('wp_ajax_cmc_get_next_products', 'cmc_get_next_products');

add_action('wp_ajax_nopriv_cmc_get_next_products', 'cmc_get_next_products');