<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Gadget
 */

if ( is_active_sidebar( 'sidebar-1' ) ) :
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php
       $mysidebars = wp_get_sidebars_widgets();
       $total_widgets = count( $mysidebars['sidebar-1'] );
       $limit_allowed=3;
    ?>
    <?php  if ($total_widgets > $limit_allowed) {
        echo '<span class="widget-error">Your '.$total_widgets.' added widgets goes over the allowed limit: '.$limit_allowed.'</span>';
        } else { ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php }; ?>
	<div class="clearfix"></div>
</div><!-- #secondary -->

<?php endif; ?>
