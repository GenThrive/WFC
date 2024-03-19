<?php

/**
 * On the Cornershop dev server, send mail via SMTP through localhost.
 */
function cshp_phpmailer_init( PHPMailer $phpmailer ) {

	$phpmailer->Host = 'localhost';
	$phpmailer->SMTPAuth = false;
	$phpmailer->IsSMTP();
}

if ( false !== stripos( $_SERVER['HTTP_HOST'], '.cshp.co' ) ) {
	add_action( 'phpmailer_init', 'cshp_phpmailer_init' );
}


/**
 * Fix for mailgun password resets looking bad and missing link
 * Mailgun doesn't like the plaintext of the password reset email
 * This filter removes HTML-esque <> elements that Mailgun treats as tags
 * and replaces EOL's with HTML <br> elements.
 */
add_filter( 'retrieve_password_message', 'cshp_retrieve_password_message', 99, 4 );
function cshp_retrieve_password_message( $message, $key, $user_login, $user_data ) {

	if ( is_plugin_active( 'wp-mail-smtp/wp_mail_smtp.php' ) ) {
		$wp_smtp_settings = get_option( 'wp_mail_smtp', array() );
		if ( isset( $wp_smtp_settings['mail']['mailer'] ) && 'mailgun' === $wp_smtp_settings['mail']['mailer'] ) {
			return str_replace( array( '<', '>', "\r\n" ), array( ' ', ' ', '<br>' ), $message );
		}
	}

	return $message;
}
