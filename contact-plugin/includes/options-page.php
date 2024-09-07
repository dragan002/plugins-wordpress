<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'load_carbon_fields');

add_action('carbon_fields_register_fields', 'create_options_page');


function load_carbon_fields()
{
    if(class_exists('\Carbon_Fields\Carbon_Fields')) {
        error_log('Carbon Fields is loaded');
        \Carbon_Fields\Carbon_Fields::boot();
    } else {
        error_log('Carbon Fields is NOT loaded');
    }
}

function create_options_page()
{
Container::make( 'theme_options', __( 'Theme Options' ) )
    ->add_fields( array(
        Field::make( 'text', 'crb_facebook_url', __( 'Facebook URL' ) ),
        Field::make( 'textarea', 'crb_footer_text', __( 'Footer Text' ) )
    ) );
}
