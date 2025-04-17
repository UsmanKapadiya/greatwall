<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', 'greatwall_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// ** Site URL Settings **
define( 'WP_HOME', 'http://localhost/greatwall/' );
define( 'WP_SITEURL', 'http://localhost/greatwall/' );

// ** HTTP Block External Requests (Enable Updates) **
define('WP_HTTP_BLOCK_EXTERNAL', false);
define('WP_ACCESSIBLE_HOSTS', 'api.wordpress.org,downloads.wordpress.org');

// ** Disable Automatic Updates if you prefer manual updates **
define('WP_AUTO_UPDATE_CORE', false); // Set to false if you prefer manual updates

// ** MySQL Authentication Keys and Salts **
define('AUTH_KEY', 'mRrWUUt943hGbdXZYNmVvbttieIkabFJUTQY5Ax9pfAZ8AgTvyTjuaNPwEQqYlK7');
define('SECURE_AUTH_KEY', '8RXMsWOHxsOdd0SjwrzDWUJMJLORYWofzaUU2xE1lUYWRen3yY9TrZKjDzHarChn');
define('LOGGED_IN_KEY', 'Lexgb1pYcVEwjmZ8OzLQ91gYJAMoagFdscZi9p0EqVwk8WZ0MUKYWNCoSuvz9U4S');
define('NONCE_KEY', 'UWah4OaSPD1hzaSYXut54BsertAnRoDvAs0UWJ7M5IJ3raFFJPkQyipIxndcwwsg');
define('AUTH_SALT', 'fsZ9u8SC2Ga6PzPZEseZSNdE9MdeCA3KbVSBVoEjxmJQP8mmTzcO5YVnPuTO7SzG');
define('SECURE_AUTH_SALT', '98oRL80m5Zo8N0xH3RfaNJCTDX35Hndcpp1nHdgiD4cLB1DUwhHM9eH2BAMsLVPs');
define('LOGGED_IN_SALT', 'PkzAL2s7iN1uLzVDUoIhfu6Y60t4bqgF63lW3QF26Zx51XALEUHkiHh4LB0QJukv');
define('NONCE_SALT', 'ZRDdFJFctZvMSo6hZbKUMrfAR0VsD8f60X5ArHiDCjDezaCjmLF5X4kvmeBFrQKN');

// ** File Permissions & Updates Configuration **
define('FS_METHOD', 'direct');
define('FS_CHMOD_DIR', 0755);
define('FS_CHMOD_FILE', 0644);
define('WP_TEMP_DIR', dirname(__FILE__) . '/wp-content/uploads');

// ** Disable Automatic Updater for Manual Updates **
define('AUTOMATIC_UPDATER_DISABLED', false); // Set to false for automatic updates

$table_prefix = 'greatwall_';

// ** Debugging Mode (Set to false on production) **
define('WP_DEBUG', false);

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
