jQuery(document).ready(function($){
	// Media Uploader
  var meta_image_frame;

  $('#image-upload-button').click(function(e){
      e.preventDefault();

      if ( meta_image_frame ) {
          meta_image_frame.open();
          return;
      }

      meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          multiple: true,
          title: meta_image.title,
          button: { text:  meta_image.button },
          library: { type: 'image' }
      });

      meta_image_frame.on('select', function(){
          var media_attachment = meta_image_frame.state().get('selection');

              media_attachment.map(function(attachment) {

                attachment = attachment.toJSON();

                var i = 0;

                i++;

                var url = attachment.url;

                var urlArray = new Array();

                urlArray[i] = url;

                $('#image-upload').append(urlArray);
                $('#image-upload').append(" ");

                var img = $('<img class="selected-image">');
                img.attr('src', urlArray);
                var src = img.attr('src');
                img.attr('src', src.replace(',', ''));
                img.appendTo('#selected-images');

              })

      });

      meta_image_frame.open();
	});
});
