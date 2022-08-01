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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'douvita' );

/** Database username */
define( 'DB_USER', 'forge' );

/** Database password */
define( 'DB_PASSWORD', 'bHioKupqxE7ndkroMpuk' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '+G3e`Tl6;*C}+.ZV#DEe]fO)-WzDi~28@|A03ysggh3JnZ;P7~l>xJ3v#f;P_tH(' );
define( 'SECURE_AUTH_KEY',   '9,LYb%1V-,^lml!A.ul)Rt)3AK)BS#~(PbOwLX?/**lCf$[qW!8j-ZTxJ9$MN->8' );
define( 'LOGGED_IN_KEY',     'bluc]KEFrgB(b(zB&,VF6z/`o$%P_3{`jS$+k&AlccFO%M!he|)kn$zx+A&ghvNR' );
define( 'NONCE_KEY',         'mjM*_eeI7SPwKgb!>}?KVc%t.@ hN9TBj~VeUimAfj%eQc5Mi@|E)NjTv}^/;@G*' );
define( 'AUTH_SALT',         'O9un#GAo%KOWb#IkR$v.%)]I_KNMj52G3&e5-UW|jm=yPob3Ek^)?BvAWq//?$@9' );
define( 'SECURE_AUTH_SALT',  'oQy.w,WC#+nNQ%F^wbz.r7KviX*iCCc5=+@r^r{vc.9t3U*hAKcayX{D0ccM(aj&' );
define( 'LOGGED_IN_SALT',    'EWAH+XHV$;s/|5[DROE7)#8uCZnp;`[W3[a I)f 9G.QkA2fX<TSa9j`GSlZ:jf`' );
define( 'NONCE_SALT',        'So3?Lkf?Y}R5UQWXvR;~1m${P$Stkg$FEil^f.ZmhRoI7B-qPr+wg3uknD R8K$-' );
define( 'WP_CACHE_KEY_SALT', 'm%?#+8vy0{(ajBA^Za}c0vL>q|;mK8<PGprskJYMJ7i}Xf+,LS0!s6 Ua}~C)$un' );


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
