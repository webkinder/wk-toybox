<?php
/**
 * Plugin Name: Toybox by Webkinder
 * Plugin URI: https://webkinder.ch/
 * Description: Plugin to integrate Toybox feedback system https://www.toyboxsystems.com in your website
 * Author: WebKinder
 * Version: 1.0.0
 * Author URI: https://webkinder.ch
 * Text Domain: wk-toybox
 * Domain Path: /languages
 */

define('WK_TOYBOX_DIR', dirname(__FILE__));

$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once($autoload);
}

$plugin = WebKinder\Toybox\PluginFactory::create();
$plugin->run();
