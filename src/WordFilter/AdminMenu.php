<?php


namespace Hasan\TroviaWpWordFilter\WordFilter;

if (!defined('ABSPATH')) {
    exit;
}

class AdminMenu
{

    private AdminMenuPage $adminMenuPage;
    public function __construct(AdminMenuPage $adminMenuPage)
    {
        $this->adminMenuPage = $adminMenuPage;
    }

    public function register()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
    }
    public function admin_menu()
    {
        add_menu_page(
            'Word Filter',
            'Word Filter',
            'manage_options',
            'trovia-wp-word-filter',
            [$this->adminMenuPage, 'word_filter_html'],
            'dashicons-star-filled',
            20
        );
        add_submenu_page(
            'trovia-wp-word-filter',
            'Word Filter Settings',
            'Word Filter Settings',
            'manage_options',
            'trovia-wp-word-filter-settings',
            [$this->adminMenuPage, 'word_filter_settings_html'],
        );

    }



}
