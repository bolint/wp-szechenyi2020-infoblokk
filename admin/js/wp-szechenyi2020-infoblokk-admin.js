(function ($) {
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

    $(document)
        .off('click.Szechenyi2020ImageUpload', '#szechenyi2020_image_upload')
        .on('click.Szechenyi2020ImageUpload', '#szechenyi2020_image_upload', function (e) {
            // Upload event handler
            e.preventDefault();

            var $button = $(this);
            var custom_uploader = wp.media({
                title: 'Insert image',
                library: {
                    // uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
                    type: 'image'
                },
                button: {
                    text: 'Use this image' // button label text
                },
                multiple: false
            }).on('select', function () { // it also has "open" and "close" events
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $button.html('<img src="' + attachment.sizes.thumbnail.url + '">');
                $button.find('span').hide();
                $button.find('img').attr('src', attachment.sizes.thumbnail.url).show();
                $('#szechenyi2020_image_remove').show();
                $('#szechenyi2020_image_id').val(attachment.id);
            }).open();
        })
        .off('click.Szechenyi2020ImageRemove', '#szechenyi2020_image_remove')
        .on('click.Szechenyi2020ImageRemove', '#szechenyi2020_image_remove', function (e) {
            // Remove event handler
            e.preventDefault();

            $(this).hide();
            $('#wp-szechenyi2020-infoblokk_image_id').val(''); // emptying the hidden field

            var $upload_button = $('#szechenyi2020_image_upload');
            $upload_button.find('img').attr('src', '').hide();
            $upload_button.find('span').show();
        });
})(jQuery);
