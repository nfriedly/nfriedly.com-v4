<?php

$title = "Cincinnati Home Bible Fellowship";

$keywords = "cincinnati,oh,bible,bog,christian,home,church,fellowship,ekklesia";

$description = "Church in the home, just like they did in Acts. ";

// calculate when the next fellowship will be
/*
$next_time = strtotime('Third Wednesday '.date('F o'));
if(time() > $next_time) $next_time = strtotime('Third Wednesday '.date('F o',strtotime("+1 Month")));
$next = date('l, F jS',$next_time);
$next_short = date('D. F jS', $next_time);
*/

include(APPPATH . 'views/header.php');
  
  
 ?>
<p style="margin-top:0;">&nbsp;</p>

<div class="hilight"><?php /*<b>Next fellowship at my apartment: <?=$next?></b>
<p>Wednesday night is the rotating fellowship night. It will be at my apartment on the 3rd wednesday of every month. The other Wednesdays locations are still being finalized.</p> */ ?>
<p>Jonathon Pettit is currently holding a weekly fellowship here in Cincinnati. Get in touch with me for <a href="/contact">more information.</a></p>
</div> 



<h1>Home Bible Fellowship</h1>

<img class="right" alt="Percentage of your life that god wants" title="" src="http://chart.apis.google.com/chart?chs=250x120&chd=t:100&cht=p3&chl=100%25&chtt=Percentage%20of%20your%20life%20God%20wants" />

<p>Everyone's welcome. My desire is to share God's word and bless people's lives.</p>

<h2>What it is</h2>

<p>Fellowship in my home typically includes someone sharing their heart, testimony, and knowlege of God's word. Time is also set aside for prayer. </p>

<p>Occasionally I cook dinner for everyone, and sometimes we just have a game night or a movie night.</p>

<h2>What it means</h2>

<p>The word "fellowship" means enjoying one another's company. Biblically it means "partnership" or "full sharing" - the believers shared in each others lives. </p>

<p>It's a Christian meeting, but there's no denomination associated with it.</p>

<?php /*
<!--
<h2>Background</h2>

<p>For my entire life, my family has met in homes, ours or someone else's, for fellowship.</p>
<p>What goes on at these meetings varies but there's usually someone to teach the Bible, some time for prayer, and, as the name suggests, some time to fellowship with the other people there. They may also have food, singing, and any variety of other things.</p>
-->


<div class="right" id="map_canvas" style="width: 370px; height: 300px; text-align:left; margin-left:10px;"></div>

<h2>When and Where?</h2>
<p>Currently, we are meeting in my home on the <b>4th Wednesday of every month at 7:30 PM</b>. There are also other local fellowships on other nights.</p>

<p>My Address is:</p>

<noscript><p>Please enable javascript or contact me through <a href="/contact">this form</a> to see this information.</p></noscript>

<p id="addy"></p>

<p><a id="maplink" >See a bigger map</a></p>

<p>One of two building entrances has a paging system. For the other you have to call my cell: <br />
<b id="celly"></b></p>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAWMsuqAAoJe0vLYg5hsR_RhSOpBqeijn_PFXyh9G70yoMxuLEGxQp76oyfuI3ixXHxHGC_R4Z3BMQ3w" type="text/javascript"></script>
<script src="/scripts/nfo.js" type="text/javascript"></script>
<script type="text/javascript">
n.next_fellowship = {};
n.next_fellowship.time = new Date();
n.next_fellowship.time.setTime(<?=($next_time*1000)?>);
n.next_fellowship.str = "<?=$next_short?>";
</script>
<script src="/scripts/fellowship.js" type="text/javascript"></script>

*/ ?>

<?php include(APPPATH . 'views/footer.php'); ?>


