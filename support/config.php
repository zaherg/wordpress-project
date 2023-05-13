<?php

require_once dirname(__DIR__) . '/bootstrap.php';

// Load .env file
$env = Dotenv\Dotenv::createMutable(dirname(__DIR__));
$env->load();

$env->required(['DB_HOST', 'DB_NAME', 'DB_USER']);

// Salts
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));

// Database
define('DB_NAME', env('DB_NAME', 'wordpress'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASSWORD', env('DB_PASSWORD', ''));
define('DB_HOST', env('DB_HOST', 'localhost'));

// Development
define('SAVEQUERIES', env('SAVEQUERIES', env('APP_ENV') !== 'production'));
define('WP_DEBUG', env('WP_DEBUG',  env('APP_ENV') !== 'production'));
define('WP_DEBUG_DISPLAY', env('WP_DEBUG_DISPLAY',env('APP_ENV') !== 'production'));
define('SCRIPT_DEBUG', env('SCRIPT_DEBUG', env('APP_ENV') !== 'production'));
define('GRAPHQL_DEBUG', env('GRAPHQL_DEBUG', env('APP_ENV') !== 'production'));
define('WP_DEBUG_LOG', env('WP_DEBUG_LOG', dirname(__DIR__)  . '/storage/logs/wp-errors.log'));

// WP
$table_prefix = env('DB_PREFIX', 'wp_');
define('WP_HOME', env('WP_HOME', 'http://localhost'));
define('WP_SITEURL', env('WP_SITEURL', 'http://localhost/wp'));
define('CONTENT_DIR', 'content');
define('WP_CONTENT_FOLDERNAME', 'content');
define('WP_CONTENT_DIR', dirname(__DIR__) . '/public/' . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . '/' . CONTENT_DIR);

define('DISALLOW_FILE_EDIT', env('DISALLOW_FILE_EDIT', true));
define('ALLOW_UNFILTERED_UPLOADS', env('ALLOW_UNFILTERED_UPLOADS', true));
