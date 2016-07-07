
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var accios = {
    	loadVals: function()
    	{
    		var shortcode = $('#_accio_shortcode').text(),
    			uShortcode = shortcode;

    		// fill in the gaps eg {{param}}
    		$('.accio-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('accio_', ''),		// gets rid of the accio_ prefix
    				re = new RegExp("{{"+id+"}}","g");

    			uShortcode = uShortcode.replace(re, input.val());
    		});

    		// adds the filled-in shortcode as hidden input
    		$('#_accio_ushortcode').remove();
    		$('#accio-sc-form-table').prepend('<div id="_accio_ushortcode" class="hidden">' + uShortcode + '</div>');

    		// updates preview
    		accios.updatePreview();
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_accio_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';

    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;

    			$('.accio-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('accio_', '')		// gets rid of the accio_ prefix
    					re = new RegExp("{{"+id+"}}","g");

    				rShortcode = rShortcode.replace(re, input.val());
    			});

    			shortcodes = shortcodes + rShortcode + "\n";
    		});

    		// adds the filled-in shortcode as hidden input
    		$('#_accio_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_accio_cshortcodes" class="hidden">' + shortcodes + '</div>');

    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_accio_ushortcode').text().replace('{{child_shortcode}}', shortcodes);

    		// add updated parent shortcode
    		$('#_accio_ushortcode').remove();
    		$('#accio-sc-form-table').prepend('<div id="_accio_ushortcode" class="hidden">' + pShortcode + '</div>');

    		// updates preview
    		accios.updatePreview();
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});

    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();

    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}

    			return false;
    		});

    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'

			});
    	},
    	updatePreview: function()
    	{
    		if( $('#accio-sc-preview').size() > 0 )
    		{
	    		var	shortcode = $('#_accio_ushortcode').html(),
	    			iframe = $('#accio-sc-preview'),
	    			iframeSrc = iframe.attr('src'),
	    			iframeSrc = iframeSrc.split('preview.php'),
	    			iframeSrc = iframeSrc[0] + 'preview.php';

	    		// updates the src value
	    		iframe.attr( 'src', iframeSrc + '?sc=' + base64_encode( shortcode ) );

	    		// update the height
	    		$('#accio-sc-preview').height( $('#accio-popup').outerHeight()-42 );
    		}
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				accioPopup = $('#accio-popup'),
				no_preview = ($('#_accio_preview').text() == 'false') ? true : false;

			if( no_preview )
			{
				ajaxCont.css({
					paddingTop: 0,
					paddingLeft: 0,
					height: (tbWindow.outerHeight()-47),
					overflow: 'scroll', // IMPORTANT
					width: 560
				});

				tbWindow.css({
					width: ajaxCont.outerWidth(),
					marginLeft: -(ajaxCont.outerWidth()/2)
				});

				$('#accio-popup').addClass('no_preview');
			}
			else
			{
				ajaxCont.css({
					padding: 0,
					// height: (tbWindow.outerHeight()-47),
					height: accioPopup.outerHeight()-15,
					overflow: 'hidden' // IMPORTANT
				});

				tbWindow.css({
					width: ajaxCont.outerWidth(),
					height: (ajaxCont.outerHeight() + 30),
					marginLeft: -(ajaxCont.outerWidth()/2),
					marginTop: -((ajaxCont.outerHeight() + 47)/2),
					top: '50%'
				});
			}
    	},
    	load: function()
    	{
    		var	accios = this,
    			popup = $('#accio-popup'),
    			form = $('#accio-sc-form', popup),
    			shortcode = $('#_accio_shortcode', form).text(),
    			popupType = $('#_accio_popup', form).text(),
    			uShortcode = '';

    		// resize TB
    		accios.resizeTB();
    		$(window).resize(function() { accios.resizeTB() });

    		// initialise
    		accios.loadVals();
    		accios.children();
    		accios.cLoadVals();

    		// update on children value change
    		$('.accio-cinput', form).live('change', function() {
    			accios.cLoadVals();
    		});

    		// update on value change
    		$('.accio-input', form).change(function() {
    			accios.loadVals();
    		});

    		// when insert is clicked
    		$('.accio-insert', form).click(function() {
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_accio_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}

    // run
    $('#accio-popup').livequery( function() { accios.load(); } );
});
