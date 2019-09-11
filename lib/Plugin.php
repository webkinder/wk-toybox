<?php

namespace WebKinder\Toybox;

final class Plugin
{
    private $settings;
    /**
     * Execution function which is called after the class has been initialized.
     * This contains hook and filter assignments, etc.
     */
    public function run()
    {
        $this->settings = new Settings();
        $this->settings->run();
    }

    /**
     * Load translation files from the indicated directory.
     */
    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('wk-toybox', false, basename(dirname(__FILE__, 2)) . '/languages');
    }
}
