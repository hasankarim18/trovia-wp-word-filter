<?php

namespace Hasan\TroviaWpWordFilter\WordFilter;

if (!defined('ABSPATH')) {
    exit;
}

class WordFilter
{
    private AdminMenu $adminMenu;
    private AdminMenuPage $adminMenuPage;
    public function __construct()
    {
        $this->adminMenuPage = new AdminMenuPage();
        $this->adminMenu = new AdminMenu($this->adminMenuPage);
    }

    public function init()
    {
        add_action('init', [$this, 'load_classes']);
    }

    public function load_classes()
    {

        $this->adminMenu->register();
    }



}
?>