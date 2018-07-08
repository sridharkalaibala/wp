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
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'a0#1gY_d`p,F:vMid#G?`1/h)YBax9m[rJH@Ieks&Y%:|5X0~c{j}=b:BBW`M7LE');
define('SECURE_AUTH_KEY',  'yBUbdp>!l/lcwRV1R+iUO3mrorWq6x)f8+0!<[?YP}Mhkh@8YAv$#+lF_?2C3RX`');
define('LOGGED_IN_KEY',    '%HV#KzhJ8~3Y*bonxL&JEpgY_0n)Ts #kI$z 8aaLOmOk:y(j6#n2)bb^?0MmRiz');
define('NONCE_KEY',        '>&ox!}xbC%!20js?CgU_J;;O3|ZfqxJ#hFZs{P{7-kj3/Zm2as42vZse@9!(hjHR');
define('AUTH_SALT',        'C:U+~QE;9jTR*&>HjWnd$aIOhFiN+z[I;S9J?bnp3Lhodde6:62lk?9JcaLE6;Hf');
define('SECURE_AUTH_SALT', '^n[T{hV S^=ae&`OAAWTg)f|5pQCEb<UWSo-$AvN.DOT`KEo-ZIlYfS;Ue,GY0W?');
define('LOGGED_IN_SALT',   '5HcCuyVc],rAQhajFl/$,2YDJY2DeI7!Z:pM6t-H(^Nq{GpB2nf2T>.12]Kr=]>&');
define('NONCE_SALT',       'kl[b)wXU*V3[vqH+-EV`C^IKO$OB(pR|3%)a8kwS.A5E-vT0y/mK{sWSb{c{Xb@c');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
