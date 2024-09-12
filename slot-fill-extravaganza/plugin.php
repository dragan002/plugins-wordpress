<?php
/**
    * Plugin Name: Slot Fill Extravaganza
    * Description: All available slots
    * Requires at least: 5.8
    * Version: 7.0
    * License: GPL-2.0-or-later
    *
    * @package twitch-streams
*/

namespace Twitch;

function enqueue_block_editor_assets() {
    $index_assets = plugin_dir_path(__FILE__) . 'build/index.asset.php';

    if (file_exists($index_assets)) {
        $assets = require_once $index_assets;
        \wp_enqueue_script(
            'gutenber-slot-fill-system',
            plugin_dir_url(__FILE__) . 'build/index.js',
            $assets['dependencies'],
            $assets['version'],
            true
        );
    }
}

\add_action('enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_block_editor_assets');
