<?php date_default_timezone_set('America/New_York'); ?>


<?= showfile('/var/lib/origami/foldingathome/CPU1/unitinfo.txt') ?>

<br /><br />

<?= ($log) ? showfile('/var/lib/origami/foldingathome/CPU1/FAHlog.txt') : '<a href="/admin/folding/log">Show Log</a>' ?>


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