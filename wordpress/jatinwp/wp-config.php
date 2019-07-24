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
define( 'DB_NAME', 'jatinwp' );

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
define('AUTH_KEY',         '7!{/pMuI!Tb<LAIg.8@bnV7lt>}$-Yf{+t1)d;+GI&P~@piTq}o0mx++T]{M-qb;');
define('SECURE_AUTH_KEY',  ']1@d3P|(VIJiJ$Uq$C8w+fU|d)K)7<i![TEi|PV/3{stT+4+AquIrpf/?#KnQ|7 ');
define('LOGGED_IN_KEY',    '/*AnG8+.00G UmGZ9Tt[TWyq,Mj#?_Tp+gL/+_ `|sI7J})1z l72OafK[A?b!&V');
define('NONCE_KEY',        '&x,dWl3#yv4NYo7P/P}j=>2$Uu!)x/7MLbklY;7n|3f27Lm*;h}eC[~5Ux?RK/=c');
define('AUTH_SALT',        'g?)8*y(.I_!)NvF|lHz}h?WYH6H7!#s*^UWAe(P[#20j@~ch.{$+mw-E[N;Wnu.D');
define('SECURE_AUTH_SALT', 'elZR1x(l$U~ymb(.nD9zn=9U&_1MJ^^^)>d5&<!~ajJgai[C`GagUu|aQj+$-Hq0');
define('LOGGED_IN_SALT',   'A`eTU3k:j(Q-hYNEISOv^zdHgIg_JEjwA5?7-[7?xAJn:r+W#?3v-MObdwq8+3Xu');
define('NONCE_SALT',       '[sYmQN} )I*G*&NMVBoRWBUrps3!/V*U0syhEj/J[H6S7UK8DT*~2uNvX,^C7mcE');

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
