<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>

<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/blog.css" />
<link rel="shortcut icon" href="/favicon.ico" />


<?php wp_head(); /* For plugins */ ?>

	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

</head>

<body class=" yui-skin-sam">

<div id="container-header">
	<div id="header">
		<h2><a href="/techblog">nFriedly Web Development</a></h2>
		<h1><a href="/techblog">Tech Blog</a></h1>
		<a href="/"><img src="/img/nflogo-header-notext.png" height="140" width="107" alt="nFriedly" /></a>
	</div>
</div>
<div id="container-main">
<div id="container">
