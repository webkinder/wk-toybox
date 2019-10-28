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
                'wk_toybox_activate'    => false,
                'wk_toybox_token'       => '',
                'wk_toybox_show_logged_in' => false
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
                            'title' => __('Toybox Einstellungen', 'wk-toybox')
                        ]
                    ])
            )
            ->set_fields(
                apply_filters('wk_toybox_fields',
                    [
                        'wk_toybox_basic_options' => [
                            [
                                'name' => 'wk_toybox_activate',
                                'label' => __('Aktiviere Toybox', 'wk-toybox'),
                                'type' => 'checkbox',
                            ],
                            [
                                'name' => 'wk_toybox_token',
                                'label' => __('Toybox Token/ID', 'wk-toybox'),
                                'type' => 'text',
                            ],
                            [
                                'name' => 'wk_toybox_show_logged_in',
                                'label' => __('Nur für eingeloggte Benutzer anzeigen', 'wk-toybox'),
                                'type' => 'checkbox',
                            ],
                        ]
                    ]
                )
            )
            ->register_page('Toybox', 'Toybox', 'manage_options', 'wk_toybox')
            ->admin_init();
    }
}