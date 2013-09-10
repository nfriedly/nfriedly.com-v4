<?php if(!isset($page)) $page = false; ?>
<div id="navigation">
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
	<li><a href="/fellowship">Fellowship</a></li>
	<li><a href="/webdev">Web Dev</a>
<?php if($page == "webdev"): ?>
		<ul>
			<li><a href="/webdev/php" title="Server Side Web Programming">PHP</a></li>
			<li><a href="/webdev/javascript" title="Javascript and Ajax: Client Side Web Programming">JS &amp; AJAX</a></li>
			<li><a href="/webdev/marketing">Marketing</a></li>
			<li><a href="/portfolio">Portfolio</a></li>
		</ul>
	
<?php endif; ?></li>
	<li><a href="/techblog">Tech Blog</a></li>
    <li><a href="/estimate">Quote</a></li>
    <li><a href="/contact">Contact</a></li>
</ul>

	<?php if( isset($this) && isset($this->session) && $this->session->userdata('loggedin')) { include 'user_menu.php'; } ?>
	
<?= isset($side_extra) ? $side_extra : '' ?>
</div>