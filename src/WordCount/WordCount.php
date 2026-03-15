<?php

namespace Hasan\TroviaWpWordcount\WordCount;

class WordCount
{
    public function init()
    {
        $this->add_menu_page();

        add_action(
            'admin_init',
            [$this, 'settings']
        );
    }


    /*
  =========================
  MENU PAGE
  =========================
  */

    public function add_menu_page()
    {
        add_action(
            'admin_menu',
            function () {

                add_options_page(
                    'Word Count Settings',
                    'Word Count',
                    'manage_options',
                    'trovia-wordcount-settings',
                    [$this, 'settings_page_html']
                );

            }
        );
    }

    /*
    =========================
    SETTINGS API
    =========================
    */

    public function settings()
    {
        /**
         * #first Section
         */
        add_settings_section(
            'wcp_first_section',
            null,
            function () {
                echo '<h1><u>Word Count Settings</u></h1>';
            },
            'trovia-wordcount-settings'
        );
        // Location
        register_setting(
            'wordcountplugin',
            'wcp_location',
            [
                'sanitize_callback' => [$this, 'sanitize_location'],
                'default' => '0'
            ]
        );
        add_settings_field(
            'wcp_location',
            'Display Location',
            [$this, 'locationHTML'],
            'trovia-wordcount-settings',
            'wcp_first_section'
        );
        // #headline text
        register_setting(
            'wordcountplugin',
            'wcp_headline_text',
            [
                'sanitize_callback' => 'sanitize_text_field',
                'default' => 'Hello world!'
            ]
        );
        add_settings_field(
            'wcp_headline_text',
            'Headline Text',
            [$this, 'headlineTextHTML'],
            'trovia-wordcount-settings',
            'wcp_first_section'
        );
        // #show word count checkbox 
        register_setting(
            'wordcountplugin',
            'wcp_show_word_count',
            [
                'sanitize_callback' => [$this, 'sanitize_checkbox'],
                'default' => '1'
            ]
        );
        add_settings_field(
            'wcp_show_word_count',
            'Enable Word Count',
            [$this, 'showWordCountHTML'],
            'trovia-wordcount-settings',
            'wcp_first_section'
        );
        // #enable charecter count 
        register_setting(
            'wordcountplugin',
            'wcp_enable_character_count',
            [
                'sanitize_callback' => [$this, 'sanitize_checkbox'],
                'default' => '0'
            ]
        );
        add_settings_field(
            'wcp_enable_character_count',
            'Enable Character Count',
            [$this, 'enable_character_count_html'],
            'trovia-wordcount-settings',
            'wcp_first_section'
        );
        // #show charecter count 
        register_setting(
            'wordcountplugin',
            'wcp_show_read_time',
            [
                'sanitize_callback' => [$this, 'sanitize_checkbox'],
                'default' => '1'
            ]
        );
        add_settings_field(
            'wcp_show_read_time',
            'Show read time',
            [$this, 'show_read_time_html'],
            'trovia-wordcount-settings',
            'wcp_first_section'
        );
        /**
         * #second section
         */

        register_setting(
            'wordcountplugin',
            'wcp_admin_comment',
            [
                'sanitize_callback' => 'sanitize_text_field',
                'default' => 'Hello world!'
            ]
        );

        add_settings_section(
            'wcp_second_section',
            null,
            function () {
                echo '<h1><u>Admin Comment Settings</u></h1>';
            },
            'trovia-wordcount-settings'
        );
        add_settings_field(
            'wcp_admin_comment',
            'Admin Comment',
            [$this, 'adminCommentHTML'],
            'trovia-wordcount-settings',
            'wcp_second_section'
        );
    }

    /*
    ==================
    Custom sanitization
    ===================
    */

    function sanitize_location($input)
    {
        if ($input != 0 && $input != 1) {
            add_settings_error('wcp_location', 'wcp_location_error', 'Display loacation must be in withing begining or end');
            return get_option('wcp_location');
        }
        return $input;
    }

    function sanitize_checkbox($value)
    {
        return $value == '1' ? '1' : '0';
    }

    /*
    =========================
    FIELD HTML FIRST SECTION
    =========================
    */

    function show_read_time_html()
    {
        $value = get_option('wcp_show_read_time', '1');
        ?>
        <div>
            <input value="1" type="checkbox" name="wcp_show_read_time" <?php checked($value, '1'); ?>>
        </div>
        <?php
    }

    function enable_character_count_html()
    {
        $value = get_option('wcp_enable_character_count', '0');
        ?>
        <input value="1" type="checkbox" name="wcp_enable_character_count" <?php checked($value, '1'); ?>>
        <?php
    }

    public function locationHTML()
    {
        $value = get_option('wcp_location', '0');
        ?>

        <select name="wcp_location">

            <option value="0" <?php selected($value, '0'); ?>>
                Beginning of post
            </option>

            <option value="0" <?php selected($value, '1'); ?>>
                End of post
            </option>

        </select>

        <?php
    }

    public function headlineTextHTML()
    {
        $value = get_option('wcp_headline_text', 'Hello world!');
        ?>
        <div style="width: 600px;">
            <input style="width: 100%;display:block;" name="wcp_headline_text" type="text"
                value="<?php echo esc_attr($value); ?>">
        </div>
        <?php
    }

    function showWordCountHTML()
    {
        $value = get_option('wcp_show_word_count', '1');

        ?>
        <div>

            <input value="1" type="checkbox" name="wcp_show_word_count" <?php checked($value, '1'); ?>>
        </div>
        <?php
    }




    /*
 =========================
 FIELD HTML SECOND SECTION
 =========================
 */

    function adminCommentHTML()
    {
        $value = get_option('wcp_admin_comment', 'Hello world!');
        ?>
        <div style=" min-width: 600px;">
            <input style="width: 100%;display:block;" name="wcp_admin_comment" type="text"
                value="<?php echo esc_attr($value); ?>">
        </div>
        <?php
    }


    /*
    =========================
    SETTINGS PAGE HTML
    =========================
    */

    public function settings_page_html()
    {
        ?>

        <div class="wrap">
            <div style="display: flex; gap:30px;">
                <div>
                    <h1>Word Count Settings</h1>

                    <form action="options.php" method="POST">

                        <?php
                        settings_fields('wordcountplugin');

                        do_settings_sections(
                            'trovia-wordcount-settings'
                        );

                        submit_button();
                        ?>

                    </form>
                </div>
                <div>
                    <h1>
                        <?php $postion = get_option('wcp_location'); ?>
                        Location:
                        <?php
                        if ($postion == '0') {
                            echo 'Beginning of post';
                        } else {
                            echo 'End of post';
                        }
                        ?>
                    </h1>
                    <h2>
                        <?php
                        $adminComment = get_option('wcp_admin_comment', 'Hello world!');

                        ?>
                        Admin Comment:
                        <?php echo esc_html($adminComment); ?>
                    </h2>
                    <h2>
                        <?php
                        $wcp_show_word_count = get_option('wcp_show_word_count');

                        ?>
                        checkbox:
                        <?php echo esc_html($wcp_show_word_count); ?>
                    </h2>
                    <h2>
                        <?php
                        $wcp_enable_character_count = get_option('wcp_enable_character_count');

                        ?>
                        wcp_enable_character_count:
                        <?php echo esc_html($wcp_enable_character_count); ?>
                    </h2>
                    <h2>
                        <?php
                        $wcp_show_read_time = get_option('wcp_show_read_time');

                        ?>
                        wcp_show_read_time:
                        <?php echo esc_html($wcp_show_read_time); ?>
                    </h2>
                </div>
            </div>



        </div>

        <?php
    }
}