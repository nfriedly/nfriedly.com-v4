<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Using XSS tp post to a Facebook page via Ping.fm</title>
</head>

<body>
<h1>Flash-based cross site scripting</h1>
<p><i>Posting to facebook pages via the ping.fm api</i></p>

<p>Select Account: <br />
<select name="accounts" id="accounts">
	<!-- values are the keys from key from http://ping.fm/key/ -->
	<option value="34aeff10cd5baa015d2244bd95d213ba-1253801823">Post to facebook page via Nathans ping.fm account</option>
</select>
</p>

<p><textarea rows="5" cols="20" id="msg">Type something here</textarea></p>

<p><input type="submit" id="send" value="Then Click Here" /> <span id="status"></span></p>

<p>Finally, check <a href="http://www.facebook.com/agencyentourage">http://www.facebook.com/agencyentourage</a> to verify that it was successful.</p>


<p>And when you're done, feel free take a look at the source code :)</p>

<script type="text/javascript" src="http://yui.yahooapis.com/3.0.0b1/build/yui/yui-min.js"></script>
<script type="text/javascript">

// grab and prepare the necessary files
YUI({combine: true, timeout: 10000}).use("io", function(Y) {

	/* configuration */
	
	var swf_url = '/files/io.swf'; // this file must be located on the same domain as the website.
	
	var api_key = 'c6d09c79c99177fc07439dec5e3f8d3f'; // key from from http://ping.fm/developers/ - yours is 93527db62777dfba7961a28b627c26eb
	
	/* End configuration */
	
	var url = 'http://api.ping.fm/v1/';
	var method = 'user.post';
	
	var xdrConfig = {
		id:'flash',
		yid: Y.id,
		src: swf_url + '?t=' + new Date().valueOf().toString()
	};
	Y.io.transport(xdrConfig);
	
	function status(msg){ document.getElementById('status').innerHTML = msg; }
	
	function parseXML(txt){
		try { //Internet Explorer
			xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
			xmlDoc.async="false";
			xmlDoc.loadXML(txt);
			return xmlDoc;
		}
		catch(e)
		{
			parser=new DOMParser();
			xmlDoc=parser.parseFromString(txt,"text/xml");
			return xmlDoc;
		}
	};
	
	var cfg_base = {
		"method": "POST", 
		"xdr": {"use":"flash"}, 
		"on": {
			start: function() { status('Sending...'); },
			success: function(id,response){ 
				var xmlobject = parseXML(response.responseText);// flash only returns a string, so convert it to xml
				var stat = xmlobject.documentElement.attributes.getNamedItem('status').nodeValue; // grab the status attribute
				if(stat == 'OK') status('Success!'); 
				else status('Post Failed: ' + xmlobject.documentElement.children[2].firstChild.nodeValue); // this could possibly be the wrong item in the future
			},
			failure: function(){ status('Ut oh, something broke...' ); }
		}, 
		"data": {
			//user_app_key:'', // this will get added in later
			'api_key': api_key,
			post_method:'default',
			//'body':'' // this will get added in later
		}
	};
	
	// make these acessible outside of this context
	YUI.nf = YUI.nf || {};
	YUI.nf.post = function(msg, user_key){
		var cfg = Y.clone(cfg_base); // duplicate config_base
		cfg.data = Y.merge(cfg.data, {'body':msg, 'user_app_key':user_key }); // mix in our api key & the message
		var obj = Y.io(url + method, cfg); 
	};
	
	// add the event handler to the send button
	Y.on("domready", function(){
		Y.on("click", function(){
			YUI.nf.post(
				document.getElementById('msg').value,
				document.getElementById('accounts').value
			);
		}, "#send"); 
	}); 
	
} ); 
</script>

</body>
</html>