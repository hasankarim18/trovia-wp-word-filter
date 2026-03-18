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
        $this->adminMenuPage->register();

    }



    public function admin_menu()
    {
        $mainPageHook = add_menu_page(
            'Word Filter',
            'Word Filter',
            'manage_options',
            'trovia-wp-word-filter',
            [$this->adminMenuPage, 'word_filter_html'],
            'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMCAyMEMxNS41MjI5IDIwIDIwIDE1LjUyMjkgMjAgMTBDMjAgNC40NzcxNCAxNS41MjI5IDAgMTAgMEM0LjQ3NzE0IDAgMCA0LjQ3NzE0IDAgMTBDMCAxNS41MjI5IDQuNDc3MTQgMjAgMTAgMjBaTTExLjk5IDcuNDQ2NjZMMTAuMDc4MSAxLjU2MjVMOC4xNjYyNiA3LjQ0NjY2SDEuOTc5MjhMNi45ODQ2NSAxMS4wODMzTDUuMDcyNzUgMTYuOTY3NEwxMC4wNzgxIDEzLjMzMDhMMTUuMDgzNSAxNi45Njc0TDEzLjE3MTYgMTEuMDgzM0wxOC4xNzcgNy40NDY2NkgxMS45OVoiIGZpbGw9IiNGRkRGOEQiLz4KPC9zdmc+Cg==',
            20
        );
        add_submenu_page(
            'trovia-wp-word-filter',
            'Word List',
            'Word List',
            'manage_options',
            'trovia-wp-word-filter',
            [$this->adminMenuPage, 'word_filter_html'],
        );
        add_submenu_page(
            'trovia-wp-word-filter',
            'Options',
            'Options',
            'manage_options',
            'trovia-wp-word-filter-settings',
            [$this->adminMenuPage, 'word_filter_options_html'],
        );

        // laod css 
        add_action("load-{$mainPageHook}", [$this, 'mainPageAssests']);

    }

    function mainPageAssests()
    {
        wp_enqueue_style('filterAdminCss', TWF_PLUGIN_URL . 'styles.css');

    }



}
