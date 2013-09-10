<?php

$title = "Portfolio - nFriedly Web Development ";

$keywords = "portfolio,web,website,developer,programing,php,javascript,design,dev,xhtml,css,twitter,cincinnati,oh,freelance,code,mysql,database,e-comerce";

$description = "Expert PHP &amp; Javascript / AJAX Web Development. ".(date("Y")-2001)."+ years experience with websites. I deliver high quality websites that do what you want.";

$page = "webdev";
$subpage = "portfolio";

include(APPPATH . 'views/header.php'); ?>

<p><a href="/webdev">Web Development</a> &gt; <a href="/portfolio">Portfolio</a></p>

<?php include '_employed.php'; ?>

<h1>Portfolio</h1>

<script type="text/javascript">
// this is for people, not bots
document.write('<p>You may also be interested in my <a href="/files/Nathan-Friedly-Resume.p'+'df">resume</a>.</p>');
</script>

	<h2><a href="http://gemcityjs.com">Tipp JS / Gem City JS</a></h2>
	<p>
		<img class="left" src="/img/portfolio/tipp-js.png" alt="" />
		<img class="right" src="/img/portfolio/gem-city-js.png" alt="" />
		I founded the Tipp JS JavaScript Meetup / User Group after moving to Tipp City. I later joined forces with Sparkbox in Dayton to create the Gem City JS.</p>
		<p> In addition to hosting the Tipp JS meetups, I've given presentations on a variety of topics including an intro to node.js, Unit Testing with Jasmine, using node.js to control physical hardware.</p>
		<p>I've given some of these presentations and others including Express.js, Meteor, require.js, LESS, and CoffeeScript at other events.</p>

	<h2><a href="http://pagerank.nfriedly.com">Google PageRank Lookup Tool v2</a></h2>
	<p>
		<a rel="lightbox" title="" href="/img/portfolio/pagerank.png"><img class="right" src="/img/portfolio/thumbs/pagerank.png" alt="" /></a>
		A Google PageRank tool uses my <a href="https://github.com/nfriedly/node-pagerank">node-pagerank</a> library. Allows the visitor to lookup the PageRank of one or more sites and stores the results for later use. Also includes a bookmarklet for easy access. This tool replaces my previous php-based app.</p>
	<p>Built on the Twitter Bootstrap CSS foundation and Backbone.js and Browserify for the front-end. Uses node.js Express.js, and Redis for the back-end. Static assets are served through Amazon's CouldFront CDN while the dynamic portions are hosted on Heroku. Uses Stripe used for paid accounts.</p>
	<p>Technologies: node.js, Backbone.js, Twitter Bootstrap, Redis, grunt.js, Amazon S3, Amazon Cloudfront, Heroku, Browserify, Express 3</p>

	<h2><a href="http://picsyncapp.com">PicSync</a></h2>
	<p>
		<img class="right" src="/img/portfolio/thumbs/picsync.png" alt="" />
		<img class="left" src="/img/portfolio/picsync-phone-shadow.png" alt="" />
		PicSync automatically uploads photos you take on your Android phone to a private album. It will then remind you about the photos the next time you log into Facebook allowing you to review and post your favorites.</p>
	<p>PicSync is still under development and is coming along nicely. Features coming soon include a backup service, Facebook Login, and credit card payments. <a href="http://twitter.com/picsyncapp">Follow the development on twitter.</a></p>
	<p>Technologies: node.js, Android, Heroku, Amazon S3, Express, Twitter Bootstrap, Font Awesome, LESS, Jade, JavaScript, Java</p>
	
	
	<h2><a href="http://backyardsports.com/" name="sandlot">Backyard Sports Sandlot Sluggers</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/sandlot.jpg"><img src="/img/portfolio/thumbs/sandlot.jpg" alt="" class="left" /></a>
	I built a custom Drupal module and an Actionscript 3.0 flash loader for the Rookie Arcade section of BYS's new website.
	These worked in concert to bring together a series of minigames written in Actionscript 1.0, 2.0, and 3.0, record the scores, 
	and display the high scores at the end.
	<img src="/img/portfolio/bys-football.png" alt="" class="right" style="margin-top: 6px; margin-left: 2px;" />
	</p>
	
	<p>I worked with two different studios on this project to bring the new site and games online in an extremely tight schedule. This included learning all three versions of ActionScript in a single week.</p>
	<p>Technologies: Drupal, Flash, ActionScript 1.0, ActionScript 2.0, ActionScript 3.0, PHP</p>

	<h2><a href="http://turtlest.com/" name="turtlest">Turtle St. Bed and Breakfast &amp; Extended Stay</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/turtlest.png"><img src="/img/portfolio/thumbs/turtlest.png" alt="" class="right" /></a>
	We launched a WordPress based website for the Turtle St. B &amp; B to use as blog and contact site advertising their Bed and Breakfast and Extended stay offerings as well as other attractions local to Syracuse, NY.</p>
	<p>Technologies: WordPress, HTML, CSS, PHP, Google Maps</p>
	
	<h2><a name="onetouchart" href="http://www.onetouchart.com/">One Touch Art</a></h2>
	<p><a rel="lightbox" title="" href="/img/portfolio/onetouchart.png"><img src="/img/portfolio/thumbs/onetouchart.png" alt="" class="left"></a>
	I assisted in the sites development, providing various tweaks, bug fixes, and performance optimizations including JavaScript Event Delegation, rate limiting, caching, and gzip compression.
	<p>Technologies: JavaScript, CSS, Apache, mod_deflate, mod_expires</p>
  
	<h2><a href="http://www.veryfine.com/" name="veryfine">Veryfine Products</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/veryfine.jpg"><img src="/img/portfolio/thumbs/veryfine.jpg" alt="" class="left" /></a>
	I built the Veryfine product database and search system including the Nutrition Facts CSS. I also enhanced the site's design to include support for older browsers. </p>
	<p>Technologies: PHP, MySQL, jQuery, Javascript, CSS, Flash</p>
   
	<h2><a name="nodeunblocker" title="free anonymouse web proxy" href="http://nodeunblocker.com/">Node Unblocker</a></h2>
	<p><a rel="lightbox" title="" href="/img/portfolio/nodeunblocker.png" class="right"><img src="/img/portfolio/thumbs/nodeunblocker.png" alt="" /></a>
	My second web proxy, this one built in node.js and designed from the ground up to be faster and compatible with more sites - try out Google Instant Search for an example.</p>
	<p>It modifies the data on the fly instead of downloading the entire page, then parsing it, then passing it along to the user.</p>
	<p>Open Source: <a href="https://github.com/nfriedly/node-unblocker">https://github.com/nfriedly/node-unblocker</a></p>
	<p>Technologies: node.js, JavaScript, Heroku, streaming data, Apache Reverse Proxy</p>

	<h2><img src="/img/sunnyd.jpg" alt="SunnyD" class="left" /><a href="http://sunnyd.com/bookspree" name="sunnyd">SunnyD Book Spree</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/sunnyd.jpg"><img src="/img/portfolio/thumbs/sunnyd.jpg" alt="" class="right" /></a>
	I built their backend to record user submissions and made the front-end display a printable form with the user's information pre-filled.</p>
	<p>Technologies: PHP, MySQL, CSS, HTML</p>
	<div class="clear"></div>
	
	<h2><a href="http://nfriedly.com/techblog/2010/07/swf-for-javascript-cross-domain-flash-cookies/">SwfStore - a JavaScript Library for Cross-Domain Flash-Cookies</a></h2>
	<p><img class="left" width="160" src="http://nfriedly.com/techblog/wp-content/uploads/2010/07/325990_chocolate_chip_cookies_2.jpg" alt="" />
	This is a library that allows JavaScript to read and set cookies cross-domain by using flash.</p>
	<p>We needed this for one of my projects and I was surprised to find that no such library already existed. So I created it and, with my employer's permission, released it under an MIT license.</p>
	<p>Open Source: <a href="http://github.com/nfriedly/Javascript-Flash-Cookies">http://github.com/nfriedly/Javascript-Flash-Cookies</a></p>
	<p>Technologies: JavaScript, Flash / SWF / ActionScript 3.0</p>

	<h2><a href="http://www.elations.com/categories/buy-elations/findcostco.php" name="elations">Elations GeoIP and Costco store locator</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/elations.jpg"><img src="/img/portfolio/thumbs/elations.jpg" alt="" class="right" /></a>
	I worked with the MaxMind GeoIP service to provide a location based home page as well as a store locator that integrates with Google Maps. </p>
	<p>Technologies: MaxMind, GeoLocation, Google Maps API, Javascript, PHP</p>

   <h2><a name="whatsmyua" href="http://whatsmyua.com">What's my User Agent?</a></h2>
   <p><a rel="lightbox"  href="/img/portfolio/whatsmyua.png"><img  src="/img/portfolio/thumbs/whatsmyua.png" alt="" class="left" /></a>
   Reports the visitors UserAgent string and also breaks it down and explains each portion of the string. 
   The site also provides simple, user and search-engine friendly links to view or share the breakdown of other UA strings.</p>
   <p>Designed to be friendly on mobile browsers and other small screens. 
   Built in two days using Ruby on Rails and the Blue Trip CSS framework.</p>
   <p>Technologies: Ruby on Rails, BlueTrip, SQLite</p>
   
   <h2><a href="http://jfriedly.com" title="Computer Science Ninjaneer">Joel Friedly</a></h2>
   <p><a rel="lightbox" href="/img/portfolio/jfriedly.png"><img class="left" alt="" src="/img/portfolio/thumbs/jfriedly.png" /></a>
   My brother's personal website that he put together, but I helped out with a few of the CSS and caching details.</p>
   <p>Technologies: WordPress, WP Super Cache, CSS</p>
   <div class="clear"></div>
   
   <h2><a name="fbt_status"></a>Embeddable Twitter & Facebook Posting and Interaction Tool</h2>
   <p><img class="right" alt="" src="/img/portfolio/dmavs.png" /> I built a tool for updating Facebook and Twitter pages that also helped find and respond to posts from fans. It has been used by several businesses and sports teams.</p>
   <p>The tool is entirely JavaScript based, and can thus be easily embedded into various websites regardless of the backend technology.</p>
   <p>Technologies: JavaScript, Facebook API, Twitter API, CSS.</p>
  
    <h2><a href="/pagerank" name="pagerank">Google Pagerank Lookup Tool v1</a></h2>
	<div class="right"><a href="/pagerank"  title="PageRank: 7/10" style="text-decoration: none; color: inherit; display: block; padding: 10px; margin-left: 10px; border: 1px solid rgb(204, 204, 204);"><div style="width: 40px; margin-top:7px;" class="prbar"><strong style="width: 70%;"><span></span></strong></div> 7</a></div>
	<p>I needed a reliable pagerank lookup tool and all of the existing ones were unreliable and/or spammy. 
	I built myself a clean, straightforward pagerank lookup tool that allows for multiple urls to be checked at once and also offers a JavaScript bookmarklet to check any individual page.
	</p>
	<p>The tool stores results in an SQLite database to avoid repetedly hitting Google's servers and keeps a "recent history" in the user's session.</p>
	<p>Technologies: PHP, JavaScript, Google, PageRank, HTML, CSS, SQLite</p>
	
    <h2><a href="http://ddgg.nfriedly.com/" name="ddg">Duck Duck Go + Google Suggest OpenSearch Plugin</a></h2>
	<p><img class="left" src="/img/portfolio/ddg.png" alt="" />
	Allows visitors to add a search plugin to their browser's built-in search bar that uses Google Suggestions but preforms the searches on <a href="http://duckduckgo.com">Duck Duck Go</a>.</p>
	<p>It also supports encrypted searches, and has a proxy built with node.js that corrects !bang's that Google removes from it's suggestions. The proxy sits behind a high-performance Nginx server.</p>
	<p>Open Source: <a href="https://github.com/nfriedly/node-bang-suggest">https://github.com/nfriedly/node-bang-suggest</a></p>
	<p>Technologies: Nginx, Node.js, JavaScript, OpenSearch</p>
  
  	<h2><a href="http://www.backyardsports.com/gamestop" name="bys">Backyard Football '10 Promotion</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/bys.png"><img src="/img/portfolio/thumbs/bys.png" alt="" class="right" /></a>
	I created the MySQL database and updated the PHP / AJAX registration process for the Football 2010 GameStop promotion.  </p>
	<p>Technologies: jQuery, ThickBox, AJAX, Javascript, PHP, MySQL</p>

	<h2><a href="http://wealth-innovations.com/" name="wealthi">Wealth Innovations</a><small> - Warning: Music auto-plays.</small></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/wealth-innovations.jpg"><img src="/img/portfolio/thumbs/wealth-innovations.png" alt="" class="left" /></a>
	We built a new website for Wealth Innovations using embedded fonts, AJAX navigation, and an animated user interface to create a standards-based experience on par with flash websites.</p>
	<p>Technologies: jQuery, AJAX, Javascript, Embedded OpenType Fonts (.otf &amp; .eot), HTML, PHP</p>

	<h2><a href="http://standardpub.com" name="standardpub">Standard Publishing</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/standardpub.jpg"><img src="/img/portfolio/thumbs/standardpub.png" alt="" class="right" /></a>
	I updated their Flashed based header and image-rotator to a Search-Engine-Friendly, easier to manage version build with jQuery, HTML, and CSS.</p>
	<p>Technologies: jQuery, Javascript, CSS, HTML</p>

	<h2><a href="/stuff/rss/" name="rss-xslt">RSS XSLT Theamer</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/rss-xslt.png"><img src="/img/portfolio/thumbs/rss-xslt.png" alt="" class="left" /></a>
	I researched how different browsers handle RSS feeds and found work-arounds to display RSS with XSLT stylesheets in Firefox and Internet Explorer.</p>
	<p>Read more about it on the tech blog: <a href="http://nfriedly.com/techblog/2009/06/how-to-use-xslt-to-style-an-rss-feed/">How to use XSLT to style an RSS feed</a></p>
	<p>Technologies: RSS, XSLT, Javascript, CSS</p>

	<h2><a name="lavishgiving">Lavish Giving</a></h2>
	<p><a rel="lightbox" title="LavishGiving.com"  href="/img/portfolio/lavishgiving.png"><img src="/img/portfolio/thumbs/lavishgiving.png" alt="" class="right" /></a>
	I worked with Apache mod_rewrite and Pinnacle Shopping Cart to give the site search-engine friendly urls. I also edited the WordPress template.</p>
	<p>Technologies: e-Commerce, Pinnacle Cart, SEO, mod_rewrite, WordPress</p>

	<h2><a href="/techblog" name="techblog" >Technical Blog  &amp; Custom Wordpress Theme</a></h2>
	<p><a rel="lightbox" title="nFriedly Web Development Tech Blog"  href="/img/portfolio/techblog.png"><img src="/img/portfolio/thumbs/techblog.png" alt="" class="left" /></a>
   I regularly write technical articles on javascript, php, and web development related issues for the <a href="/techblog">tech blog</a>.</p>
	<p>I built the wordpress theme to integrate with the rest of my site and take advantage of several wordpress features including tags, comments, gravitars, and plugins.</p>
	<p>Technologies: WordPress, PHP, XHTML, CSS, Gravitars</p>
	
	<h2><a href="/stuff/africa/" name="africa">African Design / Theme</a></h2>
	<p><a href="/img/portfolio/africa.png" title="" rel="lightbox"><img src="/img/portfolio/thumbs/africa.png" alt="" class="right"></a>
	A design I put together with a bit of help from a tutorial. (When it comes to design, I have taste, but not as much skill.) I might make it into a free template some day.</p>
	<p>Technologies: Photoshop, HTML, CSS</p>
	
	<h2><a name="tmm" href="http://twittermentionmonitor.com/">Twitter @Mention Monitor</a></h2>
	<p>A service I put together to monitor the user's @mentions and forward them to the user as a Direct Message (DM) for faster notification. Built using Ruby on Rails and Twitter's OAuth authentication.</p>
	<p>Technologies: Ruby on Rails, Twitter, OAuth, BlueTrip CSS framework</p>

	<h2><a name="bmw">BMW Invoice</a></h2>
	<p><a rel="lightbox" title="BMW Invoice"  href="/img/portfolio/bmwinvoice.jpg"><img  src="/img/portfolio/thumbs/bmwinvoice.png" alt="" class="left" /></a> <img class="right" alt="" src="/img/portfolio/thumbs/bmw_flipped.png" />I did the complete online index, pricing, and management system for this site.</p>
	<p>Technologies: PHP, Javascript, CodeIgniter, &amp; jQuery</p>
	
	<h2 class="clear"><a name="creditcard" href="/client">Credit Card Invoicing System</a></h2>
	<p>This is what I use for my clients. Log in and try it out.</p>
	<p>Username: <b>demo</b><br />
	Password: <b>demo</b></p>
	<p>Technologies: e-Commerce, PHP, CodeIgniter</p>
	
	<h2><a name="twitter" href="/demos/twitter">Twitter Integration Demo</a></h2>
	<img alt="twitter bird" title="" class="right" src="/img/twitter.png" />	
	<p>From simply showing your status on your website to an advanced controller that will post your news, follow your followers, and respond to inquiries.</p>
	<p>Read more about it on the tech blog: <a href="http://nfriedly.com/techblog/2009/06/javascript-security-ajax-json-and-twitter-callbacks/">How AJAX Security and Twitter callbacks work</a></p>
	<p>Technologies: Twitter, PHP, Javascript, AJAX, JSON, jQuery, CodeIgniter</p>
	
	<h2><a name="cs" rel="nofollow" href="/stuff/ctrl-click">Portfolio for Christopher S.<?php /*killicorn*/ ?></a></h2>
	<p><a rel="lightbox" Title="Design Portfolio" href="/img/portfolio/ctrl-click.jpg"><img src="/img/portfolio/thumbs/skillicorn.png" alt="" class="left" /></a> I took his photoshop design and coded it into clean XHTML & CSS</p>
	<p>Technologies: XHTML &amp; CSS, Photoshop</p>
	
	<h2 class="clear"><a name="tt" href="http://my.iboomerang.com/email">AJAX email templating system</a></h2>
	<p>Loads templates and sender information, allows you to modify the template, then sends the email, all via AJAX. Also allows you to schedule e-mails to be sent in the future.</p>
	<p>Username: <b>demo</b><br />
	Password: <b>demo</b></p>
	<p>Technologies: PHP, Javascript, AJAX, XML, YUI</p>
	
	<h2 class="clear"><a name="wmpllc" href="http://wmpllc.com">Wealth Management Partners LLC</a></h2>
	<p><a rel="lightbox" title="Wealth Management Partners" href="/img/portfolio/wmpllc.jpg"><img src="/img/portfolio/thumbs/wmp.jpg" alt="" class="left"></a> 
	I built this website from scratch. The home page imports the owners twitter and blog RSS feed. The site also features a complex menu, integrated google search, an amazon.com library, and a client area where the owners can provide private information.</p>
	<p>Technologies: PHP, CodeIgniter, Javascript, Twitter, RSS</p>
	
	<h2><a href="http://screwbeingsingle.com/" title="Unblock proxy sites" name="sbs">Free Anonymous Web Proxy</a></h2>
	<p>This is my contribution to support it on the internet. The Proxy allows browsers to bypass government firewalls and filters and access blocked websites. 
	It's based on the free PHProxy server with a few enhancements to allow data: URI's and filter out a few unsavory categories of sites.</p>
	<p>Technologies: PHP, PHProxy, cURL, Data URI scheme</p>

	
	<h2 class="clear"><a name="autosetup" href="https://iboomerangsales.com">Account Auto-Setup from Shopping Cart</a></h2>
	<p><a rel="lightbox" title="iBoomerang" href="/img/portfolio/iBoomerang-Shopping-Cart.gif"><img src="/img/portfolio/thumbs/autosetup.png" alt="" class="right" /></a>
	The automatic setup system I built for iBoomerang. When a customer signs up for a new tool, if they are a current customer, it adds the tool to their account, otherwise it creates them a new account.</p>
	<p>The Cart 32 shopping cart system is a closed source system, so the auto-setup system works entirely through javascript in the templates that scrapes the users information and submits it to a PHP API I built.</p>
	<p>You can see it live, but only if you buy something.</p>
	<p>Technology: e-Commerce, PHP, Javascript, jQuery, AJAX, JSON, API development, Cart 32</p>
  
    	<h2><a rel="lightbox" href="/img/portfolio/clay.png" name="clay">Large Clay Products Website</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/clay.png"><img src="/img/portfolio/thumbs/clay.png" alt="" class="left" /></a>
	I oversaw a five-man team that rebuilt the shopping cart and database of a major clay products website.</p>
  <p>The cart was designed from the ground up to handle their catalogue of over 10,000 products. 
  It included a powerful meta-data based search engine, automatically generated navigation, and a full-featured administration area.</p>
  <!-- p>Unfortuinately the owners killed the project for unrelated reasons and it never saw the light of day.</p -->
	<p>Technologies: e-Commerce, PHP, Javascript, jQuery, MySQL, Cart32, IIS 6.0, IIS 7.0, Microsoft URL Rewrite module 2.0, CodeIgniter</p>
	<div class="clear"></div>
	
	<h2><a name="usabg" href="http://usabghome.com">USA Benefits Group Agent Back Office & Sales Tracker</a></h2>
	<p><a rel="lightbox" title="A collage of several areas I worked on." href="/img/portfolio/USABG-Sales-Reporting.jpg"><img src="/img/portfolio/thumbs/usabg.png"  alt="" class="right" /></a>A comprehensive agency management system with extensive sales tracking and reporting. The sales numbers are also used regularly for contests and rewards.</p>
	<p>Technology: PHP, Javascript, AJAX, YUI</p>
	

	<h2><a name="estimate" href="/estimate">Instant Estimate / Quote Form</a></h2>
	<a rel="lightbox" title="<a href='/estimate'>See it live</a>" href="/img/portfolio/Instant-Estimate.png"><img src="/img/portfolio/thumbs/instantestimate.png" class="left" alt="" /></a>
	<p>Gives you a ballpark price for development services.</p>
	<p>Technologies: PHP, Javascript, DHTML, YUI</p>
	
	<h2 class="clear"><a name="facebook" href="http://www.facebook.com/pages/Cincinnati-OH/nFriedly-Web-Dev/188519495205">Facebook Page</a></h2>
	<img src="/img/portfolio/facebook.png" alt="" class="right" />
	<p>A great way to market yourself and get new business.</p>
	<p>Technologies: Facebook</p>
	
	<h2><a href="https://iboomerangsales.com/tools/shortcut.php">Instant Domain Name Availability Lookup</a></h2>
	
	<p><a rel="lightbox" title="I have worked on a variety of projects for iBoomerang" href="/img/portfolio/iBoomerang.jpg"><img src="/img/portfolio/thumbs/iboomerang.jpg" class="left" alt="" /></a>Searches as you type. Uses an in-house lookup system, but could easily be adapted to a 3rd party API.</p>
	<p>Technologies: Whois, PHP, Javascript, AJAX, JSON, jQuery</p>
	
	<h2 class="clear"><a name="fellowship" href="/fellowship">Google Maps &amp; Charts APIs</a></h2>
	<p>Display data and maps in smart and intuitive manners.</p>
	<p>Technologies: Javascript, Google Maps API, Google Charts API</p>

	<h2><a name="agentsupplies" href="http://agentsupplies.com">Agent Supplies</a></h2>
	<p><a rel="lightbox" title="e-Commerce site for insurance agent supplies and equipment." href="/img/portfolio/agentsupplies.png" ><img class="right" src="/img/portfolio/thumbs/agentsupplies.png" alt=""></a>
	Zen Cart based website with a customized template. I handled instillation, security, and maintenance and also moved the site from it's original Linux/Apache server to a Windows/IIS for the client.</p>
	<p>Technologies: e-Commerce, SSL, LAMP, linux, apache, windows, IIS</p>
	
	<h2><a href="http://air-force-game.nfriedly.com">Air Force Game</a></h2>
	<p>A existing browser-based game that I fixed a few bugs in, added a letterboard, and re-hosted it on appfog.</p>
	<p>Technologies: PHP, MySQL, JavaScript, AppFog / Cloud Foundry</p>
	
	<h2><a name="eoc" href="/eoc">URL Translation</a></h2>
	<p>Proxies folding@home signature images through a modified url so that forums will accept them.</p>
	<p>Example:<br />
	<img src="http://nfriedly.com/eoc/408666/whatever.gif" alt="" /></p>
	<p>Technologies: PHP, HTTP, CURL</p>
	
	<h2><a name="contact" href="/contact">Spam-free contact page</a></h2>
	<p>Keeps my info away from spammers without giving legitimate users any extra hoops to jump through. (Such as impossible-to-read image captchas.) Also toggles extra info to keep the page visibly clean. </p>
	<p>Read more about it on the tech blog: <a href="http://nfriedly.com/techblog/2009/06/how-to-build-a-spam-free-contact-forms-without-captchas/">How to build a spam-free contact form without captchas</a></p>
	<p>Technologies: PHP, Javascript, jQuery, CSS</p>
	
	<!-- <a name="seo" href="http://racknmore.com"></a> -->
	<h2>Rack n More</h2>
	<p><img src="/img/portfolio/thumbs/racknmore.jpg" alt="" class="left">
	Racn n' More sells new and used industrial shelving and storage equipment including pallets and forklifts. 
	I did marketing and SEO consulting.</p>
	<p>Technologies: e-Commerce, SEO, Meta Tags, Keywords</p>

	<h2 class="clear">Youman's Construction Services</h2>
	<p><a rel="lightbox" href="/img/portfolio/ycs.png"><img src="/img/portfolio/thumbs/ycs2.png" alt="" class="right"></a>
	YCS does customized new home construction preforming some of the work directly and overseeing contractors for the reaming portion. I supported their email and contact form.</p>
	<p>Technologies: email, html</p>

	<h2 class="clear"><a name="greenweavers">Greenweavers Organics</a></h2>
	<p>Shopping cart and email instillation and maintenance. Site was based on the Zen Cart open source shopping cart system with a custom theme. </p>
	<p>Technologies: e-Commerce, email</p>
	
	<h2 class="clear"><a name="ofa" href="http://outreachforanimals.org/">Outreach for Animals</a></h2>
	<p><img src="/img/portfolio/thumbs/outreachforanimals.jpg" alt="" class="right"> I built Outreach custom Content Management System (CMS) that included a Rich Text Editor, a Lightbox Photo Gallery, and a Shopping Cart with Paypal integration.</p>
	<p>Technologies: PHP, Prototype, FCKEditor, e-Commerce, Paypal, Lightbox</p>

	<h2 class="clear"><a name="fellowlaborers" href="http://fellowlaborers.org/">Fellowlaborers</a></h2>
	<p><img src="/img/portfolio/thumbs/fellowlaborers.jpg" alt="" class="left">I set up and managed the blog for the ministry / mentoring / leadership training program I was a part of during 2008-2009.</p>
	<p>Technologies: WordPress</p>
	
	<h2 class="clear"><a name="blb" href="/blb/">Blue Letter Bible search plugin</a></h2>
	<img class="right" src="http://www.blueletterbible.org/gifs/blb_menu/m_head2D.gif" alt="" />
	<p>I wanted to be able to search the Blue Letter Bible website from my browser, so I built a search plugin. Compatible with Firefox 2+ and Internet Explorer 7+.</p>
	<p>Technologies: OpenSearch</p>

	<h2 class="clear"><a name="blb" href="/stuff/bubblegum/">Bubble Gum Blowers Group</a></h2>
	<p><a rel="lightbox" title=""  href="/img/portfolio/bubblegum.jpg"><img src="/img/portfolio/thumbs/bubblegum.jpg" alt="" class="right"></a>
	This shows off my more creative side! It's a website I made for my CIS 131 class at Sinclair for my Web Development Degree.</p>
	<p>Technologies: YouTube, XHTML, CSS, Javascript, CurvyCorners</p>

	<h2 class="clear"><a name="tls" href="/stuff/Nathan_Friedly_SSL_TLS.doc">SSL &amp; TLS (.doc)</a></h2>
	<p>Explains TLS 1.0 down to the individual bits and bytes. Was written for my CIS 224 class at Sinclair for my Network Engineering Degree.  </p>
	<p>Technologies: SSL 3.0, TLS 1.0, Network Protocols, RFCs</p>
	
<br /><br /><br />
<p><a href="/webdev">Web Development</a> &gt; <a href="/portfolio">Portfolio</a></p>
	
<?php 

// I don't think that these guys are the actual image source
//$GLOBALS['extracredit'] = 'Twitter graphic from <a href="http://www.mediabistro.com/prnewser/original/twitter-bird.png">mediabistro.com</a>'; 

$GLOBALS['afterFooter'] = '

<script type="text/javascript" src="/scripts/lightbox/lightbox-min.js"></script>
<link rel="stylesheet" type="text/css" href="/scripts/lightbox/lightbox.css" />

';
?>

	
<?php include(APPPATH . 'views/footer.php'); ?>
