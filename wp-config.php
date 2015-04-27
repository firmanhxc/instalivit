<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'P-wwu[mo-Hs&|*x{qCAq;|9!i#^MqVr;zhwMjVziQ+t+DOC3SSA;tp}Ak~y&d}g=');
define('SECURE_AUTH_KEY',  'zOgp$!/6D<76~I!`aJhWq^4.^aq^.>xh3s:gK7-6N|hqHA5,@33J+:%!-V]{-?d-');
define('LOGGED_IN_KEY',    'Q-F-vFTwn+c,N|g~2:(B-Gw!`|: ]:F,``qf|x>4f -U+1~v1oLg.xJ=|-Y|HGp.');
define('NONCE_KEY',        '?BA8~wd`2>Zj+*#<<x.)|Z||ToZy)f`A,L=*L(=51fD(tuid0)8z~/>9&g=%W4r6');
define('AUTH_SALT',        'y)X[{C!JPs4CER5N7YMN]F%lp#ih *?2E1n4tu>+N4#[x@/NTgyKm6,]RsiZcuMr');
define('SECURE_AUTH_SALT', '9pgvPZ1Fm=zY?1SjP:}u={$8+i;)MwTZTnlsAQP|+5RReUvX{J:ELEV;(GAmwFUe');
define('LOGGED_IN_SALT',   '/ok[c#TZ}2OBxxoYje+o )0bl$Yic9NHnJXK5mz|6^HRi7Ag[pm.q.5f9YB]vu2T');
define('NONCE_SALT',       'gw977bm6g&BgzzY!O<3[dJ|We=Qf45,s]DQY+m8s9~|K[CA!&~/P5#z51h{.D/[u');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
