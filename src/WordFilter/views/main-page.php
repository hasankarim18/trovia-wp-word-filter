<div class="wrap">
    <h1>Word Filter</h1>
    <form method="POST">
        <label for="plugin_words_to_filter">
            <p><?php esc_html(__('Enter a comma separated list of words to filter from your site\'s content')) ?></p>
            <div class="word-filter__flex-container">
                <textarea name="plugin_words_to_filter" id="plugin_words_to_filter"
                    placeholder="bad,mean, awful, horrible"></textarea>
            </div>
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </label>
    </form>

</div>