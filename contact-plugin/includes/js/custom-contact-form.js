jQuery(document).ready(function($) {
    $("#enquiry_form").submit(function(event) {

        event.preventDefault();
        
        var form = $(this);

        $.ajax({
            type: "POST",
            url: "<?php echo get_rest_url(null, 'v1/contact-form/submit'); ?>",
            data: form.serialize(),
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });

    });
});

