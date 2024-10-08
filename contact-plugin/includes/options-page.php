<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'load_carbon_fields');

add_action('carbon_fields_register_fields', 'create_options_page');

add_action('wp_enqueue_scripts', 'enqueue_jquery_for_form');


function load_carbon_fields()
{
    if (class_exists('\Carbon_Fields\Carbon_Fields')) {
        error_log('Carbon Fields is loaded');
        \Carbon_Fields\Carbon_Fields::boot();
    } else {
        error_log('Carbon Fields is NOT loaded');
    }
}

function enqueue_jquery_for_form() {
    // Enqueue jQuery (WordPress already includes it)
    wp_enqueue_script('jquery');

    // Add your custom script for the form
    wp_enqueue_script('custom-contact-form', plugin_dir_url(__FILE__) . '/js/custom-contact-form.js', array('jquery'), '1.0', true);
}

function create_options_page()
{
    Container::make('theme_options', __('Contact Form'))
        ->set_icon('dashicons-media-text')
        ->add_fields(array(

            Field::make('checkbox', 'contact_plugin_active', __('Active')),

            Field::make('text', 'contact_plugin_recipients', __('Recipients email'))
                ->set_attribute('placeholder', 'eg. youremail@gmail.com')
                ->set_help_text('The email that the form is submitted to')
                ->set_required(true)
                ->set_attribute('type', 'email'),

            Field::make('textarea', 'contact_plugin_message', __('confirmation message'))
                ->set_attribute('placeholder', 'Enter Confirmation Message')
                ->set_help_text('Type the message you want the submitter to recieve')
        ));
}
