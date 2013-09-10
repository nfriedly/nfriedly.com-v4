<?php include(APPPATH . 'views/header.php'); ?>

<a href="/client" style="float:right; margin-top:10px;">Client Login</a>
<h1>Clients</h1>
<p><i>A few of my favorite clients.</i></p>

<?php $clients = array(


	array(
		'name' => 'Standard Publishing',
		'url' => 'http://standardpub.com/',
		'img' => '/img/portfolio/thumbs/standardpub.png',
		'desc' => 'A local christian book publisher, Standard Publishing has been in business for over 135 years.',
		'work' => 'I upgraded the flash portions of their website to easier, more semantic HTML and jQuery.'
	),
	
	array(
		'name' => 'Lavish Giving',
		'url' => 'http://www.lavishgiving.com/',
		'img' => '/img/portfolio/thumbs/lavishgiving.png',
		'desc' => 'Lavish Giving is a locally owned and operated online gift store that allows you to donate 10% of your putchase to the charity of your choice.',
		'work' => 'I worked on various sections of their website to enable friendly urls for search engine optimization.'
	),
	
	array(
		'name' => 'Wealth Management Partners LLC',
		'url' => 'http://wmpllc.com',
		'img' => '/img/portfolio/thumbs/wmp.jpg',
		'desc' => 'Financial advising and consulting specialists, WMP aims to teach their clients about investing to help them make better decisions.',
		'work' => 'I rebuilt their site from scratch, including: tiwtter feed and blog imported to home page, CMS, client backend, XHTNL, CSS, & javascript. Oversaw by GS Web Services in the design phase.'
	),
	
	array(
		'name' => 'BMW Invoice',
		'url' => 'http://bmwinvoice.com',
		'img' => '/img/portfolio/thumbs/bmw.jpg',
		'desc' => 'Gives customers the upper hand in negotiating by giving them both the MSRP and the list price on every model and feature.',
		'work' => 'I completely built the PHP backend and javascript frontend on this site using Code Igniter and jQuery.'
	),
	
	array(
		'name' => 'iBoomerang.com, Inc.',
		'url' => 'http://iboomerang.com',
		'img' => '/img/portfolio/thumbs/iboomerang.jpg',
		'desc' => 'Online marketing company with amazing customer service. Products include Web Sites, Web Conferencing, Email Templates, and more.',
		'work' => 'I have worked on a large variety of projects for iBoomerang.'
	),

	array(
		'name' => 'USA Benefits Group',
		'url' => 'http://usabg.net',
		'img' => '/img/portfolio/thumbs/usabg.png',
		'desc' => 'USABG is a nation wide insurance broker that works with self employed clients and a variety of insurance agencies.',
		'work' => 'I have worked on the agent back office and statistics areas primairily, however I was involved in most of their site\'s development.'
	),
	
	array(
		'name' => 'Rack n More',
		'url' => 'http://racknmore.com',
		'img' => '/img/portfolio/thumbs/racknmore.jpg',
		'desc' => 'Cincinnati area warehouse equipment specalists. Their products and services include consulting, forklifts, pallet rack, carton flow, and more.',
		'work' => 'I am helping with Search Engine Optimization and general site matinence.'
	),
	
	array(
		'name' => 'Outreach For Animals',
		'url' => 'http://outreachforanimals.org/',
		'img' => '/img/portfolio/thumbs/outreachforanimals.jpg',
		'desc' => 'A non-profit orginization that educuates people on proper behavior around wildlife.',
		'work' => 'I worked with the existing design to roll out a Content Management System, Image Gallery, and Shopping Cart.'
	),
	
	array(
		'name' => 'Fellowlaborers',
		'url' => 'http://fellowlaborers.org/',
		'img' => '/img/portfolio/thumbs/fellowlaborers.jpg',
		'desc' => 'The ministry / mentoring / leadership training program I was a part of during 2008-2009.',
		'work' => 'I installed WordPress. I admin the site and occasionally contribute articles.'
	),
	
	array(
		'name' => ' Youmans Construction Services',
		'url' => 'http://buildingmyhome.com/',
		'img' => '/img/portfolio/thumbs/ycs.png',
		'desc' => 'YCS has been in business for over 30 years. They build new homes with an "Owner Involved Builder" approach.',
		'work' => 'I worked on their email system.'
	)

);

?>


<div id="clients">	

<?php foreach($clients as $c): extract($c) ?>
<h2 class="clear"><a href="<?=$url?>"><img src="<?=$img?>" alt="" class="left" /></a> <?=$name?></h2>
	<p class="whattheydo"><?=$desc?><br />
	<a href="<?=$url?>"><?=$url?></a></p>
	
<?php endforeach; 
//<!-- p class="whatidid"><?=$work? ></p -->
?>

	
</div>

<?php include(APPPATH . 'views/footer.php'); ?>