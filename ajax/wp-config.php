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
define( 'DB_NAME', 'ajaxwp' );

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
define('AUTH_KEY',         't#%pNG6]_asmFJH898`2,BWYc2kVTLRE3bNI>K-tV||LRa1RB{ _zJbk9*0TQ3I9');
define('SECURE_AUTH_KEY',  'b%GxJ4c]OvK?/d_2M86L=k8X*+i-ib4M,-gJ+VN!qggs,+Z^<at1(aVRS;e@+<bx');
define('LOGGED_IN_KEY',    ')HrduJsmv$h1F,/-nTJ/+SoRSt0+gYNBL>v*jL@CC~?6J]O]/qY< UrJK#Pi`uL_');
define('NONCE_KEY',        'W:)?LQj]QEtG[,w4W;vLBsERK#/X4ZM?J_RrX|#N@Y]{+(g1JC)DFh+p[!5FmOrv');
define('AUTH_SALT',        'IthS*:y^^S?]>F})}h^S2G{I_G]TO`APo<w2ZYxVFs-M@t<`Ue%<1+gmH(TsC|+5');
define('SECURE_AUTH_SALT', ',^u^BdPze$![c-i,fIWLj(Iz#gA@7,el2d^OZ2sn_KdTB_^,pDE&.|7C#g{}+m4_');
define('LOGGED_IN_SALT',   '0gV3jXl(T+#>8<#e,Gt^x7$7fIx1mgzk.X$E)L1ujvwQq]|wm{|>tF,Z*{P+_uNN');
define('NONCE_SALT',       '|0{C[>kQOnP>)<sh[6}5X#wYzTw)sX[|q6gZEB/epz?N,.l, [~.#GGME21e<lwm');
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
