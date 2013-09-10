<?php 

$url = "http://www.no-ip.com/hostactive.php?host=nfriedly&domain=no-ip.org";
	
echo file_get_contents($url);
	
exit();
?>