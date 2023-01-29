<?php
/**
 * Configuration overrides for WP_ENV === 'development'
 */

use Roots\WPConfig\Config;
use function Env\env;

//Config::define('SAVEQUERIES', true);
Config::define('WP_DEBUG', true);
Config::define('WP_DEBUG_DISPLAY', true);
Config::define('WP_DEBUG_LOG', env('WP_DEBUG_LOG') ?? true);
Config::define('WP_DISABLE_FATAL_ERROR_HANDLER', true);
//Config::define('SCRIPT_DEBUG', true);
Config::define('DISALLOW_INDEXING', true);

ini_set('display_errors', '1');

// Enable plugin and theme updates and installation from the admin
Config::define('DISALLOW_FILE_MODS', false);

Config::define('DISABLE_WP_CRON', true);

// TODO: common WP_ENVIRONMENT_TYPE support https://developer.wordpress.org/apis/wp-config-php/#wp-environment-type

Config::define('DISABLED_PLUGINS', [
    'redirection/redirection.php'
]);

Config::define('JETPACK_DEV_DEBUG', true);
Config::define('EMPTY_TRASH_DAYS', 0);
