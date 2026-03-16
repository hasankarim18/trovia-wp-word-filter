<?php

namespace Hasan\TroviaWpWordcount\WordCount;

class IfWrap
{
    public function register()
    {

        add_filter('the_content', [$this, 'ifWrap']);
    }

    public function ifWrap($content) // <--- ACCEPT the variable
    {
        // Use the $content passed in, NOT get_the_content()
        if (
            is_single() && is_main_query() AND
            (
                get_option('wcp_enable_character_count', '1') OR
                get_option('wcp_show_word_count', '1') OR
                get_option('wcp_show_read_time', '1')
            )
        ) {
            return $this->createHTML($content);
        }

        return $content; // Pass it to the screen or next plugin
    }

    function createHTML($content)
    {

        $html = '<h3>' . esc_html(get_option('wcp_headline_text', 'Hello world!')) . '</h3><p>';
        // 
        if (get_option('wcp_show_word_count', '1') OR get_option('wcp_show_read_time', '1')) {
            $wordCount = str_word_count(strip_tags($content));
        }



        if (get_option('wcp_show_word_count', '1')) {
            $html = $html . '<p>' . esc_html(__('This post has:', 'TroviaWcpDomain')) . $wordCount . ' words. </p>';
        }
        if (get_option('wcp_enable_character_count', '1')) {
            $html = $html . '<p>' . esc_html(__('This post has:', 'TroviaWcpDomain')) . strlen(strip_tags($content)) . ' characters.</p>';
        }
        if (get_option('wcp_show_read_time', '1')) {
            $html = $html . '<p>Read time : ' . round($wordCount / 200) . ' miniute(s).</p>';
        }

        $html .= '</p>';



        if (get_option('wcp_location', '0') == '0') {
            return $html . $content;
        } else {
            return $content . $html;
        }
    }
}


?>