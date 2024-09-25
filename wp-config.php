<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wfcecorise' );

/** Database username */
define( 'DB_USER', 'wfcecorise' );

/** Database password */
define( 'DB_PASSWORD', '2qwFpKI6H2mJoll' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '#sv96Sk;(Y}#wjR]Yv:F$(IMn6Fk1:hL2Upa6&xoxF`sq ,&0x8llk$V3!6}5X!B' );
define( 'SECURE_AUTH_KEY',   '$|2R9lo*NLru^r!2J7T:!cc0{o+;kR.B2xzbZm&EYyK-)Wc@{Z3^Re pBI~k`&YQ' );
define( 'LOGGED_IN_KEY',     'rsai5k8ugl<06GbQ:gq`jv75a`Vy@JaPCmTu%)0u;5jOW_<7qx=^y9bLLrHe3U*c' );
define( 'NONCE_KEY',         '](|K7sMC3/@s+Y~lw7rM>!57MXlI_?P Czz)x}s?S-ZsK9.6Lsj{ YNi!.WZyAgK' );
define( 'AUTH_SALT',         '7sirkK!g$iBnJI!SMb{I|RzR$Z<6&o2b/NR^or6X8a,9xbu3xr92(mnF*KtXCR_>' );
define( 'SECURE_AUTH_SALT',  'jW+u6cHi6x-3VOFMaR!@y`,Lq ?UPwFmtr8qk#OJUdXav`DgM,u^4$A4,|[q3g=d' );
define( 'LOGGED_IN_SALT',    '<q;x/#2!>km{Su,aTU5ty;U-jte1@Q[KI9Q<LPU?-I~HW_`kY` Ymi&p!8J`[_5P' );
define( 'NONCE_SALT',        '[1:u~[Gu298u5]IHd`B@@^~}QN#0&$.jhSa-_n@0{meUn@%MwA1{lmB6xb&.c8>r' );
define( 'WP_CACHE_KEY_SALT', '>jVA6?Cs,14OXu]73O*}}hENh?Vb&)s:4%hfUg;VHItpA+r3kZ01VSh4YY]4?;e(' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpdb_';


define('WP_CACHE', true);
define('DISALLOW_FILE_EDIT', false);
define('DISALLOW_FILE_MODS', false);

/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
