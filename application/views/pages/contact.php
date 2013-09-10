<?php 

$title = "Contact Nathan Friedly";

include(APPPATH . 'views/header.php'); 

 $GLOBALS['extracredit'] = 'Photo by <a href="http://www.sxc.hu/photo/762811">Carlos Paes</a>'; ?>

<style type="text/css">

td input {
	width:220px;
}

textarea {
	width:290px;
	height:180px;
}
.indent td{
	padding-left:8px;
}
#contactform, #contactinfo {
	float:left;
}
#contactform {
	width:300px;
}

#contactinfo {
	width:240px;
	margin-left:5px;
	padding-left:14px;
	background:url('/img/vr.gif') top left no-repeat;
}

#contactinfo table {
	margin: 10px 0 10px 0;
	line-height: 18px;
}
</style>


<div id="contactform">
	<h1>Contact Nathan</h1>
	<form method="post" action="/submit">
		<input type="hidden" name="form" value="contact" />
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
		<p class="sb">Leave this alone:</p>
		<p class="sb"><input name="website" /></p>
		<textarea name="message"></textarea>
		<input type="hidden" name="referer" value="<?=(isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:''?>" />
		<input type="submit" value="Send" />
	</form>
</div>

<div id="contactinfo">
	<h1>Or reach me directly</h1>
	<table>
		<tr class="indent">
			<td width="36">Email:</td> 
			<td id="nemail"><noscript>Please enable javascript</noscript></td>
		</tr>
		<tr class="indent">
			<td>Office:</td>
			<td id="onum"></td>
		</tr>
		<tr class="indent">
			<!-- td>Cell:</td>
			<td id="cnum"></td -->
			<td>Fax:</td>
			<td id="fnum"></td>
		</tr>
	</table>
	
	<img src="/img/contact.jpg" alt="" />
</div>

<div class="clear"></div>

<br />

<h3 id="moreinfo_title"><div id="arrow" class="left rightarrow"></div><a href="#more">Instant Messengers, Skype</a></h3>

<div id="moreinfo" style="display:none;">

	<table>
		<tr>
			<td width="50">AIM:</td>
			<td width="255"><a href="aim:goIM?screenname=nfriedly&message=howdy!">nfriedly</a></td>
			<!-- td width="36">Fax:</td>
			<td id="fnum"></td -->
		</tr>
		<tr>
			<td>Yahoo:</td>
			<td><a href="http://edit.yahoo.com/config/send_webmesg?.target=nfriedly&.src=pg">nfriedly</a></td>
		</tr>
		<tr>
			<td>MSN:</td>
			<td id="msn"></td>
		</tr>
		<tr>
			<td>GTalk:</td>
			<td id="gtalk"></td>
		</tr>
		<tr>
			<td>Skype:</td>
			<td>
          <a id="skype" href="#"></a>
          <?php /* skype button - script in footer
          <a href="skype:nathan.friedly?call"><img valign="middle" src="http://mystatus.skype.com/smallclassic/nathan.friedly" alt="" /></a>
          */ ?>
			</td>
		</tr>			
	</table>

</div>


<div class="clear"></div>

<?php 
// <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
$GLOBALS['afterFooter'] = '
<script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAWMsuqAAoJe0vLYg5hsR_RhSOpBqeijn_PFXyh9G70yoMxuLEGxQp76oyfuI3ixXHxHGC_R4Z3BMQ3w"></script>
<script type="text/javascript" src="/scripts/nfo.js"></script>
<script type="text/javascript" src="/scripts/contact.js"></script>';

?>

<?php include(APPPATH . 'views/footer.php'); ?>
