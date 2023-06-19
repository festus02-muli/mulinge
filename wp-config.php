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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mulingeportfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'u*BG6Yu}93Y^k(0s-?s}-BV/Y6Z}})a.y)[=N:a*{9E80W7_PC|j8j`euWjdo;k?' );
define( 'SECURE_AUTH_KEY',  'Jo{K)uDOdoAmEbq;N4kW(0FkNUcDd2P7v5KaiI0qyXZ^f ^0tPP[f#=F@C%DzQeS' );
define( 'LOGGED_IN_KEY',    'fA`6T(79J:m(`oIBie?7g|6 #q=>(l[>TGmAdaKQB^p]Nr<CEH3rXb+wKE4>eP?2' );
define( 'NONCE_KEY',        '=TWw9V8=-W; 9ZfD5xic.<4:51.*knh5}ls~ }BnZfkPjqnP{6CpOL/%7f!n.]ws' );
define( 'AUTH_SALT',        'PE}u$0ht{;X34>N0jr@S_<qF<3;[N[n_$Sz/P vnyQntm<DiGDFO7t>TL/S[jU!q' );
define( 'SECURE_AUTH_SALT', 'Jf6bd>OOHz/3_j5!T-fVsNW=60g/k!h`_YlJE+#]vc[9*sY~XVw,*vYOEYn%[b:3' );
define( 'LOGGED_IN_SALT',   '&;d|3!~x~ZCh;U7:]Up$pL5qKz$@PSz6Hp~{zFgASy{=R=L6aLHnU^Vjd.HCxn{Y' );
define( 'NONCE_SALT',       '7BO*s5{( {eZ[No)O9#@N!DBS]:bXk$5RY{ 5gI^RA$8_9}Sd4Wbj]+9&i#:$e|G' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
