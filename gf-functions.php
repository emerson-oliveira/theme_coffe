<?php
/**
 * Electro Child
 *
 * @package electro-child
 */

/**
 * Include all your custom code here
 */

add_filter('woocommerce_cart_item_price', 'bbloomer_change_cart_table_price_display', 30, 3);
  
function bbloomer_change_cart_table_price_display($price, $values, $cart_item_key)
{
    $slashed_price = $values['data']->get_price_html();
    $is_on_sale = $values['data']->is_on_sale();
    if ($is_on_sale) {
        $price = $slashed_price;
    }
    return $price;
}

function header_trustpilot()
{
    echo esc_html('<div id="trustpilot-widget-trustbox-heade1" class="container">
	<div id="trustpilot-widget-trustbox-1" class="trustpilot-widget" data-locale="es-ES" data-template-id="5419b732fbfb950b10de65e5" data-businessunit-id="5f0c670158c69b000171f7bd" data-theme="light">
	</div>
	</div>
	');
}
add_action("wp_head", "header_trustpilot");

function query_fixing_title()
{
    ?>
<script>
jQuery(document).ready(function(){
	
	jQuery('.product-type-variable span.electro-price ').contents()
            .filter(function() { return this.nodeType == 3; })
            .replaceWith('');
	
	
	function get_query(){
    var url = document.location.href;
    var qs = url.substring(url.indexOf('?') + 1).split('&');
    for(var i = 0, result = {}; i < qs.length; i++){
        qs[i] = qs[i].split('=');
        result[qs[i][0]] = decodeURIComponent(qs[i][1]);
    }
    return result;
}
											  
var result = get_query();
if(result["filter_producto"]){
	jQuery("h1.page-title").html(result["filter_producto"]);
}else{
	jQuery("h1.page-title").html(result["filter_color"]);
}

});
	</script>
<?php
}
add_action("wp_head", "query_fixing_title");
