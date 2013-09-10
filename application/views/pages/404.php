<?php 

// the 404 header that's already sent by the controller should be enough but google doesn't seem to get it some times...
$inHeader = '<meta name="robots" content="noindex" />';

include(APPPATH . 'views/header.php'); ?>

<h1>404 File not found</h1>

<p><img src="/img/diet_water.jpg" alt="Diet Water" title="" /></p>

<h1>Yea, this page doesn't exist.</h1>
<h3>And neither does diet water.</h3>
<p>Either I goofed something up and stuck a broken link on the site (In which case, you could kindly <a href=
"/contact">let me know</a>) or else you're just typing random things into the address bar.</p>

<?php include(APPPATH . 'views/sitemap_inc.php'); ?>

<?php include(APPPATH . 'views/footer.php'); ?>