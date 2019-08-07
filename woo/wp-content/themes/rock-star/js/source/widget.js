jQuery(document).ready(function ($) {

   $(document).on( "click", ".upload-media-button", function (e) {
    e.preventDefault();
    var $button = $(this);

    // Create the media frame.
    var file_frame = wp.media.frames.file_frame = wp.media({
      title: 'Select or upload media',
      button: {
        text: 'Select'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on('select', function () {
      // We set multiple to false so only get one image from the uploader.
      var attachment = file_frame.state().get('selection').first().toJSON();

      $button.siblings('input').val(attachment.url);

      $button.parents('form').find('.widget-control-save').val('Save');
      $button.parents('form').find('.widget-control-save').removeAttr('disabled');
    });

    // Finally, open the modal
    file_frame.open();
   });

  $("body").delegate(".ct-datepicker", "focusin", function(){
     $(this).datepicker({
    dateFormat : 'M dd',
    constrainInput: false
     });
  });
});
