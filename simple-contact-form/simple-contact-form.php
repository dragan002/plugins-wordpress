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
        // Enqueue Bootstrap CSS
        wp_enqueue_style( 'bootstrap-css',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css',
            array(),
            '4.5.2'
        );
    
        // Enqueue custom CSS
        wp_enqueue_style( 'simple_contact_form',
            plugin_dir_url( __FILE__ ) . 'css/simple-contact-form.css',
            array(),
            '1.0.0',
            'all'
        );
    
        // Enqueue Bootstrap JS
        wp_enqueue_script( 'bootstrap-js',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js',
            array('jquery'),
            '4.5.2',
            true
        );
    
        // Enqueue custom JS
        wp_enqueue_script( 'simple_contact_form',
            plugin_dir_url( __FILE__ ) . 'js/simple-contact-form.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }
    

    public function load_shortcode()
    {
        ?> 
        <div class="simple-contact-form">
            <h1>Send Us Email</h1>
            <p>Please fill the form </p>
            <form action="simple-contact-form form" >
                    <div class="form-group">
                        <input type="text" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="tel" placeholder="Phone" class="form-control">
                    </div>
        
                    <textarea name="" placeholder="Type your message" id=""></textarea>
                    <button class="btn btn-success btn-block">Send message</button>


                </form>
            </div>
        <?php
    }

}

new SimpleContactForm();
