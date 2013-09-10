<?php
/**
 * @package nf_session
 * @author Nathan Friedly
 * @version 1
 */
/*
Plugin Name: nf session
Plugin URI: http://nfriedly.com
Description: Initiates the session variables with the referrer and landing page
Author: Nathan Friedly
Version: 1
Author URI: http://nfriedly.com/
*/

// record the original referrer and landing page in the session
function nf_session_init(){
	session_start();

	if(isset($_GET['nf_ses_test'])) echo "<!-- " . print_r($_SESSION,1) . " -->";

	if(!isset($_SESSION['landing_page'])){
		$_SESSION['landing_page'] = $_SERVER['REQUEST_URI'];
		$_SESSION['original_referrer'] = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '';
	}

	if(isset($_GET['nf_ses_test'])) echo "<!-- " . print_r($_SESSION,1) . " -->";

}

// Now we set that function up to execute when the admin_footer action is called
add_action('init', 'nf_session_init');

?>
