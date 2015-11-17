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
define('DB_NAME', 'peloton_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '|WA> _<JLBf& 4ILQ:oMlxucB`Rn9$pLv!yt?H6@cN3GrC:;{|qJ4hS#7|T2QeV{');
define('SECURE_AUTH_KEY',  '9V)vEI_#sY?ck;2Zy+^i j1Y2 0X01I4_ 9M?&6bStsp+TpECBC4&g6i)`pV=t2L');
define('LOGGED_IN_KEY',    'aK14B83 k|O.~0F O%` .]TRL*<{t*jq7.}X&<;)i9hJchl|1ROtmM0+];qln9(r');
define('NONCE_KEY',        '/x>Bc]q-U%+ICu6-|2)0~I/gB+R<gAXE|RC9>wy|),`-;aRXqjc!pAULLGN()+<s');
define('AUTH_SALT',        'Zx/lW=6poNLGkL.]Pp[E?(e4ofn(5Yt!E-Aw@pt[XpnL7jqQ~PYNG$-,_ > Pyqb');
define('SECURE_AUTH_SALT', '|_s5|tuz;$*_AlgwU,PQ4A|M4+0uI^(dTeuW/C`A(s[yOX0O^C+-CG+RIVSO#/5I');
define('LOGGED_IN_SALT',   '/>d6@duEvM%`lO<AG/oYriQ0 r7kVgy%vYu&9yizG4xrr3m5Z%H_0G;*&[ ]4rIE');
define('NONCE_SALT',       'JK4Er9`hpW btx-jY)Qn|9?v(|wqZ8_3K[Xg0-di|0bnXz|!.:4ROq]qXWGfOp0C');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pt_';

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
