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
define( 'DB_NAME', 'plugin' );

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
define('AUTH_KEY',         ':]=GXfnZ98@CQZla9H!1{!k3s}se?HYY7Z&=1: *)pht%_9TGqQM63#SmkUp}dGJ');
define('SECURE_AUTH_KEY',  'U!au5i;<#C]x`8+6mOtmSmgdB<e#v78)];=+=v&:xsi(h|(+~/6()7XQ|,$9~[A[');
define('LOGGED_IN_KEY',    'J{W1gwjH|BHD$(9(Y4HuzZE[O=jd7J-A&b1v7U(=iq{/|4sLz4ajSm=GW&pqq:+c');
define('NONCE_KEY',        '/tF~_9}~s9&H?rRz0m5/3j zDxS/QC=C@_n-K:&TO|M1eLBpXVG%;|Ed/<Wf#{U/');
define('AUTH_SALT',        ')q-hj.lF`oP?XBiFTN|*P8u|GZ.Kun#yed,I9y|7 t&KYF`gl]ZTzy+et~i~HB6S');
define('SECURE_AUTH_SALT', '1?6%I4-^r,;aJt5uP>#+TJWd+A[Ex2^PnJ}X |L}v]Ku2{C^)*_`2;+}tDJx}#|y');
define('LOGGED_IN_SALT',   'p;2tEvUP|NLy+5F>9$4BD;c+_03OcR*y*b0,VA~D#N3?RW81fhf!sR&OYo:S]Is3');
define('NONCE_SALT',       'bR,rNz7&G+0aVo>n262tgE]fXrTMVsZ$%%%wx06He|9jUO5:{BOU&f2.G)X?p%[h');
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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
