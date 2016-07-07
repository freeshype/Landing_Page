(function ()
{
	// create accioShortcodes plugin
	tinymce.create("tinymce.plugins.accioShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("accioPopup", function ( a, params )
			{
				var popup = params.identifier;

				// load thickbox
				tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "accio_button" )
			{
				var a = this;

				// adds the tinymce button
				btn = e.createMenuButton("accio_button",
				{
					title: "Insert Shortcode",
					image: "../wp-content/themes/accio/tinymce/images/icon.png",
					icons: false
				});

				// adds the dropdown to the button
				btn.onRenderMenu.add(function (c, b)
				{
					a.addWithPopup( b, "Column", "column" );
					a.addWithPopup( b, "Youtube", "youtube" );
					a.addWithPopup( b, "Vimeo", "vimeo" );
					a.addWithPopup( b, "Audio", "audio" );
					a.addWithPopup( b, "Video", "video" );
					a.addWithPopup( b, "Soundcloud", "soundcloud" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Alerts", "alert" );
					a.addWithPopup( b, "Tooltips", "tooltip" );
					a.addWithPopup( b, "Highlight", "highlight" );
					a.addWithPopup( b, "Toggles", "toggle" );
					a.addWithPopup( b, "Progress Bars", "progress" );
					a.addWithPopup( b, "Slider", "slider" );
					a.addWithPopup( b, "Accordions", "accordion" );
					a.addWithPopup( b, "Social Links", "social" );
					a.addWithPopup( b, "Tabbed Content", "tabs" );
				});

				return btn;
			}

			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("accioPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Accio Shortcodes',
				author: 'Djdesignerlab',
				authorurl: 'http://themeforest.net/user/djdesignerlab/',
				infourl: 'http://djdesignerlab.com/',
				version: "1.0"
			}
		}
	});

	// add accioShortcodes plugin
	tinymce.PluginManager.add("accioShortcodes", tinymce.plugins.accioShortcodes);
})();
