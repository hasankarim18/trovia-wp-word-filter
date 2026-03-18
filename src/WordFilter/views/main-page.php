<div class="wrap">
    <h1>Word Filter</h1>
    <?php
    echo admin_url('admin.php?page=trovia-wp-word-filter');

    ?>
    <form method="POST">
        <input type="hidden" name="justsubmitted" value="true">

        <?php wp_nonce_field('saveFilterWords', 'ourNonce') ?>
        <label for="plugin_words_to_filter">
            <p><?php esc_html(__('Enter a comma separated list of words to filter from your site\'s content')) ?></p>
            <div class="word-filter__flex-container">
                <textarea name="plugin_words_to_filter" id="plugin_words_to_filter"
                    placeholder="bad,mean, awful, horrible">
                    <?php echo esc_textarea(get_option('plugin_words_to_filter')); ?>
                </textarea>
            </div>
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </label>
    </form>

</div>