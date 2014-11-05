<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'batak');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', '');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Ds7WufJsS=; c86}rfIjh5z9U<Q`soJ/SQO(GU%cW#&zd89+mgJNOh#,QqHb^!:f');
define('SECURE_AUTH_KEY',  'Z^([-1YzUJTp`Ow)i5i4d|ny9,NDKVM~K6r=l9k64ZQl_lARd|VDG)i$ih|Jn@xv');
define('LOGGED_IN_KEY',    'SR-E^Yp{6K9B=`lz&$`:-PPN0W`0MASIj8Fodn+yqZi))/Se/gm3eGy{N/Wj8Q@|');
define('NONCE_KEY',        '-DmCag@pOhkncmZ|?oSt3eqA.|`}^+f|6[qws[dw?Z^Tbp+Xdg77M{2}7+[Dn4]|');
define('AUTH_SALT',        '-88a:=/6:_;vB<U|n.z-@+IK*+Nh1hrY<D(L;-Q`nqA@v|!ij/Yw50t1}am&l~sY');
define('SECURE_AUTH_SALT', '-Mc-zV$Q@DK,jpD.#)n?DOu^jLk-mx~Yk5+@O0raD*~2hTT7s3LU{0ag@*rQ]7uN');
define('LOGGED_IN_SALT',   'e f@j}k$lD$+2C>J4/H,D`b2/woDNrfg^)X:HfwH0P@&SA/pw`mUfNNb^-gIj1N3');
define('NONCE_SALT',       'vpQt<~XVLSk5VnoZAgt8YMLQo~4=esCoa|~hpn9rdHk;&%jh-;qi-49dv!YlY5%y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'btk_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/cms');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . '');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
