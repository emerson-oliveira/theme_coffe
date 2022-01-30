<?php

/* Meta Box */
function cmc_mainproduct_metabox() {
    add_meta_box('cmc_mainproduct_data', 'Datos del producto', 'cmc_mainproduct_metabox_design', 'main_product', 'normal', 'high', null);
}
add_action('add_meta_boxes', 'cmc_mainproduct_metabox');

function cmc_mainproduct_metabox_design($post) {
    wp_nonce_field(basename(__FILE__), 'meta-box-nonce');
    ?>
        <div>
            <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('ASIN'); ?></label>
            <input name="cmc-mainproduct-asin" type="text" value="<?php echo get_post_meta($post->ID, 'cmc-mainproduct-asin', true); ?>">
            <br/>
            <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Texto botón'); ?></label>
            <input name="cmc-mainproduct-button-text" type="text" value="<?php echo get_post_meta($post->ID, 'cmc-mainproduct-button-text', true); ?>">
            <br/>
        </div>
    <?php
}

function cmc_save_mainproduct_metabox($post_id, $post, $update) {
    if (!isset($_POST['meta-box-nonce']) || !wp_verify_nonce($_POST['meta-box-nonce'], basename(__FILE__)))
        return $post_id;
    if(!current_user_can('edit_post', $post_id))
        return $post_id;
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    if(isset($_POST['cmc-mainproduct-asin'])) {
        update_post_meta($post_id, 'cmc-mainproduct-asin', $_POST['cmc-mainproduct-asin']);
    }
    if(isset($_POST['cmc-mainproduct-button-text'])) {
        update_post_meta($post_id, 'cmc-mainproduct-button-text', $_POST['cmc-mainproduct-button-text']);
    }
}
add_action('save_post', 'cmc_save_mainproduct_metabox', 10, 3);

function cmc_relatedproduct1_metabox() {
    add_meta_box('cmc_relatedproduct1_data', 'Información del producto', 'cmc_relatedproduct1_metabox_design', 'related_product_1', 'normal', 'high', null);
}
add_action('add_meta_boxes', 'cmc_relatedproduct1_metabox');

function cmc_relatedproduct1_metabox_design($post) {
    wp_nonce_field(basename(__FILE__), 'meta-box-nonce');
    $cmc_relatedproduct1_options = get_post_meta($post->ID, 'cmc-relatedproduct1-options', true);

    if(empty($cmc_relatedproduct1_options))
        $cmc_relatedproduct1_options = array();
    else
        $cmc_relatedproduct1_options = unserialize($cmc_relatedproduct1_options);
?>
    <div>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Nombre del producto'); ?></label>
        <input name="cmc-relatedproduct1-options[product-name]" type="text" value="<?php echo $cmc_relatedproduct1_options['product-name']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Enlace de afiliado'); ?></label>
        <input name="cmc-relatedproduct1-options[affiliate-link]" type="text" value="<?php echo $cmc_relatedproduct1_options['affiliate-link']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Marca'); ?></label>
        <input name="cmc-relatedproduct1-options[brand]" type="text" value="<?php echo $cmc_relatedproduct1_options['brand']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Operación'); ?></label>
        <input name="cmc-relatedproduct1-options[transaction]" type="text" value="<?php echo $cmc_relatedproduct1_options['transaction']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Capacidad'); ?></label>
        <input name="cmc-relatedproduct1-options[capacitance]" type="text" value="<?php echo $cmc_relatedproduct1_options['capacitance']; ?>">
        <br/>
        <?php $score = $cmc_relatedproduct1_options['score']; ?>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Puntuación'); ?></label>
        <select name="cmc-relatedproduct1-options[score]">
            <option <?php echo selected($score, '', false); ?> value=""><?php _e('Seleccionar puntuación'); ?></option>
            <option <?php echo selected($score, '1', false); ?> value="1">1</option>
            <option <?php echo selected($score, '1.5', false); ?> value="1.5">1.5</option>
            <option <?php echo selected($score, '2', false); ?> value="2">2</option>
            <option <?php echo selected($score, '2.5', false); ?> value="2.5">2.5</option>
            <option <?php echo selected($score, '3', false); ?> value="3">3</option>
            <option <?php echo selected($score, '3.5', false); ?> value="3.5">3.5</option>
            <option <?php echo selected($score, '4', false); ?> value="4">4</option>
            <option <?php echo selected($score, '4.5', false); ?> value="4.5">4.5</option>
            <option <?php echo selected($score, '5', false); ?> value="5">5</option>
        </select>
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('ASIN'); ?></label>
        <input name="cmc-relatedproduct1-options[asin]" type="text" value="<?php echo $cmc_relatedproduct1_options['asin']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Texto botón'); ?></label>
        <input name="cmc-relatedproduct1-options[button-text]" type="text" value="<?php echo $cmc_relatedproduct1_options['button-text']; ?>">
        <br/>
    </div>
<?php
}

function cmc_save_relatedproduct1_metabox($post_id, $post, $update) {
    if (!isset($_POST['meta-box-nonce']) || !wp_verify_nonce($_POST['meta-box-nonce'], basename(__FILE__)))
        return $post_id;

    if(!current_user_can('edit_post', $post_id))
        return $post_id;

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    if(isset($_POST['cmc-relatedproduct1-options'])) {
        update_post_meta($post_id, 'cmc-relatedproduct1-options', serialize($_POST['cmc-relatedproduct1-options']));
    }
}
add_action('save_post', 'cmc_save_relatedproduct1_metabox', 10, 3);

function cmc_relatedproduct2_metabox() {
    add_meta_box('cmc_relatedproduct2_data', 'Información del producto', 'cmc_relatedproduct2_metabox_design', 'related_product_2', 'normal', 'high', null);
}
add_action('add_meta_boxes', 'cmc_relatedproduct2_metabox');

function cmc_relatedproduct2_metabox_design($post) {
    wp_nonce_field(basename(__FILE__), 'meta-box-nonce');
    $cmc_relatedproduct2_options = get_post_meta($post->ID, 'cmc-relatedproduct2-options', true);
    if(empty($cmc_relatedproduct2_options))
        $cmc_relatedproduct2_options = array();
    else
        $cmc_relatedproduct2_options = unserialize($cmc_relatedproduct2_options);
?>
    <div>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Nombre del producto'); ?></label>
        <input name="cmc-relatedproduct2-options[product-name]" type="text" value="<?php echo $cmc_relatedproduct2_options['product-name']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Enlace de afiliado'); ?></label>
        <input name="cmc-relatedproduct2-options[affiliate-link]" type="text" value="<?php echo $cmc_relatedproduct2_options['affiliate-link']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Marca'); ?></label>
        <input name="cmc-relatedproduct2-options[brand]" type="text" value="<?php echo $cmc_relatedproduct2_options['brand']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Operación'); ?></label>
        <input name="cmc-relatedproduct2-options[transaction]" type="text" value="<?php echo $cmc_relatedproduct2_options['transaction']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Capacidad'); ?></label>
        <input name="cmc-relatedproduct2-options[capacitance]" type="text" value="<?php echo $cmc_relatedproduct2_options['capacitance']; ?>">
        <br/>
        <?php $score = $cmc_relatedproduct2_options['score']; ?>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Puntuación'); ?></label>
        <select name="cmc-relatedproduct2-options[score]">
            <option <?php echo selected($score, '', false); ?> value=""><?php _e('Seleccionar puntuación'); ?></option>
            <option <?php echo selected($score, '1', false); ?> value="1">1</option>
            <option <?php echo selected($score, '1.5', false); ?> value="1.5">1.5</option>
            <option <?php echo selected($score, '2', false); ?> value="2">2</option>
            <option <?php echo selected($score, '2.5', false); ?> value="2.5">2.5</option>
            <option <?php echo selected($score, '3', false); ?> value="3">3</option>
            <option <?php echo selected($score, '3.5', false); ?> value="3.5">3.5</option>
            <option <?php echo selected($score, '4', false); ?> value="4">4</option>
            <option <?php echo selected($score, '4.5', false); ?> value="4.5">4.5</option>
            <option <?php echo selected($score, '5', false); ?> value="5">5</option>
        </select>
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('ASIN'); ?></label>
        <input name="cmc-relatedproduct2-options[asin]" type="text" value="<?php echo $cmc_relatedproduct2_options['asin']; ?>">
        <br/>
        <label style="width:100px;display:inline-block;" for="input-metabox"><?php _e('Texto botón'); ?></label>
        <input name="cmc-relatedproduct2-options[button-text]" type="text" value="<?php echo $cmc_relatedproduct2_options['button-text']; ?>">
        <br/>
    </div>
<?php
}

function cmc_save_relatedproduct2_metabox($post_id, $post, $update) {
    if (!isset($_POST['meta-box-nonce']) || !wp_verify_nonce($_POST['meta-box-nonce'], basename(__FILE__)))
        return $post_id;

    if(!current_user_can('edit_post', $post_id))
        return $post_id;

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    if(isset($_POST['cmc-relatedproduct2-options'])) {
        update_post_meta($post_id, 'cmc-relatedproduct2-options', serialize($_POST['cmc-relatedproduct2-options']));
    }
}
add_action('save_post', 'cmc_save_relatedproduct2_metabox', 10, 3);

function cmc_gallery_data_metabox() {
    add_meta_box('cmc_gallery_data', 'Datos', 'cmc_gallery_data_metabox_design', 'product-gallery', 'normal', 'high', null);
}
add_action('add_meta_boxes', 'cmc_gallery_data_metabox');

function cmc_gallery_data_metabox_design($post) {
    wp_nonce_field(basename(__FILE__), 'meta-box-nonce');
?>
    <div>
        <label for="input-metabox"><?php _e('Enlace:'); ?></label>
        <input name="cmc-gallery-url" type="text" value="<?php echo get_post_meta($post->ID, 'cmc-gallery-url', true); ?>">
        <br/>
        <label for="input-metabox"><?php _e('Precio:'); ?></label>
        <input name="cmc-gallery-price" type="text" value="<?php echo get_post_meta($post->ID, 'cmc-gallery-price', true); ?>">
        <br/>
    </div>
    <?php
}

function cmc_gallery_data_metabox_save($post_id, $post, $update) {
    if (!isset($_POST['meta-box-nonce']) || !wp_verify_nonce($_POST['meta-box-nonce'], basename(__FILE__)))
        return $post_id;

    if(!current_user_can('edit_post', $post_id))
        return $post_id;

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    if(isset($_POST['cmc-gallery-url'])) {
        update_post_meta($post_id, 'cmc-gallery-url', $_POST['cmc-gallery-url']);
    }

    if(isset($_POST['cmc-gallery-price'])) {
        update_post_meta($post_id, 'cmc-gallery-price', $_POST['cmc-gallery-price']);
    }
}
add_action('save_post', 'cmc_gallery_data_metabox_save', 10, 3);