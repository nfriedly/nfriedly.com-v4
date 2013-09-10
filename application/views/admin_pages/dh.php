<h1>Dreamhost</h1>
<h2>Users</h2>
<p>
<?php if($domains): ?>
<a href="/admin/dh/">Hide Domains</a>
<?php else: ?>
<a href="/admin/dh/with_domains">Show Domains</a>
<?php endif; ?>

| <a href="http://spreadsheets.google.com/ccc?key=pbpPysRWI17rbnG8zzybMBg&hl=en">Web Services Clients spreadsheet</a>
</p>

<style type="text/css">
.domain { padding-left:20px; }
td a { color:black; text-decoration:none; }
</style>


<?php $tot_domains = sizeof($domains); ?>

<table width="98%">
<thead>
<tr>
	<td>Username (Real Name)</td>
	<td>Password</td>
	<td>Type</td>
	<td align="right">Disk</td>
</tr>
</thead>
	
<?php 
$total_disk = 0.0;
$num_users = 0;
foreach($users as $u): 
if($u->type == "mail" || $u->account_id != '225072') continue;
$total_disk += $u->disk_used_mb;
$num_users++;
$disk = $u->disk_used_mb; // to save space
?>
<tr>
	<td><b><?=$u->username?></b> <?=($u->username != $u->gecos)?'('.$u->gecos.')':''?></td>
	<td><?=$u->password?></td>
	<td><?=$u->type?></td>
	<td align="right"><?= is_numeric($disk) ? number_format($disk) : '0'; ?> MB</td>
</tr>

<?php
if($domains):


	foreach($domains as $key => $d): 
		if(isset($d->user) && $d->user == $u->username):
			unset($domains[$key]); // we've got a match, no need to hit it again
			?>
			<tr>
				<td class="domain" colspan="4"><a href="http://<?=$d->domain?>"><?=$d->domain?></a></td>
			</tr>
<?php 
		endif;
	endforeach;
endif; ?>

<?php endforeach; ?>
<tfoot>
<tr>
	<td colspan="3"><?=$num_users?> Accounts</td>
	<td align="right"><?= is_string($total_disk) ? $total_disk : number_format($total_disk) ?> MB</td>
</tr>
</tfoot>
</table>

<?php if($domains): ?>

<h2>Other Domains</h2>
<table width="98%">
<thead>
<tr>
	<td>Domain Name</td>
	<td>Type</td>
</tr>
</thead>
	
<?php 
foreach($domains as $d): 
if($d->account_id != '225072') continue;
?>
<tr>
	<td><a href="http://<?=$d->domain?>"><?=$d->domain?></a></td>
	<td><?=(isset($d->hosting_type))?$d->hosting_type:'';?> <?=(isset($d->outside_url)&&$d->outside_url != '')?'(<a href="'.$d->outside_url.'">'.$d->outside_url.'</a>)':''?></td>
</tr>
<?php endforeach; ?>
<tfoot>
<tr>
	<td colspan="3"><?=$tot_domains?> Domains in Total</td>
</tr>
</tfoot>
</table>

<?php endif; ?>
