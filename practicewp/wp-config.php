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
define( 'DB_NAME', 'practicejatin' );

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
define('AUTH_KEY',         'v$ E6W9VRXB&,C,F85yj1rl#EK.WGDLlpLR]sT{[g<;L4a*xui`Q)d=Zuo$]ac|,');
define('SECURE_AUTH_KEY',  '+Q0+g-*lnF*$&u4i$TXAdZG%,#|+*mnDqURoiyKd8I+`lRXWCQ>$TS9!U-A+.h-@');
define('LOGGED_IN_KEY',    'V[NSy4-5pYb!CH+WINkre/bYIf(|qf%{c7=Lt*-~0-&6!B5`+T(m0fGe-z2RF&Yr');
define('NONCE_KEY',        'Z_/)5C 0{96XiFE${P_ZFq:w0YMHo:HCav2,]b!:?/_*Z7]:z(f3Ao0_$/E[hZpw');
define('AUTH_SALT',        'u$`puC++1c}r,oX`0{$BkC[q,On.#di-dZXOFxTBGLGe[.3KY]a<sieY]WTL!S>|');
define('SECURE_AUTH_SALT', 'is(i-%lsJY+=w<2,q@.Hf{ftZmAo1(?JUIzg!A/|Eyjz_.YM0LS!P ?J;Et;7l^b');
define('LOGGED_IN_SALT',   '#ixUGyM|=9znOz7(GJYyiN68oZo>nz}/Z_B2;aUO/o9uHNq@ L>BS|MVhz/-(}m<');
define('NONCE_SALT',       'Zj!fx;1S5H.i~u]=Fp#*[3j>*U:wMOmd&5R1a(/ccdhUu&n_UlW!MUCpo;-MM|E>');
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
