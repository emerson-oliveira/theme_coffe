<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php $options = get_option('cmc_options'); ?>
	<title><?php wp_title(''); ?></title>
	<link rel="shortcut icon" href="<?php echo $options['theme_favicon']['value']; ?>">
	<?php if(is_search()): ?><meta name="robots" content="noindex"><?php endif; ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TK5RDBV');</script>
	<!-- End Google Tag Manager -->
	<!-- Soporte para móviles -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.jpg">
	<meta name="theme-color" content="#000033">
	<meta name="google-site-verification" content="S0HYGuIEvoYNVTHi5YdbSZKFcN8vxwOeonOlRahmaKo" />
	<meta name="application-name" content="<?php bloginfo('name'); ?>">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.jpg" sizes="192x192">
	<!-- End -->
		<!--- Atomik Lib settings --->
	<link rel="preconnect" href="https://partners.mcontigo.com">
	<script type="text/javascript">
		window.atomikLib = window.atomikLib || { cmd: [] };
		window.atomikLib.localConfig = {
			defaultUnit: "/7120678/mcontigo/comprarmicafetera.com",
			sticky: {
				enabled: true,
				trigger: "ready"
			},
			cmp: {
				enabled: true,
				internal: true,
				timeout: 8000,
				didomiConfig: {
					app: {
						apiKey: "6049ab13-a5f3-4c15-b66b-edae53142afc",
						name: "Comprar mi Cafetera",
						logoUrl: "https://www.comprarmicafetera.com/wp-content/uploads/2020/12/Logo-CMC-580-Def-3.png"
					},
					theme: {
						color: "#1f1f1f",
						linkColor: "#1f1f1f",
					},
					languages: {
						enabled: ["es"],
						default: "es",
					},
				},
			},

		};
	</script>
	<script type="text/javascript" src="https://partners.mcontigo.com/loader.js?d=comprarmicafetera.com" async id="loader"></script>
	<!--- End Atomik Lib settings --->	
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3666319173489616"
     crossorigin="anonymous"></script>
	<?php echo get_facebook_script(); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TK5RDBV"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div id="page">
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
				<a class="header-logo" href="<?php echo esc_url(home_url('/')); ?>"><img alt="<?php _e('Logo de '); bloginfo('name'); ?>" src="<?php echo $options['theme_logo']['value']; ?>"><span><?php echo $options['theme_subtitle']['value']; ?></span></a>
				<form id="searchform" class="searchform" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"><input type="search" id="s" name="s" placeholder="<?php _e('Buscar...'); ?>"></form>
				<div class="clear"></div>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'header_menu',
							'menu_id' => 'primary-menu',
							'menu_class' => 'wrapper'
						)
					);
				?>
			</nav>
		</header>