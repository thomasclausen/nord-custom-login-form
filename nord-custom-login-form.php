<?php
/*
Plugin Name: NORD - custom login form
Description: Customizes the standard login form (for private pages) in WordPress.
Version: 0.2
License: GPLv2
Author: Thomas Clausen
Author URI: http://www.thomasclausen.dk/wordpress/
*/

// Message on password protected posts/pages
function nord_password_form() {
	global $post;
	
	$label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
	$output = '<form action="' . get_option( 'siteurl' ) . '/wp-login.php?action=postpass" method="post">' . "\r\n";
	$output .= '<p><strong>' . __( 'Denne side er kodeordsbeskyttet!', 'nord_password_form' ) . '</strong></p>' . "\r\n";
	$output .= '<p><em>' . __( 'Leder du efter adresse til login i forbindelse med tilmelding af hold skal du &aring;bne f&oslash;lgende side - <a href="https://www.conventus.dk/medlemslogin/index.php?forening=944" target="_blank">https://www.conventus.dk/medlemslogin/index.php?forening=944</a></em></p>', 'nord_password_form' ) . "\r\n";
	$output .= '<p>' . __( 'For at se siden skal du indtaste dit kodeord nedenunder.', 'nord_password_form' ) . '<br /><em>' . __( 'Bem&aelig;rk! Der er forskel p&aring; store og sm&aring; bogstaver i kodeordet.', 'nord_password_form' ) . '</em></p>' . "\r\n";
	$output .= '<p><label for="' . $label . '">' . __( 'Kodeord', 'nord_password_form' ) . ':<br /><input name="post_password" id="' . $label . '" type="password" size="20" /></label><br /><input type="submit" name="Submit" value="' . esc_attr__( 'Log ind', 'nord_password_form' ) . '" /></p>' . "\r\n";
	$output .= '</form>' . "\r\n";
	
	return $output;
}
add_filter( 'the_password_form', 'nord_password_form' ); ?>