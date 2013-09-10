<?php 

$title = "Twitter Development Demo by nFriedly - Javascript &amp; AJAX Expert";

$keywords = "twitter,app,application,bot,js,javascript,ajax,development,dev,web,social,new,media,dhtml,expert";


include(APPPATH . 'views/header.php'); ?>

<!-- div class="left" style="width:250px;" -->


<div class="right" style="width:250px;margin-top:10px; text-align:left;">
	<p id="status_output"></p>
	<p class="clear" id="fancy_output"></p>
</div>

<h1>Twitter Demo</h1>

	<h2>Simple:</h2>
	<p>Type in your twitter name to see your status:</p>
	<p><input id="status_username" value="nfriedly" /> <input type="button" id="get_status" value="Go" /></p>
	
	<h2>Fancy:</h2>
	<form method="post">
  <p><b>Currently disabled due to twitter API changes.</b></p>
	<!-- p>Type in your name and password to do any of the folowing:</p -->
	<p><input checked="checked" type="checkbox" name="follow_me" id="follow_me" disabled="disabled" /> Follow me</p>
	<p><input checked="checked" type="checkbox" name="tweet" id="tweet" disabled="disabled" /> Tweet "@nfriedly is awesome!  <br />
	http://nfriedly.com/demos/twitter"</p>
	<p><input checked="checked" type="checkbox" name="show_dm" id="show_dm" disabled="disabled" /> Display the last direct message you recieved</p>
	<p><input id="userid" name="userid" disabled="disabled" /> Your twitter name</p>
	<p><input id="password" name="password" type="password"  disabled="disabled" /> Your twitter password</p>
	<img src="/img/twitter_small.png" alt="Twitter bird" title="" class="right"  />
	<p><input type="button" name="do_fancy" id="do_fancy" value="Go" disabled="disabled" /></p>
	<p><small><i>Your username and password are used only for this demonstration and then discarded immediately.</i></small></p>
	
	
	<?php include APPPATH.'views/pages/'.'_adsense_semi_wide.php'; ?>
	
	<h2>Twitter Development</h2>

	<p>This page demo's two of three twitter API access methods: Public Data and <strike>Web Authentication</strike>. 
  <i>Web Authentication has been permamently disabled by Twitter due to it's potential for abuse.</i>
These methods are best suited for embedding statuses into websites and twitter bot development. 
</p>

	<p>The third method, <abbr title="Open Authentication">OAuth</abbr> is appropriate for situations where many users will be using your application and you would like to get their tweets to link back to your website in the "from" section.See <a title="Twitter @mention Monitor and notification service" href="http://twittermentionmonitor.com/">http://TwitterMentionMonitor.com</a> for an example of this.</p>
	
	<p>If you are interested in <a href="/webdev">building a twitter app or bot</a>, I am the right man for the job. 
I have been working with twitter since well before it became commonplace. 
<a href="/contact">Get in touch with me</a> or get an <a href="/estimate">Instant Estimate</a> for more information.</p>

	<p><a href="/webdev">Website Development</a> &gt; <a href="/portfolio">Portfolio</a> &gt; Twitter Demo</p>
	</form>
<!-- /div -->


<?php

$GLOBALS['afterFooter'] = '<script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAWMsuqAAoJe0vLYg5hsR_RhSOpBqeijn_PFXyh9G70yoMxuLEGxQp76oyfuI3ixXHxHGC_R4Z3BMQ3w"></script>
<script type="text/javascript" src="/scripts/twitter.js"></script>';

include(APPPATH . 'views/footer.php'); ?>