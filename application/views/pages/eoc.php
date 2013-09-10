<?php 

$title = "Add .gif to EOC signature images for forum BBCode [img]'s";

include(APPPATH . 'views/header.php'); 

?>

<div style="font-size: 13px; background: #ff9366; border:2px solid #e9000b; border-radius: 10px; padding: 15px 10px; text-align:center; margin: 30px 20px;" >
 <b>The EOC Image Proxy is no longer available.</b>
 <br>
 <br>Please use the <a href="http://folding.extremeoverclocking.com/?nav=IMAGES">"Alternate Method" on the EOC website.</a>
 <br>
 <br>(I am switching to a completely static website to reduce hosting expenses. If you would like a copy of the source code for this tool, please <a href="/contact">contact me</a>.)
</div>

<div style="background-color:#888888; opacity:0.7; padding: 10px;">
<h1>How to use your ExtremeOverclocking.com folding@home Sig Images on forums</h1>

<h2>Background</h2>
<p>Some forums, such as <a href="http://www.maximumpc.com/forums/viewtopic.php?t=85995">Maximum PC's</a> do not allow images to be posted unless the url ends in .gif, .jpg, or .png. This fixes that.</p>

<p>The image is proxied, as well as the Date, Expires, and Last-Modified headers to keep from hitting their servers too often.</p>

<h2>Prerequisites</h2>
<p>First, find your EOC UserID:</p>
<ol>
	<li>Go to <a href="http://folding.extremeoverclocking.com/">folding.extremeoverclocking.com</a> and find your stats page by using the search feature.</li>
	<li>Your url will look something like http://folding.extremeoverclocking.com/user_summary.php?s=&amp;u=408666, but the number at the end will be different. That number is your EOC UserID.</li>
</ol>

<h2>Get your Image</h2>
<p>Enter your EOC UserID here and click Go:</p>

<p><input name="userid" id="userid" value="408666" /> <input name="go" id="go" value="Go" type="submit" /></p>

<p>Forum Code:</p>

<p><input name="code" id="code" value="[img]http://nfriedly.com/eoc/408666/whatever.gif[/img]" onclick="this.select();" size="60" /></p> 

<p>Preview:</p>
<p><img id="img" src="/eoc/408666/whatever.gif" alt="" /></p>


<h3>Show:</h3>

<p id="layouts">
	<label><input type="radio" name="layout" value="0" checked="checked"> Both User and Team Stats</label>
	<br /><label><input type="radio" name="layout" value="1"> User Stats Only</label>
	<br /><label><input type="radio" name="layout" value="2"> Team Stats Only</label>
</p>

<h3>Colors:</h3>
<p id="colors">
	<label><input name="c1" data-hex="true" /> Default Text Color</label>
	<br /><label><input name="c2" data-hex="true" /> Background Body Color</label>
	<br /><label><input name="c3" data-hex="true" /> Background Header Color</label>
	<br /><label><input name="c4" data-hex="true" /> Border Color</label>
	<br /><label><input name="c5" data-hex="true" /> Override Text Rank Colors</label> (Overrides auto-color rankings)
</p>


<p><strong>More information:</strong> <a href="http://folding.extremeoverclocking.com/?nav=IMAGES">http://folding.extremeoverclocking.com/?nav=IMAGES</a></p>

</div>

	<?php $GLOBALS['afterFooter'] = '
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="/scripts/mColorPicker.js"></script>
	<script type="text/javascript" src="/scripts/eoc.js"></script>';

 include(APPPATH . 'views/footer.php'); ?>