<?php 

$mysqli = new mysqli("localhost","user","pass","nfriedly");


// check for scores

if(isset( $_GET['score']) && isset($_COOKIE['name']) ){
	$score = $_GET['score'];
	$name = trim(strip_tags($_COOKIE['name']));
	if( is_numeric($score) && $name != "" ){ //&& $score > 5
		$query = sprintf("INSERT INTO bb_afgame (`name`,`score`) VALUES ('%s','%f')",
			$mysqli->escape_string($name),
			$score
		);
		if(!$mysqli->query($query)){
			exit( "Error: $mysqli->error \r\nQuery: $query");
		}
	}
	header("Location: http://nfriedly.com/stuff/afgame/");
	exit();
}

$scores_today = $scores_month = array();

if (mysqli_connect_errno()) {
	printf("<!-- Connect failed: %s\n -->", $db->connect_error());
}else{

	// today
	$date = date("Y-m-d");
	echo '<!-- '."SELECT name,score FROM bb_afgame WHERE timestamp >= '$date' ORDER BY score DESC LIMIT 3 -->";
	if ($result = $mysqli->query("SELECT name,score FROM bb_afgame WHERE timestamp >= '$date' ORDER BY score DESC LIMIT 3")) {
      		while($obj = $result->fetch_object()){
           	$scores_today[] = array('name'=>$obj->name, 'score'=>$obj->score);
       	}
		$result->close();
	}

	// month
	$date = date("Y-m-d",strtotime("-1 month"));
	if ($result = $mysqli->query("SELECT name,score FROM bb_afgame WHERE timestamp >= '$date' ORDER BY score DESC LIMIT 5")) {
      		while($obj = $result->fetch_object()){
           	$scores_month[] = array('name'=>$obj->name, 'score'=>$obj->score);
       	}
		$result->close();
	}

}

$mysqli->close();
?>

<HTML>
<head>
<title>The Worlds Most Addicting Game</title>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">

<meta name="description" http-equiv="description" content="Airforce Game, A.K.A. The Worlds Most Addicting Game" />
<meta name="keywords" http-equiv="description" content="Game, action, online, fun, exciting, brickballs" />

<link rel="stylesheet" href="styles.css" />

</HEAD>

<BODY>

<!-- Project Wonderful Ad Box Loader -->
<!-- Put this after the <body> tag at the top of your page -->
<script type="text/javascript">
   (function(){function pw_load(){
      if(arguments.callee.z)return;else arguments.callee.z=true;
      var d=document;var s=d.createElement('script');
      var x=d.getElementsByTagName('script')[0];
      s.type='text/javascript';s.async=true;
      s.src='//www.projectwonderful.com/pwa.js';
      x.parentNode.insertBefore(s,x);}
   if (window.attachEvent){
    window.attachEvent('DOMContentLoaded',pw_load);
    window.attachEvent('onload',pw_load);}
   else{
    window.addEventListener('DOMContentLoaded',pw_load,false);
    window.addEventListener('load',pw_load,false);}})();
</script>
<!-- End Project Wonderful Ad Box Loader -->

<table><tr><td valign="top" width="450">


	<DIV id="box" style="LEFT: 205px; WIDTH: 40px; POSITION: absolute; TOP: 205px; HEIGHT: 40px; BACKGROUND-COLOR: #990000; layer-background-color: #990000
">

	<TABLE height="40" width="40">
	  <TBODY>
	  <TR>
		<TD>&nbsp;</TD></TD></TR></TBODY></TABLE></DIV>
	
	<DIV id="enemy0" style="LEFT: 270px; TOP: 60px; WIDTH: 60px; POSITION: absolute; HEIGHT: 50px; BACKGROUND-COLOR: #000099; layer-background-color: #000099
">
	<TABLE height=50 width=60>
	  <TBODY>
	  <TR>
		<TD>&nbsp;</TD></TR></TBODY></TABLE></DIV>

	<DIV id="enemy1"
	style="LEFT: 300px; WIDTH: 100px; POSITION: absolute; TOP: 330px; HEIGHT: 20px; BACKGROUND-COLOR: #000099; layer-background-color: #000099">
	<TABLE height=20 width=100>
	  <TBODY>
	  <TR>
		<TD>&nbsp;</TD></TR></TBODY></TABLE></DIV>
	<DIV id="enemy2"
	style="LEFT: 70px; WIDTH: 30px; POSITION: absolute; TOP: 320px; HEIGHT: 60px; BACKGROUND-COLOR: #000099; layer-background-color: #000099">
	
	<TABLE height=60 width=30>
	  <TBODY>
	  <TR>

		<TD>&nbsp;</TD></TR></TBODY></TABLE></DIV>
	<DIV id="enemy3"
	style="LEFT: 70px; WIDTH: 60px; POSITION: absolute; TOP: 70px; HEIGHT: 60px; BACKGROUND-COLOR: #000099; layer-background-color: #000099">
	<TABLE height=60 width=60>
	  <TBODY>
	  <TR>
		<TD>&nbsp;</TD></TR></TBODY></TABLE></DIV>
	<TABLE cellSpacing=0 cellPadding=0 border=0><!-- row 1 -->
	  <TBODY>
	
	  <TR>

		<TD width="50" bgColor=#000000 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor=#000000 height="50">
		  <TABLE>
			<TBODY>
	
			<TR>

			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 bgColor=#000000 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 bgColor=#000000 height=50>
		  <TABLE>
	
			<TBODY>

			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 bgColor=#000000 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 bgColor=#000000 height=50>
	
		  <TABLE>

			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 bgColor=#000000 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
	
		<TD width=50 bgColor=#000000 height=50>

		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 bgColor=#000000 height=50>
		  <TABLE>
			<TBODY>
			<TR>
	
			  <TD></TD></TR></TBODY></TABLE></TD></TR><!-- row 2 -->

	  <TR>
		<TD width=50 bgColor=#000000 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
	
			<TBODY>

			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
	
		  <TABLE>

			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
	
		<TD width=50 height=50>

		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
	
			  <TD></TD></TR></TBODY></TABLE></TD>

		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
	
			<TR>

			  <TD></TD></TR></TBODY></TABLE></TD></TR><!-- row 3 -->
	  <TR>
		<TD bgcolor="#000000" width="50" height="50">
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
	
		  <TABLE>

			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
	
		<TD width=50 height=50>

		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
	
			  <TD></TD></TR></TBODY></TABLE></TD>

		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
	
			<TR>

			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
	
			<TBODY>

			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD></TR><!-- row 4 -->
	  <TR>
		<TD bgcolor="#000000" width="50" height="50">
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
	
		<TD width=50 height=50>

		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
	
			  <TD></TD></TR></TBODY></TABLE></TD>

		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
	
			<TR>

			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
	
			<TBODY>

			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
	
		  <TABLE>

			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD></TR><!-- row 5 -->
	  <TR>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
			<TR>
	
			  <TD></TD></TR></TBODY></TABLE></TD>

		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
	
			<TR>

			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
	
			<TBODY>

			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
	
		  <TABLE>

			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
	
		<TD width="50" bgColor="#000000" height="50">

		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD></TR><!-- row 6 -->
	  <TR>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
	
			<TR>

			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
	
			<TBODY>

			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
	
		  <TABLE>

			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
	
		<TD width=50 height=50>

		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
	
			  <TD></TD></TR></TBODY></TABLE></TD>

		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD></TR><!-- row 7 -->
	  <TR>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
	
			<TBODY>

			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
	
		  <TABLE>

			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
	
		<TD width=50 height=50>

		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
	
			  <TD></TD></TR></TBODY></TABLE></TD>

		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
	
			<TR>

			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD></TR><!-- row 8 -->
	  <TR>
		<TD width="50" bgColor="#000000" height="50">
	
		  <TABLE>

			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
	
		<TD width=50 height=50>

		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
	
			  <TD></TD></TR></TBODY></TABLE></TD>

		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
	
			<TR>

			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width=50 height=50>
		  <TABLE>
	
			<TBODY>

			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD></TR><!-- row 9 -->
	  <TR>
	
		<TD width="50" bgColor="#000000" height="50">

		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
			<TR>
	
			  <TD></TD></TR></TBODY></TABLE></TD>

		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
	
			<TR>

			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
	
			<TBODY>

			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
	
		  <TABLE>

			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD>
		<TD width="50" bgColor="#000000" height="50">
		  <TABLE>
			<TBODY>
			<TR>
			  <TD></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>

<br /><br />

<script type="text/javascript"><!--
google_ad_client = "pub-9477050254721722";
/* afgame 468x60, created 5/6/08 */
google_ad_slot = "6630440666";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<!-- Project Wonderful Ad Box Code -->
<div id="pw_adbox_55693_1_0"></div>
<script type="text/javascript"></script>
<noscript><map name="admap55693" id="admap55693"><area href="https://www.projectwonderful.com/out_nojs.php?r=0&c=0&id=55693&type=1" shape="rect" coords="0,0,468,60" title="" alt="" target="_blank" /></map>
<table cellpadding="0" border="0" cellspacing="0" width="468" bgcolor="#ffffff"><tr><td><img src="https://www.projectwonderful.com/nojs.php?id=55693&type=1" width="468" height="60" usemap="#admap55693" border="0" alt="" /></td></tr><tr><td bgcolor="#ffffff" colspan="1"><center><a style="font-size:10px;color:#0000ff;text-decoration:none;line-height:1.2;font-weight:bold;font-family:Tahoma, verdana,arial,helvetica,sans-serif;text-transform: none;letter-spacing:normal;text-shadow:none;white-space:normal;word-spacing:normal;" href="https://www.projectwonderful.com/advertisehere.php?id=55693&type=1" target="_blank">Ads by Project Wonderful!  Your ad here, right now: $0</a></center></td></tr></table>
</noscript>
<!-- End Project Wonderful Ad Box Code -->


</td>
<td valign="top" width="380" id="rightsideDesc">
	
	<h1>Air Force Game</h1>
	<i>A.K.A The Worlds Most Addicting Game</i>
	
	<p><strong>Objective:</strong> Click and hold on the red square. 
Keep it away from the blue shapes or the black wall.</p>


	<p><strong>Goal:</strong> > 30 Seconds is considered to be incredible.</p>
	
	<p><strong>Trivia:</strong> U.S. Air Force pilots have been known to 
<strong>average</strong> more than 60 seconds. </p>

	<hr />

	<p><strong>High Scores</strong></p>
	Today:
	<table>
<?php
	foreach($scores_today as $score){ ?>
		<tr><td><?=$score['name']?></td><td class="number"><?=sprintf("%01.3f",$score['score'])?></td></tr>
<?php	}
?>
	</table>

	<br />Within 1 month:
	<table>
<?php
	foreach($scores_month  as $score){ ?>
		<tr><td><?=$score['name']?></td><td class="number"><?=sprintf("%01.3f",$score['score'])?></td></tr>
<?php	}
?>
	</table>	
	

	<hr>
	
	<h1><a href="../arcade.php">More games!</a></h1>
	<p>Check out the new nFriedly Arcade for a <a href="../arcade.php">huge selection of flash games!</a></p>
	
	<p>Also enjoy the all new, super-fast <a href="/px/" title="poxy/phpr0xi/a2 secure anti-filter">PHProxy web proxy</a> - It can access almost any website from behind a cooperate/school/government filter.</p>
	
	<hr />
	<p>Air Force Game hosted by <a href="http://nfriedly.com/webdev">nFriedly Web Development:</a> <a href="http://nfriedly.com/webdev/javascript">Expert Javascript and AJAX</a></p>

	
</td>
<td valign="top" width="160">
	<script type="text/javascript"><!--
	google_ad_client = "pub-9477050254721722";
	/* afgame skyscraper */
	google_ad_slot = "0826385857";
	google_ad_width = 160;
	google_ad_height = 600;
	//-->
	</script>
	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
</td>
</tr>
</table>

<script src="scripts.js" type="text/javascript"></script>



<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1735765-3";
urchinTracker();
</script>

</body></html>