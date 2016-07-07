<?php
/**
 * The template for displaying search forms.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

?>

<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
	<fieldset>
		<input autocomplete="off" type="text" name="s" id="s" value="<?php _e('Search...', 'framework'); ?>" onfocus="if(this.value=='<?php _e('Search...', 'framework'); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Search...', 'framework'); ?>';">
	</fieldset>
</form>
