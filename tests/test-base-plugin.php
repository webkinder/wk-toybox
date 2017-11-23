<?php
/**
 * Class BasePluginTest
 *
 * @package Wk_Starter_Plugin
 */

/**
 * Sample test case.
 */
class BasePluginTest extends WP_UnitTestCase {
    function testPluginInstances()
    {
        $plugin = WebKinder\StarterPlugin\PluginFactory::create();
        $this->assertEquals($plugin, WebKinder\StarterPlugin\PluginFactory::create());
    }
}
