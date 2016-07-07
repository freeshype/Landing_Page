tinymce.create('tinymce.plugins.dw_page_shortcode', {
    createControl: function(n, cm) {
        switch (n) {

            // Dw page testimonial
            case 'dw_page_testimonial':
            var c = cm.createSplitButton('dw_page_testimonial', {
                title : 'Testimonial',
                onclick : function() {}
            });

            c.onRenderMenu.add(function(c, m) {
                m.onShowMenu.add(function(c,m){
                    jQuery('#menu_'+c.id).height('auto').width('auto');
                    jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu');
                    var menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                    var content = '';

                    content += '<div class="dw-page-shortcode-button">';
                        content += '<label> Row';
                            content += '<input type="text" name="row" onclick="this.select()" value="1" />';
                        content += '</label>';

                        content += '<label> Column';
                            content += '<select name="col">';
                                content += '<option value="1">1</option>';
                                content += '<option selected value="2">2</option>';
                                content += '<option value="3">3</option>';
                                content += '<option value="4">4</option>';
                                content += '<option value="6">6</option>';
                            content += '</select>';
                        content += '</label>';

                        content += '<label> Display';
                            content += '<select name="display">';
                                content += '<option selected value="random">Random</option>';
                                content += '<option value="latest">Latest</option>';
                            content += '</select>';
                        content += '</label>';

                        content += '<div><input type="button" class="button" value="Insert" /></div>';

                    content += '</div>';

                    menu.html(content);
                    content = '';

                    jQuery('.dw-page-shortcode-button .button').click(function(){
                        var display = menu.find('[name=display]').val();
                        var row = menu.find('[name=row]').val();
                        var col = menu.find('[name=col]').val();
                        tinymce.activeEditor.execCommand('mceInsertContent',false,'[onepage_testimonials display="'+display+' " row="'+row+' " col="'+col+'"]');
                        c.hideMenu();
                    });

                    menu.data('added',true);

                });

               // XSmall
                m.add({title : 'Buttons', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

            });
            return c;

            // Dw page team
            case 'dw_page_team':
            var c = cm.createSplitButton('dw_page_team', {
                title : 'Team',
                onclick : function() {}
            });


            c.onRenderMenu.add(function(c, m) {
                m.onShowMenu.add(function(c,m){
                    jQuery('#menu_'+c.id).height('auto').width('auto');
                    jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu');
                    var menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                    var content = '';
                    var users = dw_page_script.users;

                    content += '<div class="dw-page-shortcode-button">';
                        content += '<label> Column';
                            content += '<select name="col">';
                                content += '<option value="1">1</option>';
                                content += '<option value="2">2</option>';
                                content += '<option selected value="3">3</option>';
                                content += '<option value="4">4</option>';
                                content += '<option value="6">6</option>';
                            content += '</select>';
                        content += '</label>';

                        content += '<label> Include users</label>';
                        content += '<select name="include" multiple>';
                            content += '<option selected value=" ">All</option>';
                            if (users) {
                            var user_array = jQuery.map(users, function(value, index) {
                                content += '<option value="'+index+'">'+value+'</option>';
                            });
                            };
                        content += '</select>';

                        content += '<label> Exclude users</label>';
                        content += '<select name="exclude" multiple>';
                            content += '<option selected value=" ">None</option>';
                            if (users) {
                            var user_array = jQuery.map(users, function(value, index) {
                                content += '<option value="'+index+'">'+value+'</option>';
                            });
                            };
                        content += '</select>';

                        content += '<div><input type="button" class="button" value="Insert" /></div>';

                    content += '</div>';

                    menu.html(content);
                    content = '';

                    jQuery('.dw-page-shortcode-button .button').click(function(){
                        var include = menu.find('[name=include]').val();
                        var exclude = menu.find('[name=exclude]').val();
                        var col = menu.find('[name=col]').val();
                        tinymce.activeEditor.execCommand('mceInsertContent',false,'[onepage_ourteam include="'+include+' " exclude="'+exclude+' " col="'+col+'"]');
                        c.hideMenu();
                    });

                    menu.data('added',true);

                });

               // XSmall
                m.add({title : 'Buttons', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

            });
            return c;

            // Dw page projects
            case 'dw_page_projects':
            var c = cm.createSplitButton('dw_page_projects', {
                title : 'Projects',
                onclick : function() {}
            });

            c.onRenderMenu.add(function(c, m) {
                m.onShowMenu.add(function(c,m){
                    jQuery('#menu_'+c.id).height('auto').width('auto');
                    jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu');
                    var menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                    var content = '';
                    var term_project = dw_page_script.term_project;

                    content += '<div class="dw-page-shortcode-button">';
                        content += '<label> Number <br/>';
                            content += '<input type="text" name="number" onclick="this.select()" value="" />';
                        content += '</label>';

                        content += '<label> Row';
                            content += '<input type="text" name="row" onclick="this.select()" value="2" />';
                        content += '</label>';

                        content += '<label> Column';
                            content += '<select name="col">';
                                content += '<option value="1">1</option>';
                                content += '<option value="2">2</option>';
                                content += '<option value="3">3</option>';
                                content += '<option selected value="4">4</option>';
                                content += '<option value="6">6</option>';
                            content += '</select>';
                        content += '</label>';

                        content += '<label> Select category</label>';
                        content += '<select name="term-project" multiple>';
                            content += '<option selected value="">All</option>';
                            if (term_project) {
                            var term_project_array = jQuery.map(term_project, function(value, index) {
                                content += '<option value="'+index+'">'+value+'</option>';
                            });
                            };
                        content += '</select>';

                        content += '<div><input type="button" class="button" value="Insert" /></div>';

                    content += '</div>';

                    menu.html(content);
                    content = '';

                    jQuery('.dw-page-shortcode-button .button').click(function(){
                        var mumber = menu.find('[name=number]').val();
                        var row = menu.find('[name=row]').val();
                        var col = menu.find('[name=col]').val();
                        var term_project = menu.find('[name=term-project]').val();
                        tinymce.activeEditor.execCommand('mceInsertContent',false,'[onepage_projects numer="'+mumber+' " row="'+row+' " col="'+col+'" cat="'+term_project+'" ]');
                        c.hideMenu();
                    });

                    menu.data('added',true);

                });

               // XSmall
                m.add({title : 'Buttons', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

            });
            return c;

            // Dw page blog
            case 'dw_page_blog':
            var c = cm.createSplitButton('dw_page_blog', {
                title : 'Blog',
                onclick : function() {}
            });

            c.onRenderMenu.add(function(c, m) {
                m.onShowMenu.add(function(c,m){
                    jQuery('#menu_'+c.id).height('auto').width('auto');
                    jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu');
                    var menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                    var content = '';
                    var term_cate = dw_page_script.term_cate;

                    content += '<div class="dw-page-shortcode-button">';
                        content += '<label> Number <br/>';
                            content += '<input type="text" name="number" onclick="this.select()" value="" />';
                        content += '</label>';

                        content += '<label> Row';
                            content += '<input type="text" name="row" onclick="this.select()" value="2" />';
                        content += '</label>';

                        content += '<label> Column';
                            content += '<select name="col">';
                                content += '<option value="1">1</option>';
                                content += '<option value="2">2</option>';
                                content += '<option value="3">3</option>';
                                content += '<option selected value="4">4</option>';
                                content += '<option value="6">6</option>';
                            content += '</select>';
                        content += '</label>';

                        content += '<label> Select category</label>';
                        content += '<select name="term-cate" multiple>';
                            content += '<option selected value="">All</option>';
                            if (term_cate) {
                            var term_cate_array = jQuery.map(term_cate, function(value, index) {
                                content += '<option value="'+index+'">'+value+'</option>';
                            });
                            };
                        content += '</select>';

                        content += '<div><input type="button" class="button" value="Insert" /></div>';

                    content += '</div>';

                    menu.html(content);
                    content = '';

                    jQuery('.dw-page-shortcode-button .button').click(function(){
                        var mumber = menu.find('[name=number]').val();
                        var row = menu.find('[name=row]').val();
                        var col = menu.find('[name=col]').val();
                        var term_cate = menu.find('[name=term-cate]').val();
                        tinymce.activeEditor.execCommand('mceInsertContent',false,'[onepage_blog numer="'+mumber+' " row="'+row+' " col="'+col+'" cat="'+term_cate+'" ]');
                        c.hideMenu();
                    });

                    menu.data('added',true);

                });

               // XSmall
                m.add({title : 'Buttons', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

            });
            return c;

            // Dw page client
            case 'dw_page_client':
            var c = cm.createSplitButton('dw_page_client', {
                title : 'Client',
                onclick : function() {}
            });

            c.onRenderMenu.add(function(c, m) {
                m.onShowMenu.add(function(c,m){
                    jQuery('#menu_'+c.id).height('auto').width('auto');
                    jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu');
                    var menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                    var content = '';

                    content += '<div class="dw-page-shortcode-button">';
                        content += '<label> Row';
                            content += '<input type="text" name="row" onclick="this.select()" value="1" />';
                        content += '</label>';

                        content += '<label> Column';
                            content += '<select name="col">';
                                content += '<option value="1">1</option>';
                                content += '<option value="2">2</option>';
                                content += '<option value="3">3</option>';
                                content += '<option value="4">4</option>';
                                content += '<option selected value="6">6</option>';
                            content += '</select>';
                        content += '</label>';

                        content += '<label> Display';
                            content += '<select name="display">';
                                content += '<option selected value="random">Random</option>';
                                content += '<option value="latest">Latest</option>';
                            content += '</select>';
                        content += '</label>';

                        content += '<div><input type="button" class="button" value="Insert" /></div>';

                    content += '</div>';

                    menu.html(content);
                    content = '';

                    jQuery('.dw-page-shortcode-button .button').click(function(){
                        var display = menu.find('[name=display]').val();
                        var row = menu.find('[name=row]').val();
                        var col = menu.find('[name=col]').val();
                        tinymce.activeEditor.execCommand('mceInsertContent',false,'[onepage_clients display="'+display+' " row="'+row+' " col="'+col+'"]');
                        c.hideMenu();
                    });

                    menu.data('added',true);

                });

               // XSmall
                m.add({title : 'Buttons', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

            });
            return c;
        }
        return null;
    },

    getInfo : function() {
        return {
            longname : 'DW Page Shortcode',
            author : 'DesignWall',
            authorurl : 'http://designwall.com',
            infourl : 'http://designwall.com',
            version : "1.0.1"
        };
    }
});
tinymce.PluginManager.add('dw_page_shortcode', tinymce.plugins.dw_page_shortcode);
