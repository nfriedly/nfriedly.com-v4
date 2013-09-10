<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=(isset($title))?$title:'Nathan Friedly: Minister // Web Developer // Ninja';?></title>

<?php if(isset($keywords)): ?>
<meta name="keywords" content="<?=$keywords?>" />
<?php endif;
	  if(isset($description)): ?>
<meta name="description" content="<?=$description?>"  />
<?php endif; ?>


<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="shortcut icon" href="/favicon.ico" />

<?=(isset($inHeader))?	$inHeader : ''; ?>
<?=(isset($header))?	$header : ''; ?>
<?=(isset($head))?		$head : ''; ?>

</head>

<body class=" yui-skin-sam">
<div id="container-header">
	<div id="header"><a href="/"><img src="/img/headersm.png" height="140" width="750" alt="Nathan Friedly: Minister // Web Developer // Ninja" /></a></div>
</div>
<div id="container-main">
<div id="container">

<?php if(!isset($nomenu) || !$nomenu): ?>

<?php include 'menu.php'; ?>

		
    <div id="content">

<?php endif; ?>	