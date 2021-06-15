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
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Hoanganh11k' );

/** MySQL hostname */
define( 'DB_HOST', '13.67.33.202' );

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
define( 'AUTH_KEY',         ') &Xz0h*}A8iqj3A4PYeq&fVv4IG&`^$!..~gPtC-q5(*@Oelq,^-(Ms{6T3=f};' );
define( 'SECURE_AUTH_KEY',  'x)&oY%N~F`-S<5&S^<`zq>=6?S69Gi/oA-HGEuQ38nFF>&B/gsvCzP<TJ.~FvLb3' );
define( 'LOGGED_IN_KEY',    'YX.==XW)~o`,gUGINv%~$nUR,DUxDK%#B2T|QH4mYa9R*VlWx{4MGxy3qllKZB2#' );
define( 'NONCE_KEY',        'lCKi!0tkjgs14;>Hq+ga/Uzy&d^^(4C_5s{jA@|JF+f9uKD@;Y>:!p=.`%#])t/}' );
define( 'AUTH_SALT',        'o5F]10gCn=n]6H8++D7$(61]Xts^>E5pB8&Tu^s@edd*GI46*vbJb7)83eraJO/C' );
define( 'SECURE_AUTH_SALT', 'gP$!#kCU:DOM6b):<@w{RyR+;N%^5=v3Vi*=]^V$68A96!kwO,CkD?<-9-*:U+j ' );
define( 'LOGGED_IN_SALT',   '8K1Z^`hSu]7@g|H&5`r]lF&Sm*0,z]Ld~$e;=^dLC1R,|4)Fj6|WF= x>hwBDaHv' );
define( 'NONCE_SALT',       '%iz|;g;?Hk6ax0=KsR~Td`E(n Lg KDE1^:*obZ]Y8^7Eoz`<w{{7s-TK@SDMS9A' );

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
