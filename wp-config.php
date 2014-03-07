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

// ** MySQL ayarları - Bu bilgileri sunucunuzdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define('DB_NAME', 'wtrends');

/** MySQL veritabanı kullanıcısı */
define('DB_USER', 'root');

/** MySQL veritabanı parolası */
define('DB_PASSWORD', '');

/** MySQL sunucusu */
define('DB_HOST', 'localhost');

/** Yaratılacak tablolar için veritabanı karakter seti. */
define('DB_CHARSET', 'utf8');

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define('DB_COLLATE', '');

/**#@+
 * Eşsiz doğrulama anahtarları.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=Y0H[-Z0M]8< [)5dydR#R!4aQJ+%.E#G4Ji-Y&li2.Ru3s#mW;VGuG=,U-JguU0');
define('SECURE_AUTH_KEY',  '|,bp4j(;hmlJ5C;aiqn:QwQ;^){)|qh09:;X5-h9H#L!J(hD-/e]^IfK43,kySWF');
define('LOGGED_IN_KEY',    'SS,&Rn^@tbP-euAG]J,2[7Dl~0=(H;%:d{.p.xoHdEl(eEH-s!$otnIIRZ#Wb2&|');
define('NONCE_KEY',        ')wIrcwkGZ6[EX3Gi}QO /0`?bykbpY# }O#[$IAB:Zrgu]^tb-!8]U@GH!(^N`t&');
define('AUTH_SALT',        'V1|6-S;%a~OYaQOnUKkV]L<t/j8m+(/2;7xhJ+:LS-]!Ta>Y4oB8-J;Ysv|e-Eh|');
define('SECURE_AUTH_SALT', 'BYN5Nz@rh}-* onqW)#MJ&$LVM(l)Zc.6x+jv|MyRqW:)Ng{-^`MRrsDpG+tewOw');
define('LOGGED_IN_SALT',   '%Ov+Jf]g3CGG$dD|qz~-Gc;,`1BIR~%v8M-gr|X-FMm`=S^8&:i3Dj}-Zc:QP=oH');
define('NONCE_SALT',       '%CiDsBgTygCi<iKHnoX=,Mb9522kU$-8l5#FS}{-m{}w-IXSxL,60I0+$KZkGP!T');
/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix  = 'wp_';

/**
 * WordPress yerel dil dosyası, varsayılan ingilizce.
 *
 * Bu değeri değiştirmenize gerek yok! Zaten Türkçe'ye ayarlı.
 * tr_TR.mo Türkçe dil dosyasının wp-content/languages dizini altında olduğundan emin olun.
 * Türkçe çeviri hakkında öneri ve eleştirilerinizi iletisim@wordpress-tr.com adresine iletebilirsiniz.
 *
 */
define('WPLANG', 'tr_TR');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
