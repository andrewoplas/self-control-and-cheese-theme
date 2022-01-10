<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package algert-starter
 */

?>
<footer id="colophon" class="site-footer">

	<section class="footer-top">
		<div class="container">
			<div class="row">
				<?php if (!dynamic_sidebar('footer-widget')) : ?><?php endif; ?>
			</div>
		</div>
	</section>

	<section class="site-info">
		<div class="container">
			<div class="row text-center text-lg-left text-md-left">
				<div class="col-md-6 mb-2">
					<?php if (get_theme_mod('footer_text_block') != "") : ?>
						<?php echo get_theme_mod('footer_text_block'); ?>
					<?php endif; ?>
				</div>

				<div class="col-md-6 mb-2">
					<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'footer-menu')); ?>
				</div>

			</div>
		</div>
	</section>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>