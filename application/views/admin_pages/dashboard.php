<h1>Dashboard</h1>

<h2><a href="server_info">Server Stats</a></h2>
<pre><?= trim(shell_exec('uptime')); ?>


<?= passthru('df -h | head -n 2'); ?></pre>

<h2><a href="http://ddgg.nfriedly.com/">DDGG Status</a></h2>
<pre><?= file_get_contents( 'http://ddgg.nfriedly.com/status' ); ?></pre>

<h2><a href="/pagerank">Pagerank Tool</a></h2>
<br />
<style type="text/css">
.nospace td {padding: 0;} /* cellpadding=0 didn't seem to do this alone */
</style>
<table cellspacing="0" cellpadding="0" border="0" class="nospace">
	<tr>
		<td><?= $pr['lookups'] ?> </td>
		<td>lookups from </td>
		<td><?= $pr['ip'] ?> </td>
		<td>IPs in the past 24 hours.</td>
	</tr>
	<tr>
		<td><?= $pr_week['lookups'] ?> </td>
		<td>lookups from </td>
		<td><?= $pr_week['ip'] ?> </td>
		<td>IPs in the past week.</td>
	</tr>
	<tr>
		<td><?= $pr_month['lookups'] ?>&nbsp;</td>
		<td>lookups from&nbsp;</td>
		<td><?= $pr_month['ip'] ?>&nbsp;</td>
		<td>IPs in the past month.</td>
	</tr>
</table>

<h2><a href="http://fah-web.stanford.edu/cgi-bin/main.py?qtype=userpage&username=nfriedly">Folding@Home</a></h2>

<p><a href="http://folding.extremeoverclocking.com/user_summary.php?s=&u=408666"><img src="http://nfriedly.com/eoc/408666/whatever.gif" alt="" /></a></p>

<?php showfile( '/var/lib/origami/foldingathome/CPU1/unitinfo.txt' ); ?>

<p>tail of <a href="folding/log">FAHLog.txt</a>:</p>
<pre><?= passthru('tail /var/lib/origami/foldingathome/CPU1/FAHlog.txt'); ?></pre>

<h2><a href="http://panel.dreamhost.com/">Dreamhost</a></h2>
<p><a href="/admin/dh">Dreamhost Users</a></p>


<?php
function showfile($filename){
    if (file_exists($filename)) {
	echo '<pre>';
	echo basename($filename) 
		. " - last modified: " 
		. date ("F d Y g:i a", filemtime($filename))
		."\n\n";
	include $filename;
	echo '</pre>';
    }
}
?>