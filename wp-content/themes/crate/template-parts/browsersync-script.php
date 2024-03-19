<?php 
$is_browsersynced = ( isset( $_SERVER['HTTP_X_BROWSERSYNCED'] ) && $_SERVER['HTTP_X_BROWSERSYNCED'] );
if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) { 
?>
<?php // if ( ! $is_browsersynced ) { ?>
<!-- <script id="__bs_script__">//<![CDATA[
    document.write("<script async src='https://HOST:<?php //if ( defined( 'BROWSERSYNC_PORT' ) ) : echo BROWSERSYNC_PORT; endif; ?> ?>/browser-sync/browser-sync-client.js?v=2.26.3'><\/script>".replace("HOST", location.hostname));
//]]></script> -->
<?php // } ?>

<?php } ?>