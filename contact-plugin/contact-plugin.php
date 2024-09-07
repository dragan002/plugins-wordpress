<?php

/**
 * Plugin Name: Contact Plugin
 * Description: This is test plugin
 * Version: 1.0.0
 * Test Domain: Options-plugin
 */

 if(!defined('ABSPATH')) {
    die('You can not be here');
 };

 if(!class_exists('ContactPlugin'))
 {
     class ContactPlugin 
     {
        public function __construct()
        {
            define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));
            
            if (file_exists(MY_PLUGIN_PATH . '/vendor/autoload.php')) {
                require_once(MY_PLUGIN_PATH . '/vendor/autoload.php');
            }

        }
        
        public function initialize()
        {
            require_once( MY_PLUGIN_PATH . '/includes/utilities.php');

            require_once MY_PLUGIN_PATH . '/includes/options-page.php';
        }
     }

     $contactPLugin = new ContactPlugin;

     $contactPLugin->initialize();
 }
