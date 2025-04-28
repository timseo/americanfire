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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
 
 if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
   $_SERVER['HTTPS']='on';
 
 define('WP_HOME','https://americanfireinc.com/blog');
define('WP_SITEURL','https://americanfireinc.com/blog');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'xpwgcamy_americanfireblog' );

/** MySQL database username */
define( 'DB_USER', 'xpwgcamy_amlog' );

/** MySQL database password */
define( 'DB_PASSWORD', 'izRs3XzzhsLsige' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'j!y!:,bUOnr[<@h&+_>D7ADq_V5/!sHFbDPr_tqf-)$T1#Rh&fFe_{u+C/1@tI.r' );
define( 'SECURE_AUTH_KEY',  '{I?@en!SYI?fv!A|H6r6Ct0jVP0lfW;CKx0|9%{h0ak{7UFIgyFY^_TTY|i:|.sd' );
define( 'LOGGED_IN_KEY',    'U!Rf-jz`ELQpoJKrt3UtKRK==gyC/OQ_c~|Q{D5JS-Hn4X0 fwgoqv{w=ghW<xuu' );
define( 'NONCE_KEY',        '#^Yh ^QlHsK[Ye!@pNO!vZ^JyAAZRp+QDL1|i+$Nr}uanv!SsmgDk.DMRK8>zvvT' );
define( 'AUTH_SALT',        'moCu*?Z>9{j* 6bTwXh(StO_m{2za>}fQT&pa|FncQ%JqK@`-nQY&_IKPKJK _3B' );
define( 'SECURE_AUTH_SALT', '<KV?UCRK:eeU9DyaY`z48X%zS2jQkLQ]`w1;l!;ut5aWRta|R9X%03aDCs~C#L 2' );
define( 'LOGGED_IN_SALT',   'PEi>jA=S&rDy5v8f+0cD?=[6;X0,x|!8j!4UEbz:M<y>GYGObYgL`ysC.!Ku}Ypk' );
define( 'NONCE_SALT',       'hv!m+P}s5{Khbb6x;MP!D:/!VS]GX?Mj _e&]Eg^Q1M5Fqf<x9R$0(O7]XD1f>Z%' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
