<?php
namespace Hasan\TroviaWpWordFilter\WordFilter;

if (!defined('ABSPATH')) {
    exit;
}

class FilterContent
{
    public function register()
    {
        add_filter('the_content', [$this, 'filterContent']);
    }


    public function filterContent($content)
    {
        $badWords = get_option('plugin_words_to_filter');
        $badWords = explode(',', $badWords);
        $badWrodsTrimed = array_map('trim', $badWords);
        $tobeFilteredWith = get_option('replacementText', '****');

        return str_ireplace($badWrodsTrimed, $tobeFilteredWith, $content);

    }
}

?>