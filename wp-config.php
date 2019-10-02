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
define( 'DB_NAME', 'robotin' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         ']alQlw{ut/XNVoQ,OC/<e2U]e,sZ}XEA7yP=65vVUXt3z%r0(Kju%OlIpCL^A:tE' );
define( 'SECURE_AUTH_KEY',  ';yX3>Rv&F`>C48j4d-%y%iT* eVdvTH@VgPlcUX2#Ur8nkC:R8|||!&j57}CwkBP' );
define( 'LOGGED_IN_KEY',    'aO[(]FX`]-*usmMaMwoKkiu:@nIOPWk]WQ-2qI6aS0,<L5,}qJP*&Y%JVG00jMY/' );
define( 'NONCE_KEY',        'K`p5g)B5Nl,t<QqF#41l{]1WhSLzo74A^XV3xyu{abjY9xYl59kR6[F.VU9<#0pO' );
define( 'AUTH_SALT',        '}ZZJ0@F6z%Z))5=zF9,P_Y?b yXrpm]HZN^n;+TRBEp*[!wv>sX,Quu+o mYU;9G' );
define( 'SECURE_AUTH_SALT', 'qT~X;coQ*|:|J8@kiU+K2]h)Tj%jYb?:NCiGGM)H}_vG=/xA[=k>ecFoiZ%!>A:H' );
define( 'LOGGED_IN_SALT',   'Vc3U8nlCE]3Xaxt~MbJ*Gnhw85{ SsrHZ}n^_NSY:SX[_b^jM^:M(XLJw*vB?)nS' );
define( 'NONCE_SALT',       'g}ka0t,r3zdvF6an~;Ib2:}(Ykd ]#/6v`5(ZOueu8.envL#&l <X:lNaGu];z%(' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
