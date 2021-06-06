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
define( 'DB_NAME', 'epiz_25903873_w836' );

/** MySQL database username */
define( 'DB_USER', '25903873_5' );

/** MySQL database password */
define( 'DB_PASSWORD', '4Sm)pb691]' );

/** MySQL hostname */
define( 'DB_HOST', 'sql101.byetcluster.com' );

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
define( 'AUTH_KEY',         'qkrkibj5wztm3kjgiurq78wo8ke9mhbkvg1k13dkb3q8klci1ilqlb2fqsqrl0zl' );
define( 'SECURE_AUTH_KEY',  'yplfwdqchqcncbs9tihbs4wpkieauarbnvatb0thhs3njzfzz6fbflsivs21h7yh' );
define( 'LOGGED_IN_KEY',    'xuzu6hh7rd4wlpbp8xqocifbkefnevl78wp5jhhhoosrsahk8rzxc4a9pikopvck' );
define( 'NONCE_KEY',        'tubal66bevancx1vwkq9vgnhpv5kj6ewp229wc31psjcmu2afp9xmpnrziabdh5v' );
define( 'AUTH_SALT',        'cep5q14szu7dcowuj8isdkyndox5elap1vrxyhvyaha3qvizmehtsmhiptndzmse' );
define( 'SECURE_AUTH_SALT', 'xneqsfyomwent2haj7hxxirruyjvwz7kaal1ws0coakxwz7u08fggobflsvbjtnl' );
define( 'LOGGED_IN_SALT',   'evhkq2vy9wvfttpwvhcxirypsyybaqwdbhtpiqgnkxa4d3imrfypubg16svfh9fl' );
define( 'NONCE_SALT',       'zk1hlh06wcsfhf2cgtonvepo1hpnt1s6ekuolpszi0zumdnrgixuk70b77mqwzs6' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
