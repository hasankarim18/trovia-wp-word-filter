<?php

namespace Hasan\TroviaWpWordFilter\WordFilter;

if (!defined('ABSPATH')) {
    exit;
}

class AdminMenuPage
{
    public function word_filter_html()
    {
        ?>
        <div class="wrap">
            <h1>Trovia WP Word Filter</h1>
        </div>

        <?php

    }

    public function word_filter_settings_html()
    {
        ?>
        <div class="wrap">
            <h1>Options</h1>
        </div>

        <?php

    }
}

?>