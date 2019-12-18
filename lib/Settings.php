<?php

namespace WebKinder\Toybox;

class Settings
{
  public function run()
  {
    add_action('init', [$this, 'setupOptionPage']);
  }

  public function getSetting($setting)
  {
    static $options;

    if ($options === null) {
      $defaults = [
        'wk_toybox_activate' => 'off',
        'wk_toybox_token' => '',
        'wk_toybox_show_only_for' => 'all',
      ];

      $default_options = get_option('wk_toybox_basic_options');

      $safe_default_options = wp_parse_args($default_options, $defaults);

      $options = $safe_default_options;
    }

    return $options[$setting];
  }

  public function setupOptionPage()
  {
    (new \WebKinder\SettingsAPI())
      ->set_sections(
        apply_filters('wk_toybox_settings_tab',
          [
            [
              'id' => 'wk_toybox_basic_options',
              'title' => __('Toybox Einstellungen', 'webkinder-toybox')
            ]
          ])
      )
      ->set_fields(
        apply_filters('wk_toybox_fields',
          [
            'wk_toybox_basic_options' => [
              [
                'name' => 'wk_toybox_activate',
                'label' => __('Aktiviere Toybox', 'webkinder-toybox'),
                'type' => 'checkbox',
              ],
              [
                'name' => 'wk_toybox_token',
                'label' => __('Toybox Token/ID', 'webkinder-toybox'),
                'type' => 'text',
              ],
              [
                'name' => 'wk_toybox_show_only_for',
                'label' => __('Nur für folgende Besucher anzeigen', 'webkinder-toybox'),
                'type' => 'select',
                'options' => [
                  'all' => __('Alle', 'webkinder-toybox'),
                  'logged_in' => __('Eingeloggte Benutzer', 'webkinder-toybox'),
                  'admin_only' => __('Administratoren', 'webkinder-toybox'),
                ]
              ],
            ]
          ]
        )
      )
      ->register_page('Toybox', 'Toybox', 'manage_options', 'webkinder-toybox')
      ->admin_init();
  }
}
