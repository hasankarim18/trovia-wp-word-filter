<?php

namespace Hasan\TroviaWpWordFilter\WordFilter;

if (!defined('ABSPATH')) {
    exit;
}

class AdminMenuPage
{
    public function word_filter_html()
    {
        $file = __DIR__ . '/views/main-page.php';

        if (file_exists($file)) {
            include_once($file);
            ;
        }

    }

    public function word_filter_options_html()
    {
        $file = __DIR__ . '/views/options-page.php';

        if (file_exists($file)) {
            include_once($file);
            ;
        }

    }
}

?>