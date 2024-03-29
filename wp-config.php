<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/*
 * Environment specific configuration:
 *
 */
if ( file_exists( dirname( __FILE__ ) . '/../env_local') )
{
	// Local Environment
	define('WP_ENV', 'local');
	define('WP_DEBUG', true);
	define('DB_NAME', 'earthmoves');
	define('DB_USER', 'erthmweb');
	define('DB_PASSWORD', 'Y3YqTzG1eKsHDc');
	define('DB_HOST', '127.0.0.1');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	define('DISQUS_DEVELOPER', 1); // Disqus (commenting) developer settings - set to 1 for dev and test environments
	define('GOOGLE_ID', 'UA-XXXXXXXX-X'); // Google Analytics ID
	define('FB_APP_ID', ''); // Facebook App ID
	define('FB_APP_SECRET', ''); // Facebook App Secret
	define('MC_API', ''); // MailChimp API Key
	define('MC_LIST_ID', ''); // MailChimp List ID
	define('EMAIL_CONTACT', 'michael.enslow@gmail.com'); 
	define('TYPEKIT_ID', ''); // Typekit ID for JavaScript 
	// multisite
	define('DOMAIN_CURRENT_SITE', 'em.mistermachinework.com');

}
elseif ( file_exists( dirname( __FILE__ ) . '/../../shared/env_test' ) ) 
{
	// Test Environment
	define('WP_ENV', 'test');
	define('WP_DEBUG', false);
	define('DB_NAME', 'earthmoves');
	define('DB_USER', 'erthmweb');
	define('DB_PASSWORD', 'oDxdp4NaEPU9bK');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	define('DISQUS_DEVELOPER', 1);
	define('GOOGLE_ID', 'UA-XXXXXXXX-X'); // Google Analytics ID
	define('FB_APP_ID', ''); // Facebook App ID
	define('FB_APP_SECRET', ''); // Facebook App Secret
	define('FB_APP_SECRET', ''); // Facebook App Secret
	define('MC_API', '-us4'); // MailChimp API Key
	define('MC_LIST_ID', ''); // MailChimp List ID
	define('EMAIL_CONTACT', 'michael.enslow@gmail.com'); 
	define('TYPEKIT_ID', ''); // Typekit ID for JavaScript 
	// multisite
	define('DOMAIN_CURRENT_SITE', 'em.mistermachineshop.com');
} 
else 
{
	define('WP_ENV', 'production');
	define('WP_DEBUG', false);
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	define('DISQUS_DEVELOPER', 0);
	define('GOOGLE_ID', ''); // Google Analytics ID
	define('FB_APP_ID', ''); // Facebook App ID
	define('FB_APP_SECRET', ''); // Facebook App Secret
	define('MC_API', ''); // MailChimp API Key
	define('MC_LIST_ID', ''); // MailChimp List ID
	define('EMAIL_CONTACT', ''); 
	define('TYPEKIT_ID', ''); // Typekit ID for JavaScript 
	// multisite
	define('DOMAIN_CURRENT_SITE', 'example.com');
}


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'MoqFt^Z#n]+$nFq Z[|e+bph1s@^Lvcg$,rUi}=?}Q4u6[ml2R2R]`y*-o8]a0w9');
define('SECURE_AUTH_KEY',  'GX4@.&f;BX^H2::1[*aQa0rc~|_+]TOy-Qr~H9-WhlpDgP2;[QU]XxKkvJv>})t3');
define('LOGGED_IN_KEY',    'j&qz CublKw+-b+4S+J/0%d7sIs?t;cYOBz!2sc=/Q/o~N+Al~-!zKF-%w?rO$Q|');
define('NONCE_KEY',        '^T/?ux;cE([Wc`k!Mc_Ah}eDu|Hx.0:f%a -K:c5Y4M;&0=xy1)&T-x),|/LMJ]m');
define('AUTH_SALT',        'Zd!-({@?JT6DlS6lmz|5QXd`J6_H^%ulFg0]R|[!Q=uQj2b~<#^Ztqr40t-{1G)t');
define('SECURE_AUTH_SALT', 'K^wp9}(cAEAD5xfJqrWt}{aoZ^}V?!bcmpAOpM(;qs7-4Cw?ItjE-OI4cQN2rnHh');
define('LOGGED_IN_SALT',   'J]tC6;D VMfjIgHn{:x~vV1fN.cke(|,#4#]rS2f,#$Tn|$IDo|CQV<Z1Dur#rLB');
define('NONCE_SALT',       's80tf 8sLa)Lb00-xhoAv{M=~I#M|&V0WOS}f?5PfTzV.-;B;(BKs8Uhue}U%~-l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpem_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/* Multisite */
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');