<?php

namespace Hasan\TroviaWpWordcount\WordCount;

class WordCount
{
    private AdminMenu $adminMenu;
    private Settings $settings;
    private SettingsPage $settingsPage;

    public function __construct()
    {
        $this->settingsPage = new SettingsPage();
        $this->adminMenu = new AdminMenu($this->settingsPage);
        $this->settings = new Settings();
    }

    public function init(): void
    {
        $this->adminMenu->register();
        $this->settings->register();
    }
}
