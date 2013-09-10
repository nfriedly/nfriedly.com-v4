<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1735765-19']);
  _gaq.push(['_trackPageview' <?= (isset($mp_url))? ", '/" . tr($mp_url) . "'":'' ?>]); // give a correct pageview to google if possible, with the domain as the top folder
  <?php if(isset($mp_domain) && isset($mp_url)): ?>
  _gaq.push(['_trackEvent','pageview', '<?=tr($mp_domain)?>', '<?=$mp_url?>']);
  <?php endif; ?>
  
  try{ // browser security models can break this sort of thing
    if(parent && parent.location){
      _gaq.push(['_trackEvent','parent',parent.location.href]);
    }
  } catch(ex){
    _gaq.push(['_trackEvent','error',ex.message]);
  }

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php 

function tr($url){
	$url = preg_replace('/https?:\/\//i', '', $url);
	$url = str_replace('www.','',$url);
  $url = strtolower($url);
	return $url;
}

/*
if(isset($mp_name)): 


	$params = array(
		'ssl' => ($_SERVER['SERVER_PORT']!=443) ? 'on' : 'off',
    'script' => $mp_name
	);
	if(isset($mp_domain)){
		$params['domain'] = tr($mp_domain);
	}
	if(isset($mp_url)){
		$params['url'] = tr($mp_url);
	}	

	? >
	
<script type='text/javascript'> var mp_protocol = (('https:' == document.location.protocol) ? 'https://' : 'http://'); document.write(unescape('%3Cscript src="' + mp_protocol + 'api.mixpanel.com/site_media/js/api/mixpanel.js" type="text/javascript"%3E%3C/script%3E')); </script> <script type='text/javascript'> try {  var mpmetrics = new MixpanelLib('76d3c3cf1e118ca215b5f8e8141a3d07'); } catch(err) { null_fn = function () {}; var mpmetrics = {  track: null_fn,  track_funnel: null_fn,  register: null_fn,  register_once: null_fn, register_funnel: null_fn }; } </script>
<script type="text/javascript">
mpmetrics.track("pageview", < ?= json_encode($params); ? > );
</script>

< ?php endif;  */ ?> 