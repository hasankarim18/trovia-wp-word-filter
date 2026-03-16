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

        add_action('plugins_loaded', [$this, 'plugins_loaded']);
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
