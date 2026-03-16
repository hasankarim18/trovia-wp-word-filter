<?php
namespace Hasan\TroviaWpWordFilter\App\Trait;
// namespace Hasan\TroviaWpWordcount\App\Trait;

if (!defined('ABSPATH')) {
    exit;
}

trait Singleton
{
    private static $instance = null;

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}
