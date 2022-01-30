jQuery(document).ready(function($) {
	jQuery('#cmcMoreProducts').click(function(event) {
		event.preventDefault();
		if(jQuery('#cmcSearch').val() == 1) {
			jQuery('#loading').show();
			$.ajax({
				method: "POST",
				async: false,
				url: ajax_object.ajax_url,
				data: {'action': 'cmc_get_next_products', 'postType': jQuery('#cmcPostType').val(), 'taxonomy': jQuery('#cmcTaxonomy').val(), 'term': jQuery('#cmcTerm').val(), 'offset': jQuery('#cmcOffset').val()},
				success: function(result) {
					if(result != 2){
						jQuery('.list-products').append(result);
						jQuery('#cmcOffset').val(parseInt(jQuery('#cmcOffset').val()) + 12);
						jQuery('#loading').hide();
					}
					else {
						jQuery('#cmcSearch').val(2);
						jQuery('#loading').hide();
						jQuery('#cmcMoreProducts').hide();
						jQuery('.cmc-message').show();
					}
				},
				error: function(result) {
					jQuery('.list-products').append('No se han podido cargar los productos');
					jQuery('#loading').hide();
				}
			})
		}
	});
});