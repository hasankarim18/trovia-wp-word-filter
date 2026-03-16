<?php

/*
    Plugin Name: Trovia wp word filter
    Description: This is a simple word filter plugin for WordPress.
    Author: Hasan 
    Version: 1.0
    Author: Hasan 
    Author URI:
    License: GPL2 or later
    Text Domain: TroviaWpWordFilterDomain
    Domain Path: /languages
*/
// namespace Hasan\OurFirstUniquePlugin;


if (!defined('ABSPATH')) {
    exit;
}

define('TWF_PLUGIN_VERSION', '1.0.0');
define('TWF_FIRST_UNIQUE_PLUGIN_AUTHOR', 'Hasan');

define(
    'TWF_PLUGIN_URL',
    plugin_dir_url(__FILE__)
);

define(
    'TWF_PLUGIN_PATH',
    plugin_dir_path(__FILE__)
);

require_once __DIR__ . '/vendor/autoload.php';

use Hasan\TroviaWpWordFilter\Main;

Main::instance()->init();






