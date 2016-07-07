<?php
/**
 * The Template for displaying footer.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
?>

<!-- Start Footer -->
<footer>

	<div class="container">

		<div class="row">

			<div class="span4"><?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer One' ) ); ?></div>

			<div class="span4"><?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Two' ) ); ?></div>

			<div class="span4"><?php /* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer Three' ) ); ?></div>

		</div>

	</div>

</footer>
<!-- End Footer -->

<!-- Start Footer Credits -->
<section id="footer-credits">
	<div class="container">
		<div class="row">
			<div class="span12">
				<?php $options = get_option('accio_custom_settings'); ?>
				<?php $options['footer_text'] == '' ? $text = date( 'Y' ).bloginfo('name') : $text = $options['footer_text']; ?>
				<p class="credits"><?php echo $text; ?></p>
			</div>
		</div>
	</div>
</section>
<!-- End Footer Credits -->

<?php if(get_option('accio_analytics')) : ?>
<script type="text/javascript"><?php echo get_option('accio_analytics'); ?></script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>

</html>
