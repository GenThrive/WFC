<?php
# Database Configuration
define( 'DB_NAME', 'wfc' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost:8888' );

define( 'DB_CHARSET', 'utf8mb4' );
$table_prefix = 'wpdb_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '+R:{a$eA.KQSq+ ~ D.EL2A:w0(pOYsB^Z>!n[n&dn@{:r3iS|[/=OqxE9!-x7OF');
define('SECURE_AUTH_KEY',  'o:r/oEd}>)!}<2Q8}s>v6i-7}c+a5*2c,Y=Za57TORukTxv)]I$G]%GE-0J],NQ4');
define('LOGGED_IN_KEY',    '!0:-dkXPbZd]i#Qz5>~ub(C]X7nsa?BUY6~RDKN<X*OgmKw`;fuU:<_&IukL<r2s');
define('NONCE_KEY',        '85j2^kq|lLY=Z2#SsW$Bb6M$ReK6&6D!|l%x$e)[nSI7/?G@|7XEVRjbYWX;_-T=');
define('AUTH_SALT',        'X?^c4|edst{,[!s:U1i}Mz`}|,s|fCb@fYm<2HzM/fN`3bxTF9jm|_7jTA T7o|A');
define('SECURE_AUTH_SALT', '[9-MBKcY/BWs_*@RJzug y8!Cb/$O.f7PreCvo|}&od96Y;yriPgbKXyZx,b]zH<');
define('LOGGED_IN_SALT',   '+XN4+`80=u,$YzgqE{_&af9*G>z~=| !Uc8)RU{?f`LO:TN&Fhu|[>hnIIDbjsWX');
define('NONCE_SALT',       '-|w> _=7qC,fWRP(WhQ5C|3^ppLG8*>-!z)yi6 PBndFQ^ty2m{[;Uu^:c{!iv8R');


# Localized Language Stuff

// define( 'WP_CACHE', TRUE );

// define( 'WP_AUTO_UPDATE_CORE', false );

// define( 'PWP_NAME', 'wfcprod' );

// define( 'FS_METHOD', 'direct' );

// define( 'FS_CHMOD_DIR', 0775 );

// define( 'FS_CHMOD_FILE', 0664 );

// define( 'PWP_ROOT_DIR', '/nas/wp' );

// define( 'WPE_APIKEY', '3f7ef26968b82c89591315a921111f0f5dba2c68' );

// define( 'WPE_CLUSTER_ID', '213325' );

// define( 'WPE_CLUSTER_TYPE', 'pod' );

// define( 'WPE_ISP', true );

// define( 'WPE_BPOD', false );

// define( 'WPE_RO_FILESYSTEM', false );

// define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

// define( 'WPE_SFTP_PORT', 2222 );

// define( 'WPE_LBMASTER_IP', '' );

// define( 'WPE_CDN_DISABLE_ALLOWED', false );

// define( 'DISALLOW_FILE_MODS', FALSE );

// define( 'DISALLOW_FILE_EDIT', FALSE );

// define( 'DISABLE_WP_CRON', false );

// define( 'WPE_FORCE_SSL_LOGIN', true );

// define( 'FORCE_SSL_LOGIN', true );


// define( 'WPE_EXTERNAL_URL', false );

// define( 'WP_POST_REVISIONS', FALSE );

// define( 'WPE_WHITELABEL', 'wpengine' );

// define( 'WP_TURN_OFF_ADMIN_BAR', false );

// define( 'WPE_BETA_TESTER', false );

// umask(0002);

// $wpe_cdn_uris=array ( );

// $wpe_no_cdn_uris=array ( );

// $wpe_content_regexs=array ( );

// $wpe_all_domains=array ( 0 => 'watercalculator.org', 1 => 'wfcprod.wpengine.com', 2 => 'www.watercalculator.org', 3 => 'wfcprod.wpenginepowered.com', );

// $wpe_varnish_servers=array ( 0 => '127.0.0.1', );

// $wpe_special_ips=array ( 0 => '104.198.168.46', 1 => 'pod-213325-utility.pod-213325.svc.cluster.local', );

// $wpe_netdna_domains=array ( );

// $wpe_netdna_domains_secure=array ( );

// $wpe_netdna_push_domains=array ( );

// $wpe_domain_mappings=array ( );

// $memcached_servers=array ( );


# WP Engine ID


# WP Engine Settings


# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');

// define( 'WPE_SFTP_ENDPOINT', '34.133.60.85' );

// define( 'WPE_SFTP_ENDPOINT', '' );
define('WPLANG', '');
define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '512M');
define('WP_HOME','http://localhost:8888/wfc-latest/');
define('WP_SITEURL','http://localhost:8888/wfc-latest/');
// define('WP_TEMP_DIR', '/srv/bindings/%s/tmp');