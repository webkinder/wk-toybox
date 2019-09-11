<?php
/*
Plugin Name: PLUGIN_NAME
Plugin URI: https://webkinder.ch/
Description: PLUGIN_DESCRIPTION
Author: PLUGIN_AUTHOR (support@webkinder.ch)
Version: 0.0.1
Author URI: https://webkinder.ch
Text Domain: wk-starter-plugin
Domain Path: /languages
 */

define('WK_TOYBOX_DIR', dirname(__FILE__));

$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once($autoload);
}

(WebKinder\Toybox\PluginFactory::create())->run();