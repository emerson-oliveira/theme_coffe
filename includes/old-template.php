<?php
	function admin_tips($admin_tip_location) {
		return 0;
		switch ($admin_tip_location) {
			case "home_page_title":
				_e('Add your search engine optimized h1 tag for the home page here. This heading is displayed on your homepage. A great place to use one of your main key phrases. Try using it within a longer phrase that reads naturally and catches your visitor\'s attention.','ultimateazon');
				break;

			case "home_page_intro":
				_e('This is your first block of text on your homepage. It will show above the fold and is a great place to let your visitor know how you are going to help them solve a problem, alleviate a stress, make an informed buying decision, etc... Make sure to include your main key phrase somewhere in this area.','ultimateazon');
				break;

			case "top_selling_products":
				_e('Add products to the homepage "Top Products" slider or sortable table. The statistics you checked above will be automatically populated on the front end.','ultimateazon');
				break;

			case "top_selling_products_toggle":
				_e('Choose wether you want to display a top products slider, sortable table, or nothing on the homepage right under the site intro.','ultimateazon');
				break;

			case "home_page_main_content":
				_e('This is your main content editor for the homepage. Put the bulk of your homepage content here. It\'s recommended to have over 1000 words here and is the perfect place for a buying guide or any other content related to your general topic.','ultimateazon');
				break;

			case "prod_img_toggle":
				_e('Choose wether you want the main product image to be zoomable, link to the product affiliate link, or do nothing.','ultimateazon');
				break;

			default:
			_e('No tips for this field.','ultimateazon');
		}
	}
?>