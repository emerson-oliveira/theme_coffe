<?php
include_once(get_template_directory().'/includes/old-template.php');

/* Add David, para quitar alternates /feed en el head */
function disable_all_feeds() {
	wp_die( __('Lo siento, nuestro contenido no está disponible mediante RSS. Por favor, visita <a href="'. get_bloginfo('url') .'">la web</a> para leerla') );
}

add_action('do_feed', 'wpb_disable_feed', 1);
add_action('do_feed_rdf', 'wpb_disable_feed', 1);
add_action('do_feed_rss', 'wpb_disable_feed', 1);
add_action('do_feed_rss2', 'wpb_disable_feed', 1);
add_action('do_feed_atom', 'wpb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
/* Fin Add David, para quitar alternates /feed en el head */

/** CORE */
include_once('includes/functions/core.php');
include_once('includes/functions/settings.php');

/** WIDGETS */
include_once('includes/functions/widgets.php');

/** HOOKS */
include_once('includes/hooks/taxonomy.php');
include_once('includes/hooks/metabox.php');
include_once('includes/hooks/amazon.php');
include_once('includes/hooks/product.php');


include_once(get_template_directory().'/includes/meta-boxes-brands.php');
include_once(get_template_directory().'/includes/meta-boxes-main_product.php');
