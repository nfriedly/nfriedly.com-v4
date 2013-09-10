<?php 

$title = "Projects and Public Services | Nathan Friedly";

include(APPPATH . 'views/header.php'); 

?>

<h1>Projects</h1>

<h2><a href="http://whatsmyua.com/">Whats My User Agent?</a></h2>
<p>This is a website that takes a User Agent string (yours by default) and breaks it down into individual pieces explaining what each part represents and when parts contain misinformation.</p>
<p>The site was also my first Ruby on Rails project and was a great learning experience, both about RoR and User Agent strings.</p>
<p><a href="http://whatsmyua.com">http://WhatsMyUA.com</a></p>

<!--
<h2><a href="http://twittermentionmonitor.com">Twitter Mention Monitor</a></h2>
-->

<h2><a href="http://github.com/nfriedly/Javascript-Flash-Cookies/">SwfStore: a JavaScript Library for cross-domain flash cookies</a></h2>
<p>SwfStore is a library that takes care of the nitty-gritty of using flash cookies in JavaScript. It provides a JS interface for setting and retrieving cookies and also offers onReady and onError callbacks to notify your JS when the .swf file is loaded. (Or fails to load as the case may be.)</p>
<p>I needed reliable cross-domain cookies for a project at work, and so I chose to use flash to accomplish it. I was somewhat surprised when I learned that there wasn't already a library, so after spending several days re-learning flash and developing this library, I got permission from <a href="http://sociablelabs.com/">my company</a> to open source it.</p>
<p>Download or fork it at <a href="http://github.com/nfriedly/Javascript-Flash-Cookies/">http://github.com/nfriedly/Javascript-Flash-Cookies/</a> or read about it at <a href="http://nfriedly.com/techblog/2010/07/swf-for-javascript-cross-domain-flash-cookies/">http://nfriedly.com/techblog/2010/07/swf-for-javascript-cross-domain-flash-cookies/</a>
	
<h2><a href="http://nfriedly.com/pagerank">Google PageRank lookup tool</a></h2>
<p>Retrieves the PageRank for up to 10 URLs at a time, stores your recent history in your session, and even provides a bookmarklett for on-the-go lookups!</p>
<p>Every other PageRank tool I had tried either sucked, didn't work, or both. So I built my own that works exactly the way I wanted.</p>
<a href="http://nfriedly.com/pagerank">http://nfriedly.com/pagerank</a>

<h2><a href="http://nfriedly.com/eoc">ExtremeOverclocking.com Folding@Home signature image proxy</a></h2>
<p>Provides a forum-friendly URL for the ExtremeOverclocking.com Folding@Home signature images.</p>
<p>Several forums, such as <a href="http://www.maximumpc.com/forums/viewtopic.php?t=85995">Maximum PC Magazine's</a> only except image tags if the URL looks like an image. The ExtremeOverclocking URLs look like a PHP script (because the are.) This is also a PHP script, but it looks like an image ;)</p>
<p><a href="http://nfriedly.com/eoc">http://nfriedly.com/eoc</a></p>

<?php include(APPPATH . 'views/footer.php'); ?>