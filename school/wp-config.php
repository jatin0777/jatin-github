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
define( 'DB_NAME', 'wp_school' );

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
define('AUTH_KEY',         'R30($Kmu5lVO5pFxR-:Sb1b-:|Y[HgU5ieIn+<w=dHc*vwa=BM+s8B!,vNy}s&[+');
define('SECURE_AUTH_KEY',  '-Ba=5@.dMU(Pz2.=gY>!#~cIL!Z(Zr,$+Q0:.t2S%>^Ix+:jm64QA&@n|k$*`<)p');
define('LOGGED_IN_KEY',    '$.<OiB.ZN=6-i<:p)#vU=-C@Mb+JfG!TD#Vy|`;9P_<ZK=?sjh]D1BKrK7b~8llt');
define('NONCE_KEY',        '|W$@mLdgLs@K[=$a2Q+z_BLjF;W|94NyHC=PfR~,BN*<(C$@E=E}dg!aeJFu*7@`');
define('AUTH_SALT',        '``nwoRW;<be{FztEL$6;@Ma|`-L.-HmD |YnVq6h/AG2rl-|74-wV2.mdgse7&0{');
define('SECURE_AUTH_SALT', 'U8v8O|s$7F^EJu#AhPVAY^Ta,[,DgYrg!2H3U]0>?Nh6g<GmK%]LROROh{:|XGVI');
define('LOGGED_IN_SALT',   '5_iEjiUt-VX$^t*Qz~t)|f|Y:+6r++NL-vU1[Hi<ccQIzPWUmz?qa?6`!mZbor:^');
define('NONCE_SALT',       '4 Whn=ukXee9o(va]R~eR&1|#QVrI3gC|(s0:.3lhb(6-yAJ(!9SbJdo!)zhB5=+');

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
