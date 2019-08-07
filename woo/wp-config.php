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
define( 'DB_NAME', 'woo' );

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
define('FS_METHOD','direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G![>u$B)LD+>+$~?`l?<fxiX${wuB6Z21B#WI|h}j^@+_h{&G5;VD%l-@X73-MZM');
define('SECURE_AUTH_KEY',  '7~{Am9p%25|fK.|-h~IY|lD,TV1MoQ|1_$;v%bYuI 2xe@xCn)eBEv+cR+/MJ9Q)');
define('LOGGED_IN_KEY',    'V+wTh&~LR#]WA2eOE-Z=XQr<W [qUjg8v`&^x>B0o^@1/.J:|vB=:Kfv/<;eT?BK');
define('NONCE_KEY',        '2-Q6N?R|&95y55 -CBoMqdI OX:8a=m3s6~d$8PG../urk(~8}~?sF`3xpRZTQc#');
define('AUTH_SALT',        'a*}2xun%!r/4h%bau-z-G` rMu?-iz<2a;~8[;xI=E{P_Os2t(*xsoW7&IUH)D6%');
define('SECURE_AUTH_SALT', '3@r7Y{Eo>:xN9.0+L6Eb Oa^&z ?ZU%.bo4)ZYX|W*Gk0I QhWWA9zZdSL ug|ja');
define('LOGGED_IN_SALT',   'gcQpynkCZZ->s jupJYTS _o{;MKpRs{=8.9V-97cj/|[RP/~`Rrp]T9Xgd]jz64');
define('NONCE_SALT',       '9|,lk({Lk2Ue/a-d%sL/JK}>NIt|<L$M?S_.]Fe<MH|>!bXt:}29X-WE]<nh)pWM');

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
