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
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'C:\Users\jhall.US-39WFM72-10\Projects\Currents\deep-change\healing2017\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'healing');

/** MySQL database username */
define('DB_USER', 'deepchange');

/** MySQL database password */
define('DB_PASSWORD', 'dc2017');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tO}:$5Hl::n8:B{6fIQjO5P!>[t2D[)X4_[scIvB.M,^L]bp~vWPeu5|t{/uA/ka');
define('SECURE_AUTH_KEY',  'VsIY|:q[.!P TQkBx`[!!=3[^R{8I;xocu$4XI<{/nn1igN5?gLX7 g[,5&V;^Mr');
define('LOGGED_IN_KEY',    't=F6GmZ:uS`x]6WpwnjQ2tL#06!=ZO/h>GG[F|ht}k&5AwLl!CU:@Bq|d$b}H4!a');
define('NONCE_KEY',        '9U9Or&kg|t<=|d-(l8V}-$Ge:N]QZ3ZTn]3HW^0AK/$z.7-A_fs997N4f6Ge,WI{');
define('AUTH_SALT',        ']tU?XSHJyc2@PZ_+6E0gLIOfJ6U[NVcN8Y0BJ~de}x57uI==gzDNS<&Y{T5RUI3!');
define('SECURE_AUTH_SALT', 'rIaIme4s)&ag:IeK0H0yu5<R[S-QqWu{Z>LQvSEm>6zqo:Y=,Pl3i-^Ll=~SZ4[G');
define('LOGGED_IN_SALT',   'y,gfL8fb=KT| H8V4im32hUMd29m<$ko?$1SSC>0*c>SGuL~.Z_I&PDlMmX~7F8:');
define('NONCE_SALT',       'huV89ZeBD|STL:eyeb*a>wKF&l|c1T?/1|Qd]Oel:*HkJBg.<l@Dn{}U$8J%2Y38');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
