<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Su.pr XSS via img tag example</title>
</head>

<body>
<?php /* api key: 5cb6461959470606f102c030aefa0c66 */ ?>
<h1>This page has been disabled, to enable it you need to add an api key to the url.</h1>
<h2>Super-simple example of using an image tag to send data to a remote site</h3>
<p>In this case, su.pr is the remote site.</p>
<p><textarea rows="5" cols="20" id="msg">Type something here</textarea></p>

<p><input type="submit" id="send" value="Then Click Here" /> <span id="status"></span></p>

<p>Finally, check <a href="http://twitter.com/nfriedly">http://twitter.com/nfriedly</a> and <a href="http://facebook.com/nfriedly">http://facebook.com/nfriedly</a> (may require a friend add first ;)</p>


<p>And when you're done, feel free take a look at the source code :)</p>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">

// scripts at the bottom for faster page rendering
$(function(){
	// cache the image tag to avoid memory leaks
	var img = document.createElement('img');
	var url = "http://su.pr/api/post?services;[]=twitter&services;[]=facebook&login=nfriedly&apiKey=&msg=";
	
	// when the send button is clicked, grab the message and update the img
	$('#send').click(function(){
		var msg = $('#msg').val();
		img.src = url + msg;
		$('#status').html('The message was sent! (Can\'t say if it made it.)');
	});
});
</script>

</body>
</html>