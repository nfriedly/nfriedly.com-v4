<?php

$title = "Instant Estimate - nFriedly Web Development ";

$keywords = "estimate,quote,web,website,developer,programing,php,javascript,design,dev,xhtml,css,twitter,dayton,cincinnati,oh,freelance,code,mysql,database,e-commerce";

$description = "Expert PHP &amp; Javascript / AJAX Web Development. I make your website do what you want.  I endeavor to manage my business in a Godly fashion.";

include(APPPATH . 'views/header.php');


 $GLOBALS['extracredit'] = "";

//'Photos by <a href="http://www.sxc.hu/photo/1011312">Lars Sundström</a> &amp; <a href="http://www.sxc.hu/profile/mterraza">Marcelo Terraza</a>'; 

$GLOBALS['afterFooter'] = '<!-- from http://developer.yahoo.com/yui/articles/hosting/?dragdrop&slider&yahoo-dom-event&MIN -->

<!-- Combo-handled YUI CSS files: --> 
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?2.7.0/build/slider/assets/skins/sam/slider.css"> 
<!-- Combo-handled YUI JS files: --> 
<script type="text/javascript" src="http://yui.yahooapis.com/combo?2.7.0/build/yahoo-dom-event/yahoo-dom-event.js&2.7.0/build/dragdrop/dragdrop-min.js&2.7.0/build/slider/slider-min.js"></script> 

<!-- my code: -->
<script type="text/javascript" src="/scripts/estimate.js"></script>';


/*

$oldie = (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6') !== false || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7') !== false) ? true : false;
 
if(!$oldie) 

*/


?>


<style type="text/css">
/* http://developer.yahoo.com/yui/examples/slider/slider-ticks_clean.html */

	.hidden {
		display:none;
	}
    .slider-bg {
        position: relative;
        background:url(http://developer.yahoo.com/yui/examples/slider/assets/bg-fader.gif) 5px 0 no-repeat;
        height:28px;
        width:228px; 
    }

    .slider-thumb {
        cursor:pointer;
        position: absolute;
        top: 4px;
    }
	
	#star {
		margin-right:100px;
		width:155px;
		height:105px;
		padding-top:50px;
		text-align:center;
		background: url("/img/star.gif") center center no-repeat;		
	}
	
	#total {
		line-height:40px;
		font-family:"Times New Roman", Times, serif;
		font-weight:bold;
		font-size:24px;	
	}
	
	#star i {
		font-size:11px;
	}
</style>

<noscript>
<style type="text/css">
#total {display:none;}
</style>
</noscript>

<?php include '_employed.php' ?>


<?php include APPPATH.'views/pages/'.'_adsense_semi_wide.php'; ?>

<h1>Instant Estimate</h1>
<form action="/submit" method="post">
	<input type="hidden" name="form" value="Estimate Request" />
	
	<p>Click a few things and see what happens!</p>
	
	<p>This page errs on the side of caution, so if you scroll down and submit it, you will get a human estimate that is often a lower number than what you see in the green star.</p>
	
	<div id="star" class="right"><span id="total">$525</span><br /><i>Estimated*</i></div>
	<input type="hidden" id="total-input" name="Estimated Total" value="400" />
	
	<h4>How big will it be?</h4>
	<p id="sitesize-input-container">
		<input id="sitesize-input" name="Site Size" value="1" /> Page(s)
	</p>
	<div id="sitesize-slider-container" class="hidden">
		<p id="sitesize">A single page.</p>
		<div id="sitesize-bg" class="slider-bg">
			<div id="sitesize-thumb" class="slider-thumb"><img src="http://developer.yahoo.com/yui/examples/slider/assets/thumb-n.gif" alt="handle" /></div>
		</div>
	</div>
	
	<h4>How complex will it be?</h4>
	<p id="complexity-input-container">
		<input id="complexity-input" name="Complexity" value="Nothing too fancy." /> (Please elaborate below.)
	</p>
	<div id="complexity-slider-container" class="hidden">
		<p id="complexity-text">Nothing too fancy.</p>
		<div id="complexity-bg" class="slider-bg">
			<div id="complexity-thumb" class="slider-thumb"><img src="http://developer.yahoo.com/yui/examples/slider/assets/thumb-n.gif" alt="handle"  /></div>
		</div>
	</div>
	
	<h4>Check off any additional items that you will need:</h4>
	<p id="extras">
		<input type="checkbox" id="design" name="Design" checked="checked" />A new Design or Theme<br />
		
		<input type="checkbox" id="cart" name="Shopping Cart" />A shopping cart or store<br />
		<input type="checkbox" id="cms" name="CMS" />A Content Management System (CMS) - allows you to edit pages on your site<br />
		<input type="checkbox" id="blog" name="Blog" />A Blog<br />
		<input type="checkbox" id="login" name="User Accounts" />Password protect areas of the site or allow users to login<br />
		
		<input type="checkbox" id="email" name="Site Email" />E-Mail accounts @YourSite.com<br />
		<input type="checkbox" id="rss" name="Twitter or RSS" />Import your Twitter or existing blog
	</p>
	
	<p>Any work I do will include <a href="/webdev">clean valid code</a>, and <a href="http://nfriedly.com/techblog/2009/06/search-engine-optimization-and-marketing-seo-sem/">search engine optimization (SEO)</a>.</p>
	
	<h4>In as much detail possible, please describe your goal to me:</h4>
	<textarea name="message" id="message" style="width:548px;" cols="80" rows="2">

</textarea>

	<!-- img src="/img/hardhat.jpg" alt="" class="right" style="margin-right:30px;margin-top:10px;" / -->	
	<table>
		<tr>
			<td>Your name:</td>
			<td><input name="name" /></td>
		</tr>
		<tr>
			<td>Your email:</td>
			<td><input name="email" /></td>
		</tr>
	</table>
	<p class="sb">Leave this blank: 
	<input class="sb" name="website" value="" /></p>
	
	<input type="hidden" name="referer" value="<?=(isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:''?>" />
	
	<p><input type="submit" value="Send" /></p>

</form>

<p style="font-size:11px; font-style:italic; margin-top:30px;">Estimated* -  by a computer, based on subjective input. Marginally more accurate than most online polls.</p>

<?php include(APPPATH . 'views/footer.php'); ?>
