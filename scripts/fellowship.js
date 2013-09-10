function initialize() {
  if (GBrowserIsCompatible()) {
	var map = new GMap2(document.getElementById("map_canvas"));
	map.addControl(new GSmallMapControl());
	var myChords = new GLatLng(39.140354,-84.530466);
	map.setCenter(myChords, 16);
	var myPlace = new GMarker(myChords, {'clickable':false});
	map.addOverlay(myPlace);
	myPlace.openInfoWindowHtml('<b>Home Bible Fellowship</b><br /><br />Building 725 Apt. 6<br />' + n.next_fellowship.str + ' @ 7:30 PM');
  }
}

window.onload=function(){
	document.getElementById('addy').innerHTML = n.saddy;
	document.getElementById('maplink').href = n.mlink;
	document.getElementById('celly').innerHTML = n.cnumber;
	initialize(); 
};
window.onunload=GUnload;