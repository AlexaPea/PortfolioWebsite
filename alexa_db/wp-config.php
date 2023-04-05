<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'alexa_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'sxf8yydK)}r%:?asj|6;3*&<*t0EG])/DBi|FglWOnBp3pHXY3&I%Or7@*bE7(Oc' );
define( 'SECURE_AUTH_KEY',  '2_M2<3!aTUSF87Xoch#k/rv?U}_y@N;WNc(O&GjTFo@(`1oba(D%QUp3ZGHH_sk4' );
define( 'LOGGED_IN_KEY',    'whGUJs)sF:&BwFN&D9WbzaF7Mjm0L($A,Xe.|Blgi8U8/W&E^m5SWrNdG.qsj9QG' );
define( 'NONCE_KEY',        '/wi1hdhy/N;IWj^Uhs1] =hf].5LM7Ks]K~T}<O-J:FRBgD}R2ag0th|)=f=u=Ew' );
define( 'AUTH_SALT',        'nb0]_6^Z%`-@JUz_C(f%HY:8 !byNjp8MH/J#/cAq$d< rqmgl/]kuTw,DuvLgD8' );
define( 'SECURE_AUTH_SALT', 'r_:px&)wse]$JG:r~=9H]pu|fP1bixK9=h(|d;;Bld(>kbz&2~zK>2~#uFX#G~!y' );
define( 'LOGGED_IN_SALT',   '5^Bj$5Alt/_2XQ1,`3dCd0q6C&-LsDL=,[ejM#{D>iGdrNGU^O[s$$27Dg+[qx`!' );
define( 'NONCE_SALT',       'BIM@jNzvrV>T<8`h5_O!y.]Rmtp/(Knk^_[}JwWk0$mmRg=L,Y t>(5`yP=z&s*-' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
