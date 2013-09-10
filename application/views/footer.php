<?php if(!isset($nomenu) || !$nomenu): ?>
	</div> <!-- /content -->
    <div class="clear"></div>
<?php endif; ?>

</div> <!-- /container -->
</div> <!-- /container-main -->

<div id="container-footer">
	<div id="footer">
		<div class="column left">
	       		&copy; <?=date('Y')?> Nathan Friedly<br />
				
				Site design by <a href="http://www.charleyskira.com"><img src="/img/charleyskiralogo.gif" align="absmiddle" height="18" width="65" border="0" alt="Charley Skira" /></a>
				
				<?php if(isset($GLOBALS['extracredit'])){ echo "<br />$GLOBALS[extracredit]"; } ?>
		</div>
		<div style="float:left; width: 20px;">&nbsp;</div>
		<div class="column left center">
			<a href="/">Home</a>
			| <a href="/webdev">Web Development</a>
			<br />
			<a href="/contact">Contact</a>
			| <a href="/techblog/">Tech Blog</a>
			| <a href="/sitemap">Sitemap</a>
		</div>
		<div style="float:left; width: 20px;">&nbsp;</div>
		<div class="column left">
        	<?php if( isset($this) && isset($this->session) && $this->session->userdata('loggedin')): ?>
            You are logged in as <?=$this->session->userdata('fname')?> <?=$this->session->userdata('lname')?>.<br /> <a href="/client/">Client Home</a> | <a href="/client/logout">Log Out</a>
            
            <?php else: include 'login.php'; endif; ?>
		</div>
	</div>
</div> <!-- /container-footer -->

<?php if(isset($GLOBALS['afterFooter'])){ echo $GLOBALS['afterFooter']; } ?>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1735765-3");
pageTracker._trackPageview();
} catch(err) {}</script>

<!-- 
<script type='text/javascript'> var mp_protocol = (('https:' == document.location.protocol) ? 'https://' : 'http://'); document.write(unescape('%3Cscript src="' + mp_protocol + 'api.mixpanel.com/site_media/js/api/mixpanel.js" type="text/javascript"%3E%3C/script%3E')); </script> <script type='text/javascript'> try {  var mpmetrics = new MixpanelLib('f9396fdc93a94c71e178b275d41bad01'); } catch(err) { null_fn = function () {}; var mpmetrics = {  track: null_fn,  track_funnel: null_fn,  register: null_fn,  register_once: null_fn, register_funnel: null_fn }; } </script>
<script type='text/javascript'>
mpmetrics.track('pageview', { 'url': window.location.pathname, location:'main' }); 
</script>
-->


</body>
</html>