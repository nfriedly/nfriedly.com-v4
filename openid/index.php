<?php
// IF YOU HAVE NOT DONE SO, PLEASE READ THE README FILE FOR DIRECTIONS!!!

/**
 * phpMyID - A standalone, single user, OpenID Identity Provider
 *
 * @package phpMyID
 * @author CJ Niemira <siege (at) siege (dot) org>
 * @copyright 2006-2008
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License
 * @url http://siege.org/projects/phpMyID
 * @version 2
 */


/**
 * User profile
 * @name $profile
 * @global array $GLOBALS['profile']
 */
$GLOBALS['profile'] = array(
	# Basic Config - Required
	'auth_username'	=> 	'nfriedly',
	'auth_password' =>	'', // md5(username:realm:password)

	# Optional Config - Please see README before setting these
	'microid'	=>	array('mailto:nathan@thissite.com', 'http://nfriedly.com'),
	'pavatar'	=>	'http://nfriedly.com/img/miniduck_80x80.jpg',
	
	'Contact' => 'Nathan Friedly',
	
	'Refference' => 'http://nfriedly.com/'

	# Advanced Config - Please see README before setting these
#	'allow_gmp'	=>	false,
#	'allow_test'	=> 	false,
#	'allow_suhosin'	=>	false,
#	'auth_realm'	=>	'phpMyID',
#	'force_bigmath'	=>	false,
#	'idp_url'	=>	'http://your.site.com/path/MyID.config.php',
#	'lifetime'	=>	1440,
#	'paranoid'	=>	false, # EXPERIMENTAL

	# Debug Config - Please see README before setting these
#	'debug'		=>	false,
#	'logfile'	=>	'/tmp/phpMyID.debug.log',
);

/**
 * Simple Registration Extension
 * @name $sreg
 * @global array $GLOBALS['sreg']
 */
$GLOBALS['sreg'] = array (
	'nickname'		=> 'nFriedly',
	'email'			=> 'nathan.friedly@gmail.com',
	'fullname'		=> 'Nathan Friedly',
	'dob'			=> '1986-08-01',
	'gender'		=> 'M',
	'postcode'		=> '45220',
	'country'		=> 'US',
	'language'		=> 'en',
	'timezone'		=> 'America/New_York',
	'Contact'		=> 'Nathan Friedly',
	'Refference'	=> 'http://nfriedly.com'
);


require('MyID.php');
?>
