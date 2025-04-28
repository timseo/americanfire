(function($) {
  "use strict";

	jQuery(document).ready(function(){

		$('button#author_info_image').on('click', function( e ){
			e.preventDefault();
			
			var imageUploader = wp.media({
				'title'		: 'Upload Author Image',
				'button'	: {
					'text'	: 'Set Author Image'
				},
				'multiple'	: false
			});
			imageUploader.open();


			imageUploader.on('select', function(){
				var image = imageUploader.state().get('selection').first().toJSON();
				var link = image.url;

				$("input.author_image_link").val( link );
				$(".author-image-show img").attr( 'src', link );
			});

			
		});

	});

})(jQuery);

