<?php 

if(time() > strtotime("September 7, 2010")) {
  $inHeader = '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
}

include(APPPATH . 'views/header.php'); ?>


<h1>nFriedly Web Development</h1>

<p><a href="/webdev">Web Development</a> : <a href="/webdev/php">PHP Programming</a> : <a href="/webdev/javascript">AJAX &amp; Javascript</a> : <a href="/techblog">Technical Blog</a>

<p>&nbsp;</p>

<?php 

if(time() > strtotime("September 7, 2010")) { ?>

<h2><a href="/webdev">Click here to continue</a></h2>

<p>&nbsp;</p>
<p>&nbsp;</p>

<?php } ?>

<p>Links:</p>

<p>
<a href="http://www.seo-mart.com/"> SEO Services</a> seo-mart is leading search engine marketing company India providing quality Search Engine Optimization.
<a href="http://www.freelancedesigners.com/dir/webdesign/" title="web site design" target="design">Web Design</a><BR>FreelanceDesigners.com
<a href="http://www.directory-elite.com/">Drectory-Elite.Com </a>
<a href="http://www.director-web.net" TARGET="_blank" style="text-decoration: none; font-family: helvetica; color: #012477; font-size: 12px;">Director Web</a>
<a href="http://www.bloogsy.com">Directorio web</a>
<a href="http://www.newworldproducts.net">Free or paid directory - Human Edited!</a>
</p>

<?php include(APPPATH . 'views/footer.php'); ?>