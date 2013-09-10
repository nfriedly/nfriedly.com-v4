/* Hi, this file is used to protect my personal info from bots. */

var n = n || {};

(function(){
		  
	var one = "nathan";
	var two = "nfriedly";
	var three = "friedly";
	var four = "gmail";
	n.eaddy = one+"@"+two+".com";
	n.gaddy = one+"."+three+"@"+four+".com";
  n.sky = one + "." + three;
  n.skylink = "sky" + "pe:" + n.sky + "?call";
	n.cnumber = "(937) 409"+"-1337";
	n.fnumber = "(866) 3" + "57-5254";
	n.onumber = " (513) 89"+"9-1337"; //old number: "(513) 25" + "2-2855";  
	n.saddy_parts = ['Nathan Friedly',
		'725 Cli'+'fton Colony D'+'r',
		'A'+'partmen'+'t 6',
		'Cin'+'cin'+'nati, O'+'H 45'+'220'];
	n.saddy = n.saddy_parts.join('<br />');
	n.mlink = 'http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' + 
	n.saddy_parts.slice(1).join('+').replace(' ','+') + 
	'&sll=39.190215,-84.515606&sspn=0.011775,0.019312&ie=UTF8&z=16&iwloc=A'
	
	n.mailto = function(email){
		return '<a href="mai'+'lto:'+email+'">'+email+'</a>';	
	}
	n.res = '/files/Nathan-Friedly-Re'+'sume.p'+'df'; // not perfect, but it'll have to do.
		  
 })();