<?php
/*
Plugin Name: WebKinder Starter Plugin
Plugin URI: https://webkinder.ch/
Description: WebKinder Starter Plugin
Author: [Autor des Plugins] (support@webkinder.ch)
Version: 0.0.1
Author URI: https://webkinder.ch
Text Domain: wk-starter-plugin
Domain Path: /languages
 */

define('WK_STARTER_PLUGIN_DIR', dirname(__FILE__));

$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once($autoload);
}

(WebKinder\StarterPlugin\PluginFactory::create())->run();