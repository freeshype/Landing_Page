<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new accio_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="accio-popup">

	<div id="accio-shortcode-wrap">

		<div id="accio-sc-form-wrap">

			<div id="accio-sc-form-head">

				<?php echo $shortcode->popup_title; ?>

			</div>
			<!-- /#accio-sc-form-head -->

			<form method="post" id="accio-sc-form">

				<table id="accio-sc-form-table">

					<?php echo $shortcode->output; ?>

					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary accio-insert">Insert Shortcode</a></td>
						</tr>
					</tbody>

				</table>
				<!-- /#accio-sc-form-table -->

			</form>
			<!-- /#accio-sc-form -->

		</div>
		<!-- /#accio-sc-form-wrap -->

		<div id="accio-sc-preview-wrap">

			<div id="accio-sc-preview-head">

				Shortcode Preview

			</div>
			<!-- /#accio-sc-preview-head -->

			<?php if( $shortcode->no_preview ) : ?>
			<div id="accio-sc-nopreview">Shortcode has no preview</div>
			<?php else : ?>
			<iframe src="<?php echo ACCIO_TINYMCE_URI; ?>/preview.php?sc=" width="249" frameborder="0" id="accio-sc-preview"></iframe>
			<?php endif; ?>

		</div>
		<!-- /#accio-sc-preview-wrap -->

		<div class="clear"></div>

	</div>
	<!-- /#accio-shortcode-wrap -->

</div>
<!-- /#accio-popup -->

</body>
</html>
