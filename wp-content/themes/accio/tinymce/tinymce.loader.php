<?php

/*-----------------------------------------------------------------------------------*/
/*	Paths Defenitions
/*-----------------------------------------------------------------------------------*/

define('ACCIO_TINYMCE_PATH', ACCIO_FILEPATH . '/tinymce');
define('ACCIO_TINYMCE_URI', ACCIO_DIRECTORY . '/tinymce');

/*-----------------------------------------------------------------------------------*/
/*	Load TinyMCE dialog
/*-----------------------------------------------------------------------------------*/

require_once( ACCIO_TINYMCE_PATH . '/tinymce.class.php' );		// TinyMCE wrapper class
new accio_tinymce();											// do the magic

?>
