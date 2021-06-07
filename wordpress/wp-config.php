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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'v3|RAeb3Ju.0&^umnDc;&Wj)}S2IKDR*S}emJkean*_E4;]|~([l?wmUkk;9wKtu' );
define( 'SECURE_AUTH_KEY',  'xvZvxs~`x%%{w@cRA_Y/oIr!09y~JV`B]t>t>WFi~c-.m|aebT&yXu{v;SZL3h9J' );
define( 'LOGGED_IN_KEY',    'u)>#A~s!^@Pm;MyLyAe8?4;FE(p :TClJ,R_PDKQZJXCQN+k=qKPYTQ>56/,tHm7' );
define( 'NONCE_KEY',        '?B_`4~jcK:{{<6D.MKr($?K]s_+`l]f-IThWmno,qV{,b1gDW/!0Ns4,a=U I@gG' );
define( 'AUTH_SALT',        'c%>2FomN,o1Ui6N{V9vH`.RFc8|81R|k,Bce>Oq. }9$S/7+!IQ!b.rBBxwd.nfq' );
define( 'SECURE_AUTH_SALT', ')Lh z|1B6i7|dZj+{mk[I%:Vp)pX4 k<wW7s^^g1<?OA=B5xNb9mUNt?$`VTOZUj' );
define( 'LOGGED_IN_SALT',   'bC.CLDYQm8Gwh{RBxk)L`nY@(#iQG8rJOJ@&J<p}_;8p=&YFLLq`c8es/VsdnjH<' );
define( 'NONCE_SALT',       'J[]ISCZs-lu-<]$xPBoMdD0UZbEv<hqj-Tc@P1LP}wy?GM5oZkIsxSynZX!SD2]w' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
