<?php

namespace Hasan\TroviaWpWordFilter\WordFilter;

if (!defined('ABSPATH')) {
    exit;
}



class AdminMenuPage
{
    public function register()
    {
        add_action('admin_init', [$this, 'option_settings']);

    }


    public function handleForm()
    {
        //AND current_user_can('manage_options')
        if (isset($_POST['ourNonce'])) {
            if (wp_verify_nonce($_POST['ourNonce'], 'saveFilterWords')):
                update_option('plugin_words_to_filter', sanitize_text_field($_POST['plugin_words_to_filter']));
                ?>
                <div class="updated">
                    <p>Your filtered word were saved.</p>
                </div>

                <?php
            else:
                ?>
                <a href="<?php echo admin_url('admin.php?page=trovia-wp-word-filter'); ?>">Back to Word filter</a>
                <?php
                wp_die('Invalid nonce');
            endif;
        } else {
            ?>
            <a href="<?php echo admin_url('admin.php?page=trovia-wp-word-filter'); ?>">Back to Word filter</a>
            <?php
            wp_die('Nonce not set');

        }


    }

    public function word_filter_html()
    {
        if (current_user_can('manage_options')) {
            if (isset($_POST['justsubmitted']) && isset($_POST['submit']) && $_POST['justsubmitted'] == 'true') {
                $this->handleForm();
            }
        } else {
            wp_die('Form not submitted due to security reason.');
        }
        $file = __DIR__ . '/views/main-page.php';
        if (file_exists($file)) {
            include_once($file);

        }

    }

    public function option_settings()
    {
        add_settings_section(
            'replacement-text-section',
            null,
            function () {
                echo '<h1><u>Word Filter Options</u></h1>';
            },
            'trovia-wp-word-filter-settings'
        );
        register_setting('replacementFields', 'replacementText');
        add_settings_field('replacement-text', 'Filtered Text', array($this, 'replacementFieldHTML'), 'trovia-wp-word-filter-settings', 'replacement-text-section');
    }


    public function replacementFieldHTML()
    {
        ?>
        <input type="text" name="replacementText" value="<?php echo esc_attr(get_option('replacementText', '***')) ?>">
        <p class="description">Leave blank to simply remove the filtered words.</p>
        <?php

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