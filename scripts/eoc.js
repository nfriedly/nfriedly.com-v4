// set the color picker options before the onready event so that when it's 
// onready fires before mine, the options will already be set!


$(function(){
	// fire up the color picker
	$.fn.mColorPicker.init.replace = false;
	$.fn.mColorPicker.init.showLogo = false;
	$.fn.mColorPicker.init.allowTransparency = false;
	$.fn.mColorPicker.init.enhancedSwatches = false;
	// setting this as a configurable option doesn't seem to work:
	$.fn.mColorPicker.defaults.imageFolder='/img/colorpicker/';
	$('#colors input').mColorPicker();
	
	// this is the function that does all the work
	function update_url(){
		var url = 'http://nfriedly.com/eoc/'+$('#userid').val();
		var bg = $('#layouts input[type=radio]:checked').val();
		if(bg*1){
			url += '/bg:' + bg;
		}
		$('#colors input').each(function(input){
			if(this.value){
				url += "/" + this.name + ":" + this.value.replace('#','');
			}
		});
		url += '/whatever.gif';
		$('#code').val('[img]'+url+'[/img]');
		$('#img').attr('src',url);
	}
	// bind handlers to all the form elements
	$('#go').click(update_url);
	$('#layouts input').change(update_url).click(function(){
		setTimeout(update_url,0)
	}); // timeout so that we get the new value, not the old one
	//the colors change as you mouse over them, so we want a color to stay put for at 
	//least half of a second rather than hammering the EOC server
	var colortimeout;
	$('#userid, #colors input').change(function(){
		clearTimeout(colortimeout);
		colortimeout = setTimeout(update_url, 500);
	}).keyup(update_url);
});