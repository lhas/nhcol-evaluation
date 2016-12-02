(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(function(){

    $(".digit-only").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

         // Let's set up some variables for the image upload and removing the image     
         var frame,
             imgUploadButton = '.button_upload',
             imgDelButton = '.nhcol_evaluation-delete-image',
             // Color Pickers Inputs
             colorPickerInputs = $( '.nhcol-evaluation-color-picker' );

         // WordPress specific plugins - color picker and image upload
         $( colorPickerInputs ).wpColorPicker();

        // wp.media add Image
         $('body').on( 'click', imgUploadButton, function( event ){

           var element = $(this);
            
            event.preventDefault();
            
            // Create a new media frame
            frame = wp.media({
              title: 'Select or Upload Media',
              button: {
                text: 'Use as Image'
              },
              multiple: false  // Set to true to allow multiple files to be selected
            });
            // When an image is selected in the media frame...
            frame.on( 'select', function() {
              
              // Get media attachment details from the frame state
              var attachment = frame.state().get('selection').first().toJSON();   
              var imgPreview = $(element).parent().parent().find('.nhcol_evaluation-upload-preview');
              var imgIdInput = $(element).parent().parent().find('.logo_id');

              // Send the attachment URL to our custom image input field.
              imgPreview.find( 'div' ).css( 'background', 'url(' + attachment.sizes.full.url + ')' );

              // Send the attachment id to our hidden input
              imgIdInput.val( attachment.id );

              // Unhide the remove image link
              imgPreview.removeClass( 'hidden' );
            });

            // Finally, open the modal on click
            frame.open();
        });


        // Erase image url and age preview
         $('body').on( 'click', imgDelButton, function( e ){
            var element = $(this);
            var imgPreview = $(element).parent().parent().find('.nhcol_evaluation-upload-preview');
            var imgIdInput = $(element).parent().parent().find('.logo_id');

            e.preventDefault();
            imgIdInput.val('');
            imgPreview.find( 'div' ).css( 'background', '' );
            imgPreview.addClass('hidden');
        });

    }); // End of DOM Ready

})( jQuery );

/* evaluations.module.js */
angular
  .module('logos', []);

/* evaluations.controller.js */
angular
  .module('logos')
  .controller('LogosCtrl', LogosCtrl);

function LogosCtrl() {
}