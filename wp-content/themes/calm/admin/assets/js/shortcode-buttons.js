(function() {

    tinymce.PluginManager.add('pushortcodes', function( editor )
    {
        var shortcodeValues = [];
        jQuery.each(shortcodes_button, function(i)
        {
            shortcodeValues.push({text: shortcodes_button[i], value:i});
        });

        editor.addButton('pushortcodes', {
            type: 'button',
            text: 'Button',
            onclick: function(e) {
                var link = prompt('link', '');
                var button_txt = prompt('Button Text', '');

                tinyMCE.activeEditor.selection.setContent( '[button link="' + link + '" button_txt="'+button_txt+'"]' );
            },
            values: shortcodeValues
        });
    });
})();
