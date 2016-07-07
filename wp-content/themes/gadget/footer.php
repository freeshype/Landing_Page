<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Gadget
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="widget-wrap">
			<?php get_sidebar(); ?>
		</div>
		<div class="site-info">
			<div class="copy">
				<?php bloginfo( 'name' ); ?> &copy; <?php echo date("Y"); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
