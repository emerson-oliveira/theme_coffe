		<?php $options = get_option('cmc_options'); ?>
		<div class="clear"></div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrapper">
				<div class="footer-grid"><?php dynamic_sidebar('footer-widgets-1'); ?></div>
				<div class="footer-grid"><?php dynamic_sidebar('footer-widgets-2'); ?></div>
				<div class="footer-grid"><?php dynamic_sidebar('footer-widgets-3'); ?></div>
				<div class="clear"></div>
			</div>
			<div class="footer-copyright">
				<div class="wrapper">
					<div class="footer-legal"><?php echo $options['theme_legal_footer']['value']; ?></div>
					<small class="copyright">&copy; <?php echo date('Y'); ?> <?php _e('Copyright ComprarMiCafetera.com. Todos los derechos reservados.'); ?></small>
				</div>
			</div>
		</footer>
	</div>
	<?php echo get_rich_snippets(); ?>
	<?php wp_footer(); ?>
	<?php echo cmc_the_styles(); ?>
</body>
</html>