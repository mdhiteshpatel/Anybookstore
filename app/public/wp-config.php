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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WJF7gyF+qlzuVcvE4yeD1ZnAg+vdmoHUNwi7l9V/mYoUCyJ4bDJng9qhb9Mz3MX1jMt2PAgQrESkCM0Zfn9mRg==');
define('SECURE_AUTH_KEY',  'pjPw1mxQVwRGfGMI32ztWAo2ZCZCrxi6M3UHXbRjbGbJi6DBZ0sF0Od7DCRCeFv14gqKqsRPEM3i8C+IPuOUag==');
define('LOGGED_IN_KEY',    '5Av1BLHJPA6BoaaSXoJCF+mnr2Q8rl6UdjTtLI76rxGticROECUalOhRE33fnwQN00OB7SE01TblOuzkLnsaGQ==');
define('NONCE_KEY',        'GvxYf1/qUDW75KsOh8cLkfGR1Ym8L+a4NlVIi3r6eZN6Ebi9apq8KEzq/lJYDZLJs2waIJcl1dbvhGoBl0GAQQ==');
define('AUTH_SALT',        'iITUG2qxh+EQ3EQwgLMHEC5D14WsV/M2EdbEptJLBmyjxZRdqNc0WD43yKRZP6zqkLmg4TbK+0GJgDslt0O3Vg==');
define('SECURE_AUTH_SALT', 'B6vLncU+TEujLVt6/P1erUzv83VgjpRT0fk43IUKO7v5hSFT6n8I1RneyIxy+chG6+WNwS/WMUcEHflxQkKJvA==');
define('LOGGED_IN_SALT',   '3lPO1yr/yoxW3DwCX4HTKAb2EyNqKqOeL+CGmzt4d7cpxRyR1xPz08v9Ka+g8oFRhtIkLCD1slwT2JqiIrFExw==');
define('NONCE_SALT',       'Lw22aP3DX7k08PnAzW3bvC61l4iQnQz8s4IOutdDn4xckj0vH4vmlcGXYcQHASMrHOwZ9H4rkEPaet4Zu3tjcg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
