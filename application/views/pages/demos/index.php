<?php

header("location: http://nfriedly.com/portfolio#demo");
exit();

?>

<?php include(APPPATH . 'views/header.php'); ?>

<h1>Demonstrations of my work</h1>
<img alt="twitter bird" title="" class="right" src="/img/twitter.png" />
<p>A few useable examples of what I can do.</p>
<ul>
	<li><a href="/client">Credit Card Invoicing System</a>  - This is what I use for my clients.
	<p>Username: <b>demo</b><br />
	Password: <b>demo</b></p>
	</li>
	
	<li><a href="/demos/twitter">Twitter Integration</a> - From simply showing your status on your website to an advanced controller that will post your news, follow your followers, and respond to inquiries.<p>Uses jQuery.</p></li>
	
	<li><a href="http://my.iboomerang.com/email">AJAX email templating system</a> - Loads templates and sender information, allows you to modify the template, then sends the email, all via AJAX. Also allows you to schedule e-mails to be sent in the future.
	<p>Username: <b>demo</b><br />
	Password: <b>demo</b></p>
	
	<p>Hosted by <a href="http://iboomerang.com">iBoomerang</a>, uses the YAHOO User Interface library.</p>
	</li>
	
	<li><a href="http://www.facebook.com/pages/Cincinnati-OH/nFriedly-Web-Dev/188519495205">Facebook Pages and Apps</a> - A great way to market yourself and gett new business.</li>
	<li><a href="https://iboomerangsales.com/tools/shortcut.php">Instant URL lookup</a> - Searches as you type. Can use an in-house system or a 3rd party API.</li>
		<li><a href="/fellowship">Google Maps &amp; Charts APIs</a> - Display data and maps in smart and intuitive manners.</li>
	<li><a href="http://www.maximumpc.com/forums/viewtopic.php?t=85995">URL Translation</a> - Proxies signature images through a modified url so that forums will accept them.</li>
	<li><a href="/contact">Spam-free contact page</a> - I use a combination of technologies to keep my info away from spammers without giving legitimate users any extra hoops to jump through. (Such as impossible-to-read image captchas.)</li>
	<li><a href="/estimate">Instant Estimate</a> - Gives you a ballpark price for development services. <p>Uses the YAHOO User Interface library.</p></li>
</ul>

<?php $GLOBALS['extracredit'] = 'Twitter graphic from <a href="http://www.mediabistro.com/prnewser/original/twitter-bird.png">mediabistro.com</a>'; ?>
