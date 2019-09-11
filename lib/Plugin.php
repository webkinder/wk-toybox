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

        add_action('wp_head', [$this, 'renderScript']);
    }

    public function renderScript()
    {
        $defaults = [
            'wk_toybox_activate'    => false,
            'wk_toybox_token'       => false
        ];

        $default_options = get_option('wk_toybox_basic_options');

        $safe_default_options = wp_parse_args($default_options, $defaults);

        if ($safe_default_options['wk_toybox_activate'] && $safe_default_options['wk_toybox_activate'] !== 'off' && $safe_default_options['wk_toybox_token'] && $safe_default_options['wk_toybox_token'] !== '') {
            $this->outputScript($safe_default_options['wk_toybox_token']);
        }
    }

    public function outputScript($toybox_token)
    {
        ?>
        <!-- Toybox Code -->
        <script src="https://d16ahjtmf9d1au.cloudfront.net/inject.bundle.js" async data-id="ToyboxSnippet" data-token="<?php echo $toybox_token; ?>" ></script>
        <!-- End Toybox Code -->
        <?php
    }

    /**
     * Load translation files from the indicated directory.
     */
    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('wk-toybox', false, basename(dirname(__FILE__, 2)) . '/languages');
    }
}
