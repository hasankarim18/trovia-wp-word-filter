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



require_once __DIR__ . '/vendor/autoload.php';

use Hasan\TroviaWpWordFilter\Main;

Main::instance()->init();






