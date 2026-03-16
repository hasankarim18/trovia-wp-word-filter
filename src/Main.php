<?php

// TWWC => Trovia WP Wordcount

namespace Hasan\TroviaWpWordFilter;
use Hasan\TroviaWpWordFilter\App\Trait\Singleton;
use Hasan\TroviaWpWordFilter\WordFilter\WordFilter;

if (!defined('ABSPATH')) {
    exit;
}

class Main
{
    use Singleton;

    public $wordFilter;
    public function init()
    {
        $this->define_constance();

        add_action('plugins_loaded', [$this, 'plugins_loaded']);
    }

    public function define_constance()
    {
        define('TWF_PLUGIN_VERSION', '1.0.0');
        define('TWF_FIRST_UNIQUE_PLUGIN_AUTHOR', 'Hasan');

        define(
            'TWF_PLUGIN_URL',
            plugin_dir_url(dirname(__DIR__))
        );

        define(
            'TWF_PLUGIN_PATH',
            plugin_dir_path(dirname(__DIR__))
        );
    }

    public function plugins_loaded()
    {
        load_plugin_textdomain(
            'TroviaWpWordFilterDomain',
            false,
            dirname(plugin_basename(dirname(__FILE__))) . '/languages'
        );
        // load classes
        $this->load_classes();
    }

    private function load_classes()
    {
        $this->wordFilter = new WordFilter();
        $this->wordFilter->init();

    }
}
