<?php

/**
 * Plugin Name: Simple Contact Form
 * Description: Simple contact form test
 * Author: Dragan Vujic
 * Version: 1.0.0
 * Text Domain: simple-contact-form
 */

// Prevent direct access
if(!defined('ABSPATH')) {
    exit('Direct access not allowed.');
}

class SimpleContactForm  {

    // Constructor to add hooks
    public function __construct()
    {
        add_action('init', array($this, 'create_custom_post_type'));
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));
        add_shortcode('contact-form', array($this, 'load_shortcode'));
    }

    // Create custom post type for contact form
    public function create_custom_post_type()
    {
        $args = array(
            'public'                => true,
            'has_archive'           => true,
            'supports'              => array('title'),
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability'            => 'manage_options',
            'labels' => array(
                'name'          => 'Contact Form',
                'singular_name' => 'Contact Form Entry'
            ),
            'menu_icon'         => 'dashicons-media-text'
        );

        register_post_type('simple_contact_form', $args);
    }

    // Load CSS and JS assets
    public function load_assets() {
        wp_enqueue_style( 'simple_contact_form',
            plugin_dir_url( __FILE__ ) . 'css/simple-contact-form.css',
            array(),
            '1.0.0', // Corrected version format
            'all'
        );

        wp_enqueue_script( 'simple_contact_form',
            plugin_dir_url( __FILE__ ) . 'js/simple-contact-form.js',
            array('jquery'),
            '1.0.0', // Corrected version format
            true
        );
    }

    public function load_shortcode()
    {
        return "hello shortcode";
    }

}

new SimpleContactForm();
