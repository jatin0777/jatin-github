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
define( 'DB_NAME', 'wpfinal' );

define('WP_HOME', 'http://localhost/jatin/wp-final');
define('WP_SITEURL', 'http://localhost/jatin/wp-final');


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

define('AUTH_KEY',         '. r:rtdm%QG?C2;6y*~1>VQ|rP`K9v.VNB[*Nb`Yh86UNA;q9@!ePgNE!.(Kzwbx');
define('SECURE_AUTH_KEY',  '6M]7>DBo<*^2!rU6jC{BB]|4.Scv,Tl~h+iXml72(158`8!xNenyYJ59MH&#7Ly<');
define('LOGGED_IN_KEY',    '+G|MC3%$h9AgKh C4Ac5Dp@cT)&|&Uk#`>g^TmtabjJ5JcW]9UGNc5.A-O}6jPmF');
define('NONCE_KEY',        'qJ:1/q=v{TVzM#%|)qTQ<gU|%6}Zk+8/_->gM<{2Z|T|<V:Q-=K|MPOouq-,SM+3');
define('AUTH_SALT',        '4Nxxp!b*X|+lF7G#2JfeEg5%;0iNFi|@y=QY6-[ o^T++iDK!u+c{}z-iG~Ezb^O');
define('SECURE_AUTH_SALT', 'yITc2u@3{G<!!7O>(3*,#-;9_H)EG%tJItny/:C:^D765PD j_y@B{X)#sBH>@{J');
define('LOGGED_IN_SALT',   '<g2r`8L|[5|dx9DZ~puUNvQU1pb2.Ei=].*~B;Yt#cAT<>~zK?fM`4+vK{z|ieh9');
define('NONCE_SALT',       '9+bGJb{J1]FxqC2tWy|.20srZ{II(/FWm>$W|SEJy%Sx6,_;.QZ+N^y=9[%b|{]W');


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
