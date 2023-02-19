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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sourcegoc' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Q?| BzU}.7c*g(C0%K-Ox6pJPj}klvq&It3(l Eo~f%Q+l)P4Lyj1n]wM9T3/vYJ' );
define( 'SECURE_AUTH_KEY',  'a7@(y !.Wzm$J&hwAk.)l4pf2cb^#4RMO%W9T9*k*a c^!eKu@]h)Rx%WJJS* Mq' );
define( 'LOGGED_IN_KEY',    'cT17il|O D8!l;6YyCUmt]l^g-R79<W$Y7:F.#M;QcXwR:?s,Mu9pqOTW/9LmtAn' );
define( 'NONCE_KEY',        'g!sJHj^MEAA_M-dk$WmnJfh}BH%k*<_7RA3]:m1~Z&2GTzjxL[Nl`B^g2wy]{4!}' );
define( 'AUTH_SALT',        '`ItzfB!XDe0A#QmpZj[cOC42z$_h@)1a]8T-FDjJ qQ^@]0m,{U%/k6)ew8`.y@U' );
define( 'SECURE_AUTH_SALT', '#RE;K7rOQXzF?bH{m~%<FgoY6tB$IUb=YB-{2UjoD`Zc?Av2K?846]`KJrWn~wO|' );
define( 'LOGGED_IN_SALT',   '`O|,Vs^}>xCW8+K`n@.07P1i8p6`IiWRtSb>r_`5koL>yVYAD&q8qxgn.x-KqgGN' );
define( 'NONCE_SALT',       '_rg@EGo=z( (9bbjyK+`{MMI~$d}Z`95 hM:;60hCA%/gns4qn?=~L{b?BS  %n]' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
/*** FTP login settings ***/
define("FTP_HOST", "localhost");
define("FTP_USER", "ftp-user");
define("FTP_PASS", "ftp-password");
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
