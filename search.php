<?php get_header(); ?>
<?php $options = get_option('cmc_options'); ?>

<main role="main">
	<div class="wrapper container">
		<div id="primary" class="primary file-search">
				<div class="list-products">
					<?php $paged = (get_query_var('paged'))?get_query_var('paged'):1; ?>
					<?php
						$args = array(
							'post_type' => array('post', 'page', 'main_product', 'related_product_1', 'related_product_2', 'brands'),
							'paged' => $paged,
							's' => $_GET['s']
						);
						$query = new WP_Query($args);
					?>
					<?php
						if(!$query->have_posts()){
							echo '<div class="search-content">' . do_shortcode($options['theme_search_text']['value']) . '</div>';
						}
					?>
					<?php while($query->have_posts()): $query->the_post(); ?>
						<?php if(get_post_type() == 'main_product' || get_post_type() == 'related_product_1' || get_post_type() == 'related_product_2') { ?>
							<?php $data = cmc_get_prodcut_data(get_the_ID(), get_post_type()); ?>
							<div class="article-2">
								<div class="entry-header-2">
									<?php
										if(!empty($data['image-medium'])) { ?>
											<a class="post-thumbnail-2" href="<?php the_permalink(); ?>"><img src="<?php echo $data['image-medium']; ?>"></a>
										<?php }
										else { ?>
											<a class="post-thumbnail-2" href="<?php the_permalink(); ?>"><!-- Default post thumbnail --></a>
										<?php }
									?>
									<h2><a class="post-title-2" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
								</div>
								<div class="entry-content-2"><?php
								$titleSize = strlen(get_the_title());
								if($titleSize >= 32 &&  $titleSize < 55 ){
									$psize = 90;
								} else if($titleSize >= 55) {
									$psize = 40;
								} else {
									$psize = 120;
								}
								//echo $titleSize;
								echo mb_substr(wp_strip_all_tags(get_the_content()), 0, $psize); 
								?>...</div>
								<?php if($data['price'] != '') { ?>
									<div class="read-more price"><span><?php echo $data['price']; ?> €</span></div>
								<?php } else { ?>
									<div class="read-more"><a href="<?php esc_url(the_permalink()); ?>"><?php _e('Acceder'); ?></a></div>
								<?php } ?>
							</div>
						<?php } else { ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('article-2'); ?>>
								<header class="entry-header-2">
									<?php
										if(has_post_thumbnail()) { ?>
											<a class="post-thumbnail-2" href="<?php esc_url(the_permalink()); ?>"><?php the_post_thumbnail('post-thumbnail'); ?></a>
										<?php }
										else { ?>
											<a class="post-thumbnail-2" href="<?php esc_url(the_permalink()); ?>"><!-- Default post thumbnail --></a>
										<?php }
									?>
									<h2><a class="post-title-2" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
								</header>
								<div class="entry-content-2"><?php
								$titleSize = strlen(get_the_title());
								if($titleSize >= 33 &&  $titleSize < 55 ){
									$psize = 90;
								} else if($titleSize >= 55) {
									$psize = 40;
								} else {
									$psize = 120;
								}
								//echo $titleSize;
								echo mb_substr(wp_strip_all_tags(get_the_content()), 0, $psize); 
								?>...</div>
								<div class="read-more"><a href="<?php esc_url(the_permalink()); ?>"><?php _e('Leer más'); ?></a></div>
							</article>
						<?php } ?>
					<?php endwhile; ?>				
				</div>
				<?php get_template_part('content/content', 'pagination'); ?>
				<?php wp_reset_postdata(); ?>
			
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>