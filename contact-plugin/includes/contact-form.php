<?php


add_shortcode('contact', 'show_contact_form');

add_action('rest_api_init', 'create_rest_endpoint');

function show_contact_form()
{
    include MY_PLUGIN_PATH . 'includes/templates/contact-form-template.php';
}

function create_rest_endpoint() {

    register_rest_route('v1/contact-form', '/submit', array(
        'methods' => 'POST',
        'callback' => 'handle_enquiry'
    ));
}

http://localhost:10003/wp-json/v1/contact-form/submit


function handle_enquiry( $data ) {
    $params = $data->get_params();

    if( !wp_verify_nonce($params['_wpnonce'], 'wp_rest')) {
        
        return new WP_REST_Response('Message not sent', 422);
    }
}
