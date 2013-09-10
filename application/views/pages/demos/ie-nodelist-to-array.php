<!DOCTYPE html>
<html>
<head>
<title>Test</title>
</head>
<body>
<h1>Converting a DOM NodeList to an Array</h1>

<p>First paragraph - this one is given blue border before we convert the nodelist to an array.</p>
<p>Second paragraph - this one should get a red border, it gets run through a (comparably slow) conversion function.</p>
<p>Third paragraph - this one gets a purple border. It runs a hybrid function that first tries native code and if that doesn't work ir runs the slower method.
<p>Fourth paragraph - this one gets a green border. It uses only native code, which works in all browsers except IE. (Up to version 8, at least.) In Internet Explorer it throws an error that it can't run Array.prototype.slice.call(nodes) because a DOM NodeList is not a JavaScript object.</p>

<p>Conclusion: If you can just deal with it as a nodelist, that will always work. If you need an array, purple is your best bet.</p>

<p><small><a href="http://nfriedly.com/techblog/2009/06/advanced-javascript-objects-arrays-and-array-like-objects/#gotchas">Back to the techblog.</small></p>


<script type="text/javascript">

// this code is public domain - Nathan Friedly

function slowToArray(nodes){
	var arr = [],
	    length = nodes.length;
	for(var i=0; i < length; i++){
		arr.push(nodes[i]);
	}
	return arr;
}

function hybridToArray(nodes){
	try{
		var arr = Array.prototype.slice.call(nodes);
		return arr;
	} catch(err){
		var arr = [],
		    length = nodes.length;
		for(var i=0; i < length; i++){
			arr.push(nodes[i]);
		}
		return arr;
	}
}

window.onload = function(){
	

	// should work everywhere, doesn't have nifty array functions like pop and shift
	var nodes = document.getElementsByTagName('p');
	nodes[0].style.border = "1px solid blue";

	// works in all browsers, slower than next method
	var slowArr = slowToArray(nodes);
	slowArr.slice(1).shift().style.border = "1px solid red";

	// works in all browsers, tries the faster method then the slower method
	var hybridArr = hybridToArray(nodes);
	hybridArr.slice(2).shift().style.border = "1px solid purple";

	// does not work in ie
	var arr = Array.prototype.slice.call(nodes);
	hybridArr.slice(3).shift().style.border = "1px solid green";
}
</script>
</body>
</html>