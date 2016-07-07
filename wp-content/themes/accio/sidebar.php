<?php
/**
 * The template for displaying sidebars
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */
?>

<!-- Start Sidebar -->
<div id="aside" class="span4">

	<aside id="sidebar">
		<?php
			if(!is_page()) :
			/* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar() ) : ?>

                <?php

				endif;
			else:
			/* Widgetised Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Page Sidebar') ) : ?>

                <?php
				endif;
			endif;
			?>

	</aside>

</div>
<!-- End Sidebar -->
