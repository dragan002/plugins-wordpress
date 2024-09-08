jQuery(document).ready(function($) {
    $("#enquiry_form").submit(function(event) {
        event.preventDefault();
        alert('Form submitted successfully');
    });
});