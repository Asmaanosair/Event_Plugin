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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '$9p(`)Mn0;4])KOEXPz=36v^~i|/lX#`$ H{E<vf|ONULs3=ZC_u*~p75N2}>O/1' );
define( 'SECURE_AUTH_KEY',  '+-,?mT/oGKUKtanYt_]!f?;E|r#20w-&mG<f?eBO3T5Bn8fL)#pJ1cD:lUyEQ`#b' );
define( 'LOGGED_IN_KEY',    '3%g5`->p{@57]AZnX+/*Cs132&yEM>:bizB!f-a,tFwG0}z[!%(+&,!hkk.{Jql=' );
define( 'NONCE_KEY',        '~7.2^O8=j-uP)d:b4wX=51O%(H7?PlnwSG0~UcF1a`N:Kkq4xT F2RDJY@6ED?1E' );
define( 'AUTH_SALT',        '*:xoCu#q(Ofzqi0~g@G^31iyo:pwC6IC^x+/4BxH7i};E9qNSa3^QMeH#&ga}Rn[' );
define( 'SECURE_AUTH_SALT', 'I3lcHh;|5Y,EC)H8ed@XC E~Rq`2l`g$`]}G}k8K J7(*$8I(jWc6zyDylpeua*m' );
define( 'LOGGED_IN_SALT',   'r!i^&w7G,0o2;=o}yT%rE#[wGqE{Hd8LMIaDltAqjJ}PHQg7%rn~Da8m{b-~Dav{' );
define( 'NONCE_SALT',       'L(NRrGp;c@Q4]s/FjKE.=0}DI?ExD~yO>sq;sg-r1ts.@XAvyqeH8OOPu 8IlK(o' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
