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
define( 'DB_NAME', 'ownweb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'X }`3pM=>{E#q$)u4T.=Ux$;kCtY5n:?wE+4/2zx@y9c_Z]-$dcLBDt|F$RLMbZX');
define('SECURE_AUTH_KEY',  'x[$b}q$E|l>Pt$UDIUveJy0n)%uwl8.PI+0K(HWJ(G=;/ c5IW6c)+Po4(6JWg}s');
define('LOGGED_IN_KEY',    'a6H:6!5Es$W,=Srd6<-|].9mHg|QCE#JCg-7Ulp4-;6DJd#cIl)]6lFE)&Rrj<)u');
define('NONCE_KEY',        'a[Mi+Lw#<hQPHmy yx#M5)~#[b9t>u>Z_7Y0i(qO#wsJx8CB,+/we&P+lC~]-O%u');
define('AUTH_SALT',        'Ti7|t!`*p7NFb<yqrjXEHNa7*PC+-oXfd&fBES<m0)-/.a4hd]*+xUNUVx<}ANfL');
define('SECURE_AUTH_SALT', 'ZET^al0MP^|Z6vX!b%+zD<.7J*Y6-/x ;.dq@/Kc-/V `3vVj@YXx OLJ%N;*M@j');
define('LOGGED_IN_SALT',   ')sNyRXvBSD+s,i>8xe?xykl$4-~c1BK(J]N)u!pg&=v7#<6E|Utc.>c:-DtcnSwx');
define('NONCE_SALT',       '}XVMB%p+_T>D}ZL3s5h]|f_}LvCDCJK~l_ f#Z-`ByV]k1ba0c@_Wc?el|Z:_,$n');
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
