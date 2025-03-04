<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kitasehatdebe' );

/** Database username */
define( 'DB_USER', 'msehat' );

/** Database password */
define( 'DB_PASSWORD', 'P4sTiS3h47!' );

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
define( 'AUTH_KEY',         'z&>1)CW%k~JLBF;NH7R0lWAHm5RSwqjr(Be`Vm4Uu6?*$HairS+Jwcvr?:k6gEx ' );
define( 'SECURE_AUTH_KEY',  '3c0{`,9r(t/E<h{9%*bu8,It/N~N`c+hK8k{T`o*1cv(k+]i75%P#6JHuw%rQp;l' );
define( 'LOGGED_IN_KEY',    '[9%.05rLfi.dq([6MI3`/Nh</&Sf7&+:o)i&*m,7X)gK;k:6q&C)(0ZgOjI4-srX' );
define( 'NONCE_KEY',        '>2*y9fJ4+pf/hqG#+`cZ>?pwe`lj0 b38E/kQxWrGevVcSb[{K#S1y?_dpR4D$}3' );
define( 'AUTH_SALT',        '#gY=BXTJIdf2u27QAltKc_86[D,XJd4ZRr~Q]=vN> T:7wd)o/  N}!2mIp-H)<i' );
define( 'SECURE_AUTH_SALT', 'Muk:H.vtwF7hQd<b7fnDH84$evv5*or@^UhHC%H>hggLN4%&FLe!{<9#{@Ms{wg%' );
define( 'LOGGED_IN_SALT',   'QzWDYZ7?<?z*$3zC!$l&%+sVamO^0 PdsQBe.}=}IgakL;b<8Dy`F$v(]hsMjHT5' );
define( 'NONCE_SALT',       'woa,8D(YUS6f! z%WsP?rgFpZpvg+cfi&FRux59c=-@Q~PV}2y]rC_^<71oy5.N*' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
