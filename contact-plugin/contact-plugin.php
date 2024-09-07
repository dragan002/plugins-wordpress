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
        public function __construct() {

            require_once(plugin_dir_path(__FILE__) . '/vendor/autoload.php');
        }
     }

     new ContactPlugin;

 }
