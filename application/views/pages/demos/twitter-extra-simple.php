<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">

<head>
<title>Simple Twitter Status</title>

</head>
<body>

<h1>My Twitter Status:</h1>

<div id="twitter_status">Loading...</div>



<!-- Put scripts down here for speed -->

<script type="text/javascript">
// this must come before we load the twitter script

var showStatus = function(json){

	json = json[0]; // we only care about the most recent status;
	var myDiv = document.getElementById('twitter_status');
	myDiv.innerHTML = '<img src="'
		+ json.user.profile_image_url
		+ '" style="float:left; margin:5px 10px 10px 0">' 
		+ json.text;
}
</script>

<!-- now load the twitter file -->
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/nfriedly.json?count=1&amp;callback=showStatus&amp;random=<?php echo time(); ?>" /></script>


</body>
</html>