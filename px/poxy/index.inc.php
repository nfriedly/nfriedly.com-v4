<?php 

if (basename(__FILE__) == basename($_SERVER['PHP_SELF']))
{
    exit(0);
}

echo '<?xml version="1.0" encoding="utf-8"?>';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
<head>
  <title>PHProxy</title>
  <link rel="stylesheet" type="text/css" href="style.css" title="Default Theme" media="all" />
  <meta name="keywords" content="phproxyfree,proxy,anti-filter,anti,filter,phproxy,unblock,encrypted,secure,https,ssl,private,bypass,firewal,web,anonymous,tunnel,surf" />
	<meta name="description" content="Free encrypted (https/ssl) PHProxy web proxy. Private, secure, and fast. Based on the original PHProxy (poxy) with some small enhancements."  />


</head>
<body onload="document.getElementById('address_box').focus()">
<div id="container"  style="position:relative;">
  <h1 id="title">PHProxy</h1>
  <ul id="navigation">
	<?php if($_SERVER['SERVER_PORT']!=443): ?><li><a href="https://nfriedly.com/px/poxy/" onclick="alert('Your browser may show a warning about the SSL certificate - This is OK, the site is still secure.')">Enable SSL Encryption</a></li><?php endif; ?>
    <li><a href="/">nfriedly.com</a></li>
    <li><a href="/px/">Proxy List</a></li>
  </ul>

<?php

switch ($data['category'])
{
    case 'auth':
?>
  <div id="auth"><p>
  <b>Enter your username and password for "<?php echo htmlspecialchars($data['realm']) ?>" on <?php echo $GLOBALS['_url_parts']['host'] ?></b>
  <form method="post" action="">
    <input type="hidden" name="<?php echo $GLOBALS['_config']['basic_auth_var_name'] ?>" value="<?php echo base64_encode($data['realm']) ?>" />
    <label>Username <input type="text" name="username" value="" /></label> <label>Password <input type="password" name="password" value="" /></label> <input type="submit" value="Login" />
  </form></p></div>
<?php
        break;
    case 'error':
        echo '<div id="error"><p>';
        
        switch ($data['group'])
        {
            case 'url':
                echo '<b>URL Error (' . $data['error'] . ')</b>: ';
                switch ($data['type'])
                {
                    case 'internal':
                        $message = 'Failed to connect to the specified host. '
                                 . 'Possible problems are that the server was not found, the connection timed out, or the connection refused by the host. '
                                 . 'Try connecting again and check if the address is correct.';
                        break;
                    case 'external':
                        switch ($data['error'])
                        {
                            case 1:
                                $message = 'The URL you\'re attempting to access is blacklisted by this server. Please select another URL.';
                                break;
                            case 2:
                                $message = 'The URL you entered is malformed. Please check whether you entered the correct URL or not.';
                                break;
                        }
                        break;
                }
                break;
            case 'resource':
                echo '<b>Resource Error:</b> ';
                switch ($data['type'])
                {
                    case 'file_size':
                        $message = 'The file your are attempting to download is too large.<br />'
                                 . 'Maxiumum permissible file size is <b>' . number_format($GLOBALS['_config']['max_file_size']/1048576, 2) . ' MB</b><br />'
                                 . 'Requested file size is <b>' . number_format($GLOBALS['_content_length']/1048576, 2) . ' MB</b>';
                        break;
                    case 'hotlinking':
                        $message = 'It appears that you are trying to access a resource through this proxy from a remote Website.<br />'
                                 . 'For security reasons, please use the form below to do so.';
                        break;
                }
                break;
            case 'link':
                echo '<b>URL Error:</b> ';
			 $message = 'The link you clicked is not valid. The most common cause of this is links that were generated by JavaScript.';
                break;
        }
        
        echo 'An error has occured while trying to browse through the proxy. <br />' . $message . '</p></div>';
        break;
}
?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"  style="position:relative; clear:right;">
	
    <ul id="form">
      <li id="address_bar"><label>Web Address <input id="address_box" type="text" name="<?php echo $GLOBALS['_config']['url_var_name'] ?>" value="<?php echo isset($GLOBALS['_url']) ? htmlspecialchars($GLOBALS['_url']) : '' ?>" onfocus="this.select()" /></label> <input id="go" type="submit" value="Go" /></li>
      
		<div id="add" style="position:absolute;right:20px; height:260px; padding-top:10px;width:300px;">
		<!-- script type="text/javascript"><!--
		google_ad_client = "pub-9477050254721722";
		/* proxy - 200x200, created 4/27/09 */
		google_ad_slot = "0486823389";
		google_ad_width = 200;
		google_ad_height = 200;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script -->
		
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-9477050254721722";
			/* nf poxy index */
			google_ad_slot = "1659808090";
			google_ad_width = 300;
			google_ad_height = 250;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div>
      
      <?php
      
      foreach ($GLOBALS['_flags'] as $flag_name => $flag_value)
      {
          if (!$GLOBALS['_frozen_flags'][$flag_name])
          {
              echo '<li class="option"><label><input type="checkbox" name="' . $GLOBALS['_config']['flags_var_name'] . '[' . $flag_name . ']"' . ($flag_value ? ' checked="checked"' : '') . ' />' . $GLOBALS['_labels'][$flag_name][1] . '</label></li>' . "\n";
          }
      }
      ?>
    </ul>


  </form>


  <div id="footer">
  
  <!--<h3>Don't get blocked - get your own proxy:</h3>
<p>Host your own private proxy with the free <a href="https://sourceforge.net/projects/poxy/">PHProxy (poxy) script</a> (or one of the <a href="https://sourceforge.net/projects/phpr0xi/">updated</a> <a href="https://sourceforge.net/projects/a2freedom/">versions</a>) and a USA-based <a href="http://www.dreamhost.com/r.cgi?225072">unlimited bandwidth hosting account at DreamHost</a>.</p>
-->

<?php /*
<h3>Come have some fun!</h3>

<p><a href="https://secure.dofus.com/en/godfather-fortunes-account-creation/nfriedly48"><img style="float: right; margin: 5px 0 10px 10px;" src="/img/dofus_screenshot.jpg" alt="" /></a><strong><a href="https://secure.dofus.com/en/godfather-fortunes-account-creation/nfriedly48">Dofus</a></strong> is a colorful, cartoony 2-D MMORPG with a large Free-to-play area. It's fun, witty, and engrossing and it runs on just about any computer anywhere.</p>

<h4>The story:</h4>
<blockquote style="border-left: 30px solid #EEEBEA; padding-left:6px; margin: 5px 0; font-style: italic;"><p>Since the 6 precious Dofus disappeared, the province of Amakna has been in great turmoil... and not without good reason! The extraordinary powers contained in these magical Dragon eggs have started to awaken the jealousy in good folk, and the cities of Bonta and Brakmar are already coming to blows.</p>
<p>And yet an even more fearsome threat hangs over Amakna. Strange creatures have begun to take their place among the docile plants and animals of the World of Twelve, and land masses surge out of the sea in places where there has been nothing for millennia.</p>
<p>Let me tell you, wherever they come from, whatever may drive them, all these new arrivals have one single aim: to lay their hands on the six Dofus.</p></blockquote>

<p><a href="https://secure.dofus.com/en/godfather-fortunes-account-creation/nfriedly48">Get started here</a> and be sure to say "hi" to nfriedly on the Zatoishwan server.</p>

*/ ?>

</div>





</div>
<?php $mp_name='poxy'; include '../.ga.php'; ?>

</body>
</html>