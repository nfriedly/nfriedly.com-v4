<h2>Clients</h2>
<p><a href="/admin/account_admin">Add a client</a></p>
<style>li{margin:5px;}</style>
<ul>
<?php foreach ($clients as $client): ?>
	<li><a href="/admin/account/<?=$client->username?>"><?=$client->fname?> <?=$client->lname?> (<?=$client->username?>)</a></li>
<?php endforeach; ?>
</ul>