<?php 

$title = "Thank you!";

include(APPPATH . 'views/header.php'); 


$GLOBALS['extracredit'] = '<a href="http://www.flickr.com/photos/cotaroba/2670056750/">Photo by cotaroba</a>'; 

?>

<h1>Thanks, your message is on the way!</h1>
<p>I'll get back to you as soon as I can. In the meantime, you can read about the
<a href="http://en.wikipedia.org/wiki/Pony_Express">Pony Express</a>.</p>

<?php 
/*
<h1>Oops</h1>
<p>It looks like something went wrong. Your message <em>was not get sent!</em></p>
*/
?>

<p><a href="http://www.flickr.com/photos/cotaroba/2670056750/"><img src="http://farm4.static.flickr.com/3186/2670056750_d0744a4198.jpg?v=0" alt="Pony Express" /></a></p>

<?php include(APPPATH . 'views/footer.php'); ?>