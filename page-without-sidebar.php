<?php
/*
	Template Name: Página sin sidebar
	Template Post Type: page, brands
*/
?>
<?php get_header(); ?>

<main role="main">
	<div class="wrapper container">
		<div id="primary" class="primary without-sidebar file-page-without-sidebar">
			<?php while(have_posts()): the_post(); ?>
				<?php get_template_part('content/content', 'page'); ?>
				<?php if (comments_open() || get_comments_number()): comments_template(); endif; ?>
			<?php endwhile; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>