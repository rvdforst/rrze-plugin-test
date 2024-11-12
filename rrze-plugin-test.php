<?php

/*
Plugin Name:        RRZE Plugin Test
Plugin URI:         https://github.com/rvdforst/rrze-plugin-test
Version:            1.3.13
Description:        RRZE Plugin Test.
Author:             R.v.d. Forst
Author URI:         https://gitlab.rrze.fau.de/rvdforst
License:            GNU General Public License v2
License URI:        http://www.gnu.org/licenses/gpl-2.0.html
Text Domain:        rrze-plugin-test
Domain Path:        /languages
Requires at least:  6.6
Requires PHP:       8.2
Update URI:         https://github.com/rvdforst/rrze-plugin-test
*/

if (!defined('ABSPATH')) {
    exit();
}

// Minimum required PHP version.
define('RRZE_PLUGIN_TEST_PHP_VERSION', '8.2');

// Minimum required WordPress version.
define('RRZE_PLUGIN_TEST_WP_VERSION', '6.6');

register_activation_hook(__FILE__, function () {
    $error = '';

    if (version_compare(PHP_VERSION, RRZE_PLUGIN_TEST_PHP_VERSION, '<')) {
        $error = sprintf(__('Your PHP version %s is out of date. Please upgrade to at least PHP version %s.', 'rrze-plugin-test'), PHP_VERSION, RRZE_PLUGIN_TEST_PHP_VERSION);
    }

    if (version_compare($GLOBALS['wp_version'], RRZE_PLUGIN_TEST_WP_VERSION, '<')) {
        $error = sprintf(__('Your Wordpress version %s is out of date. Please upgrade to at least Wordpress version %s.', 'rrze-plugin-test'), $GLOBALS['wp_version'], RRZE_PLUGIN_TEST_WP_VERSION);
    }

    // If the verification fails, the plugin will be automatically deactivated.
    if (!empty($error)) {
        deactivate_plugins(plugin_basename(__FILE__), FALSE, TRUE);
        wp_die($error);
    }
});

