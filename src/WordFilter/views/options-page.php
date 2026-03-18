<div class="wrap">


    <form action="options.php" method="POST">
        <?php
        settings_errors();
        settings_fields('replacementFields');
        do_settings_sections('trovia-wp-word-filter-settings');
        submit_button();
        ?>
    </form>
</div>