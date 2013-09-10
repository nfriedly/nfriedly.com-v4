<?php if(isset($listname)): ?>
<h2><?=$listname?></h2>
	<?php if($listname == 'Results:'):  $first = current($list);?>
	<script type="text/javascript">
		var _gaq = _gaq || [['_setAccount', 'UA-1735765-3']];
		_gaq.push(['_trackEvent', 'Pagerank', 'Lookup', '<?= $first['url'] ?>', <?= count($list) ?>]);
	</script>
	<?php endif; ?>

<?php endif; ?>

<?php if(isset($message) && $message): ?>
	<div style="border:2px solid red; padding: 12px; margin: 10px; background-color: yellow; width: 290px;  font-size: 12pt;" >
		<?= $message ?>
	</div>
	<script type="text/javascript">
		var _gaq = _gaq || [['_setAccount', 'UA-1735765-3']];
		_gaq.push(['_trackEvent', 
			'Pagerank', 
			'Limit',
			'<?= $message ?>'
		]);
	</script>
<?php endif; ?>

<ul class="prlist">
<?php foreach($list as $item): 
	extract($item);
	if($pagerank === NULL) $pagerank = "-";
?>
	<li><?=$image?> <?=$pagerank?> <a href="<?=$url?>"><?=$url?></a></li>
<?php endforeach; ?>
</ul>