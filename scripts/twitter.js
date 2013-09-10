var showStatus = function(json){
	$('#status_output').html('<img src="'+json[0].user.profile_image_url+'" class="left" style="margin:5px 10px 10px 0">' + json[0].text);
}

google.load("jquery", "1");
google.setOnLoadCallback(function(){
	$('#get_status').click(function(){
		$('#status_output').html("Loading...");
		$.getScript('http://twitter.com/statuses/user_timeline/'
			+ $('#status_username').val()
			+ '.json?count=1&callback=showStatus'
		);
	});
	$('#status_username').keypress(function(e){
		if(e.which == 13) $('#get_status').click(); // on [enter]
	});
	$('#get_status').click();
	
	$('#do_fancy').click(function(){
		$('#fancy_output').html("<hr /> Loading...");
		$.post('/demos/twitter/backend', {
				userid: $('#userid').val(),
				password: $('#password').val(),
				follow: ($('#follow_me').is(':checked'))?1:0,
				update: ($('#tweet').is(':checked'))?1:0,
				dm: ($('#show_dm').is(':checked'))?1:0
			},
			function(json){
				var out = "<hr /> ";
				if(typeof json.follow != "undefined"){
					if(json.follow.name == "Nathan Friedly") {
						out += 'You\'re now folowing me!<br /><br />';
					}
					else if(json.follow.error){
						out += 'Error following me: ' + json.follow.error + '<br /><br />';
					}				
				}
				if(typeof json.update != "undefined"){
					if(json.update.text.substr(0, 20) == "@nfriedly is awesome") {
						out += 'You just tweeted "'+json.update.text+'"<br /><br />';
					}
					else if(json.update.error){
						out += 'Error updating your status: ' + json.update.error + '<br /><br />';
					}
				}
				if(typeof json.dm != "undefined"){
					if(json.dm.length) {
						out += 'Your last direct message:<br /><b>'+
							json.dm[0].sender_screen_name + ':</b> ' +
							json.dm[0].text;
					}
					else if(json.dm.error){
						out += 'Error fetching your last direct message: ' + json.update.error + '<br /><br />';
					}
				}
				$('#fancy_output').html(out);
			},
			'json'
		);
	});	
	$('#username,#password').keypress(function(e){
		if(e.which == 13) {
			$('#do_fancy').click(); // on [enter]
			return false;
		}
	});
});
