# wk-toybox
Plugin für Toybox Integration

## Installation
### SSH:
```` bash
git clone git@github.com:webkinder/wk-starter-plugin.git [name-of-your-plugin]
cd [name-of-your-plugin]
composer install
````
### WordPress:
[Herunterlade das aktuellste Release](https://github.com/webkinder/wk-toybox/releases/download/0.1.0/wk-toybox.zip) und lade es hoch via WordPress Admin

## Building a WordPress Plugin
To create a WordPress Release .zip file run the following command
`composer run-script build`

## Unit Testing
- `bin/install-wp-tests.sh wordpress_test root '' localhost latest`
- `phpunit`

