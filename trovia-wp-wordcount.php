<?php

/*
    Plugin Name: Trovia wp wordcount
    Description: This is a simple plugin that does something Unique.
    Version: 1.0
    Author: Hasan Karim
    Author URI:
    License: GPL2 or later
*/
// namespace Hasan\OurFirstUniquePlugin;

if (!defined('ABSPATH')) {
    exit;
}





require_once __DIR__ . '/vendor/autoload.php';

use Hasan\TroviaWpWordcount\Main;

Main::instance()->init();






