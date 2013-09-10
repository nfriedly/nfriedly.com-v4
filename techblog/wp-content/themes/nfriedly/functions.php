<?php


/* function to add lightbox js & css to footer */

function nf_footer_lightbox(){
	if(isset($GLOBALS['nf_include_lightbox']) && $GLOBALS['nf_include_lightbox'] == true){
		echo '
		<script type="text/javascript" src="/scripts/lightbox/lightbox.js"></script>
		<link rel="stylesheet" type="text/css" href="/scripts/lightbox/lightbox.css" />
';
	}
}

add_action('wp_footer', 'nf_footer_lightbox');