<?php

namespace WebKinder\Toybox;

final class Plugin implements Activation
{

    /**
     * Registers a custom capability for usage
     *
     * @var string
     */
    private static $capability = 'user_can_view_toybox';

    /**
     * @var
     */
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
        if ($this->shouldOutputScript()) {
            $this->outputScript();
        }
    }

    public function outputScript()
    {
        ?>
        <!-- Toybox Code -->
        <script src="https://d16ahjtmf9d1au.cloudfront.net/inject.bundle.js" async data-id="ToyboxSnippet"
                data-token="<?php echo $this->settings->getSetting('wk_toybox_token'); ?>"></script>
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

    public static function activate()
    {
        $roles = get_editable_roles();
        foreach ($roles as $role_name => $role) {
            $role = get_role($role_name);

            if ($role->has_cap('edit_posts')) {
                $role->add_cap(self::$capability);
            }
        }
    }

    public static function deactivate()
    {
        $roles = get_editable_roles();
        foreach ($roles as $role_name => $role) {
            $role = get_role($role_name);
            $role->remove_cap(self::$capability);
        }
    }

    private function shouldOutputScript()
    {
        if (
            $this->settings->getSetting('wk_toybox_activate') !== 'off'
            && $this->settings->getSetting('wk_toybox_token') !== ''
            && $this->shouldOutputForUser()
        ) {
            return true;
        }

        return false;
    }

    private function shouldOutputForUser()
    {
        if ($this->settings->getSetting('wk_toybox_show_logged_in') === 'on') {
            return is_user_logged_in() && current_user_can(self::$capability);
        }
        return true;
    }
}
