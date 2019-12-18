<?php

namespace WebKinder\Toybox;

final class Plugin
{

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
    $output_script = false;
    if ($this->settings->getSetting('wk_toybox_show_only_for') === 'all') {
      $output_script = true;
    } elseif ($this->settings->getSetting('wk_toybox_show_only_for') === 'logged_in' && is_user_logged_in()) {
      $output_script = true;
    } elseif ($this->settings->getSetting('wk_toybox_show_only_for') === 'admin_only' && current_user_can('manage_options')) {
      $output_script = true;
    }
    return apply_filters('wk_show_toybox_script', $output_script);
  }
}
