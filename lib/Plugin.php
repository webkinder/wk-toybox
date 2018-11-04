<?php

namespace WebKinder\StarterPlugin;

final class Plugin
{
    /**
     * Execution function which is called after the class has been initialized.
     * This contains hook and filter assignments, etc.
     */
    public function run()
    {
    }

    /**
     * Load translation files from the indicated directory.
     */
    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('wk-starter-plugin', false, basename(dirname(__FILE__, 2)) . '/languages');
    }
}
