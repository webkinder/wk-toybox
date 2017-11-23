# wk-starter-plugin
Starter Plugin für neue Plugins

### Installation
```` bash
git clone git@github.com:webkinder/wk-starter-plugin.git
mv wk-starter-plugin [name-of-your-plugin]
cd [name-of-your-plugin]
composer install
````

### First steps
- Rename `wk-starter-plugin.php`
- Change autoloading namespace in `composer.json`
- Rename textdomain in `Plugin.php` and the main plugin file
- Rename namespaces in `Plugin.php` and `PluginFactory.php` according to your change in the composer file

### Unit Testing
- `bin/install-wp-tests.sh wordpress_test root '' localhost latest`
- `phpunit`