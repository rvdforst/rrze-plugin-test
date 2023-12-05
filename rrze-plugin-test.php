<?php

/*
  Plugin Name: RRZE Plugin Test
  Plugin URI: https://github.com/rvdforst/rrze-plugin-test
  Version: 1.0.27
  Description: RRZE Plugin Test.
  Author: rvdforst
  Author URI: https://github.com/rvdforst
 */

if (!defined('ABSPATH')) {
    exit();
}

// Minimal erforderliche PHP-Version.
define('RRZE_PLUGIN_TEST_PHP_VERSION', '5.5');

// Minimal erforderliche WordPress-Version.
define('RRZE_PLUGIN_TEST_WP_VERSION', '4.6');

register_activation_hook(__FILE__, function () {
    $error = '';

    if (version_compare(PHP_VERSION, RRZE_PLUGIN_TEST_PHP_VERSION, '<')) {
        $error = sprintf(__('Ihre PHP-Version %s ist veraltet. Bitte aktualisieren Sie mindestens auf die PHP-Version %s.', 'rrze-plugin-test'), PHP_VERSION, RRZE_PLUGIN_TEST_PHP_VERSION);
    }

    if (version_compare($GLOBALS['wp_version'], RRZE_PLUGIN_TEST_WP_VERSION, '<')) {
        $error = sprintf(__('Ihre Wordpress-Version %s ist veraltet. Bitte aktualisieren Sie mindestens auf die Wordpress-Version %s.', 'rrze-plugin-test'), $GLOBALS['wp_version'], RRZE_PLUGIN_TEST_WP_VERSION);
    }

    // Wenn die Überprüfung fehlschlägt, dann wird das Plugin automatisch deaktiviert.
    if (!empty($error)) {
        deactivate_plugins(plugin_basename(__FILE__), FALSE, TRUE);
        wp_die($error);
    }
});

