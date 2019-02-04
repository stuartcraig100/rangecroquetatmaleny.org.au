 jQuery(document).ready(function($){
	'use strict';
	var attachmentFrame;

	$( '#acui_email_template_upload_button' ).click(function(e) {
		var btn = e.target;

		if ( !btn  ) return;

		e.preventDefault();

		attachmentFrame = wp.media.frames.attachmentFrame = wp.media({
			title: meta_image.title,
			button: { text:  meta_image.button },
		});

		attachmentFrame.on('select', function() {
			var media_attachment = attachmentFrame.state().get('selection').first().toJSON();

			$( '#email_template_attachment_file' ).val( media_attachment.url );
			$( '#email_template_attachment_id' ).val( media_attachment.id );
		});

		attachmentFrame.open();
	});
});