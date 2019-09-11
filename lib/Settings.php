<?php

namespace WebKinder\Toybox;

class Settings
{
  public function run()
  {
    add_action('init', [$this, 'setupOptionPage']);
  }

  public function setupOptionPage()
  {
    (new \WebKinder\SettingsAPI())
      ->set_sections(
        apply_filters('wk_toybox_settings_tab',
        [
          [
            'id'    => 'wk_toybox_basic_options',
            'title' => __('Toybox Einstellungen', 'wk-toybox')
          ]
        ])
      )
      ->set_fields(
        apply_filters('wk_toybox_fields',
          [
            'wk_toybox_basic_options' => [
              [
                'name'    => 'wk_toybox_activate',
                'label'   => __('Aktiviere Toybox', 'wk-toybox'),
                'type'    => 'checkbox',
              ],
              [
                'name'    => 'wk_toybox_token',
                'label'   => __('Toybox Token/ID', 'wk-toybox'),
                'type'    => 'text',
              ],
            ]
          ]
        )
      )
      ->register_page('Toybox', 'Toybox', 'manage_options', 'wk_toybox')
      ->admin_init();
  }
}