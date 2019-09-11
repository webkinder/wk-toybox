<?php
/*
Plugin Name: WebKinder Toybox
Plugin URI: https://webkinder.ch/
Description: Plugin für Toybox Integration
Author: WebKinder (support@webkinder.ch)
Version: 0.0.1
Author URI: https://webkinder.ch
Text Domain: wk-toybox
Domain Path: /languages
 */

define('WK_TOYBOX_DIR', dirname(__FILE__));

$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once($autoload);
}

(WebKinder\Toybox\PluginFactory::create())->run();