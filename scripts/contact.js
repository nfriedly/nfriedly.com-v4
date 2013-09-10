google.load("jquery", "1");
google.setOnLoadCallback(function(){
	$('#nemail').html(n.mailto(n.eaddy));
	
	//$('#cnum').html(n.cnumber);
	$('#onum').html(n.onumber);
	$('#fnum').html(n.fnumber);
	
	$('#msn, #gtalk').html(n.gaddy);
  
  $('#skype').attr('href',n.skylink).html(n.sky);
	
	$('#moreinfo_title').click(function(){
		$('#moreinfo').toggle("slow");
		$('#arrow').toggleClass('rightarrow').toggleClass('downarrow');
		return false;
	});
	
});


