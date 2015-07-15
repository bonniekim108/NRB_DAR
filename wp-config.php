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
define('DB_NAME', 'DAR_16');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Orbit108');

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
define('AUTH_KEY',         '1}?*SSV%UK)uk#i. {|5igg E~K<Xa u.aR7PoM[H`WSc^+V|qc&cdD+cx?E!6xM');
define('SECURE_AUTH_KEY',  '41LJF8;%Z8*x(bl-C-g%{uX5Z3[?_Du|Vrjia+jMN$qY~kjLDeT8-Ew^e+,S~*Ed');
define('LOGGED_IN_KEY',    '42({MRl8=QV_QvT$=d-_G^I$=f:6T=j<qxk:{[OCirfc6-?}?}_>U?bo8Nw[8D<B');
define('NONCE_KEY',        '5EwNjDF>$`F|j|8.a0b8Gy,eK0z}8Vy#-p-D^/~CBO)&8-k:uo?cD^k7147sbEJI');
define('AUTH_SALT',        'vu$O.E,{C]x-5[R7S@8RqZ7Z+vj+)M4_uyDBz7=#]H0DSQ*.]9$8dVVL 86P UZ|');
define('SECURE_AUTH_SALT', 'y<}+%6.!4n Qh*,,scP8xvTX.nkLZ:3![X:9e(0<f/9>Z/P3q67KXc-p79a4NRlG');
define('LOGGED_IN_SALT',   'AQ!1zQ|_,2N*74I=EIsTK9n)M}%>]+{|vK|0T${GlPcRy4cmd8X;d!U0=hIDX3q:');
define('NONCE_SALT',       'Xn+m (|{U$TQF&7c?Fj7UcmwB`+Chqn/E5Ku?jw/IKY+<ec$yv&v9Nw-y$>>1Fb+');

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
