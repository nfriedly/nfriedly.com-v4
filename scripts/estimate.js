/* Hi, welcome to my code. 
 *
 * The fancy sliders are controlled by Yahoo's slider widget: 
 * http://developer.yahoo.com/yui/slider/
 *
 * Each slider and checkbox has an assoicated js control object that is built 
 * from a configuration object and stored in YAHOO.nf.*
 *
 * YAHOO's event system is used extensively, as many of the form controls 
 * update their cost when other controls change.
 *
 * The total in the green star is handled by an object that keeps track of 
 * the value of each control and then tallies them up. 
 *
 * There's also a bit of code that makes the textarea grow automatically.
 *
 * Have fun exploring!
 *
 * Todo: convert everything to hours so that the multiplier can be a dolars per hour thing rather than an arbitrary number.
 *
 * - Nathan Friedly
 */

(function() {
		  
	//YAHOO.util.Event.throwErrors = true; 

	YAHOO.namespace('nf');

	// shortcuts
    var Event = YAHOO.util.Event,
        Dom   = YAHOO.util.Dom,
        lang  = YAHOO.lang,
		nf = YAHOO.nf;
		
	// object configs 
    var sliders = [
			{
				// html elements that this form interacts with
				id: "siteSize",
				nojs: 'sitesize-input-container',
				input: 'sitesize-input',
				container: 'sitesize-slider-container',
				bg:"sitesize-bg", 
				thumb:"sitesize-thumb",
				valuearea:"sitesize",
				
				levels: [
					"A single page.",
					"Two or three pages.",
					"A few pages. (4-10 pages)",
					"Medium size. (11-20 pages)",
					"Fairly big. (20-60 pages)",
					"Really big. (60-200 pages)",
					"Humongous. (200+ pages)"
				],
				
				// slider.getRealValue() returns a number between 1 and this number
				maxVal: 7, 
				
				//the dollar amount to pass to total
				dollars: function(slider){
					var multiplier = (nf.cms.on()) ? 60 : 100;
					multiplier = multiplier * 2; // rate increases
					return slider.getRealValue() * multiplier * nf.complexity.getRealValue();
				},
				
				// what other controls does this slider rely on?
				subscribes: ["complexity","cms"]
			},
			{
				id: "complexity",
				nojs: 'complexity-input-container',
				input: 'complexity-input',
				container: 'complexity-slider-container',
				bg:"complexity-bg", 
				thumb:"complexity-thumb",
				valuearea:"complexity-text", 
				levels: [
					"Nothing too fancy.",
					"A little bit of pizazz. (This page)",
					"Does something useful. (This site)",
					"Fairly complex.",
					"Really complex.",
					"Skynet."
				],
				maxVal: 10,
				dollars: function (slider){
					return Math.round(Math.pow(slider.getRealValue(),3)/100)*100;
				}
			}
		],
		checkboxes = [
			{
				id: 'design',
				dollars: function(cb){
					var size = nf.siteSize.getRealValue();
					var base = 150 * size;
					var cms = (nf.cms.on()) ? 50 * size : 0;
					var blog = (nf.blog.on()) ? 200 : 0;
					var cart = (nf.cart.on()) ? 400 : 0;
					return base + cms + blog + cart;
				},
				subscribes: ["siteSize","cart","cms","blog"]	
			},
			{
				id: 'cart',
				dollars: function(cb){
					return 2000 + (100 * nf.complexity.getRealValue());
				},
				subscribes: ['complexity']
			},
			{
				id: 'cms',
				dollars: function(cb){
					//  subscribed by siteSize & design
					return 200 + (200 * nf.complexity.getRealValue()); 
				},
				subscribes: ["complexity"]
			},
			{
				id: 'blog',
				dollars: function(cb){
					return 200;
				}
			},
			{
				id: 'login',
				dollars: function(cb){
					return (nf.cms.on()) ? 100 : 500
				},
				subscribes: ["cms"]
			},
			{
				id: 'email',
				dollars: function(cb){
					return 50 * nf.complexity.getRealValue();
				},
				subscribes: ["complexity"]
			},
			{
				id: 'rss',
				dollars: function(cb){
					var complex = (nf.complexity.getRealValue() >= 5) ? 400 : 0;
					return 100 + complex;
				},
				subscribes: ["complexity"]
			}
		];


	var total = nf.total = {
		el: Dom.get("total"),
		input: Dom.get("total-input"),
		ops: {
			base: 0
		},
		update: function(){
			var val=0, i;
			for(i in total.ops){
				val += this.ops[i];
			}
			val = val * 1.5; // my hourly rate has gone up some since I stared
			val = Math.round(val/25) * 25; // rounds to nearest 25
			this.el.innerHTML = this.input.value = "$" + val;
		},
		setOp: function(key,value){
			this.ops[key] = value;
			this.update();
		}
	};
	
	// we wait until all objects are created before letting them subscribe to eachother's events
	// these functions also run the initial update to set the $ value once everything is ready
	
	nf.deferredSubscriptions = [];
	
	// runs while creating objects 
	function handleSubscriptions(obj,conf){
		if(typeof conf.subscribes != "undefined"){
				obj.subscribes = conf.subscribes;
				nf.deferredSubscriptions.push(obj);
		}
		else obj.update(); // we can run the initial update imediately if it doesn't rely on anything else
		
	}
	
	// runs after all objects have been created
	function handleDeferredSubscriptions(){
		for(var i=0; i < nf.deferredSubscriptions.length; i++){
			var obj = nf.deferredSubscriptions[i];
			
			for(var i2 = 0; i2 < obj.subscribes.length; i2++){
				var target = obj.subscribes[i2];
				target = nf[target];
				target.change.subscribe(obj.update);
			}
		}
		
		//now run initial updates on these
		for(var i=0; i < nf.deferredSubscriptions.length; i++){
			var obj = nf.deferredSubscriptions[i];
			obj.update();
		}		
	}

	
	// builds and returns slider controls
	function slider(conf){
		var sMin = 0;
		var sMax = 200;
		var tickSize = 1;
		
		var slider = YAHOO.widget.Slider.getHorizSlider(conf.bg, conf.thumb, sMin, sMax, tickSize);
		
		Dom.get(conf.nojs).style.display = "none";
		Dom.get(conf.container).style.display = "block";

		conf.maxVal--;
		
		slider.getRealValue = function() {
			return Math.round( (this.getValue()) * (conf.maxVal) / (sMax) + 1 ) ;
		}
		
		slider.getStringValue = function(){
			var snum = Math.round(this.getValue() * (conf.levels.length-1) / sMax)
			return conf.levels[snum] || "Unknown value: "+this.getValue();
		}
		
		slider.getDollarValue = function(){
			return conf.dollars(slider);
		}
		
		slider.update = function(){
			var s = slider.getStringValue();
			Dom.get(conf.valuearea).innerHTML = s;
			Dom.get(conf.input).value = s;
			total.setOp(conf.id, slider.getDollarValue()); 
		}
		
		slider.change = new YAHOO.util.CustomEvent("change", slider); 

		slider.subscribe("change", function(offsetFromStart){
			YAHOO.log("slider change event " + conf.id);
			slider.update();
			slider.change.fire();
		});
		
		handleSubscriptions(slider,conf);
		
		return slider;
	};		
	
	// builds and returns checkbox controls
	function checkbox(conf){
		var cb = {};
		
		cb.checkbox = Dom.get(conf.id);
		
		cb.on = function(){
			return cb.checkbox.checked;
		}
		
		cb.getDollarAmount = function(){
			return (cb.on()) ? conf.dollars(cb) : 0;
		}
		
		cb.change = new YAHOO.util.CustomEvent("change", cb); 
		
		cb.update = function(){
			YAHOO.log("checkbox change event " + conf.id);
			total.setOp(conf.id, cb.getDollarAmount());
			cb.change.fire();
		}
		
		cb.set = function(val){
			cb.checkbox.checked = val;
			cb.update();
		}
		
		if(YAHOO.env.ua.ie > 0){
			// IE fires change events on blur.. not when it actually changes. BUT IE does fire the 'click' event when you change the value via the keyboard (spacebar)!
			Event.addListener(cb.checkbox,"click",cb.update,cb);
		} else {
			Event.addListener(cb.checkbox,"change",cb.update,cb); 	
		}
		
		
		handleSubscriptions(cb,conf);
		
		return cb;
	}
	

	// there are several functions for this online, and they're all entirely too complex.
	function resizeTextarea(id){
		var ta = Dom.get(id);
		ta.style.overflow = "hidden";
		Event.addListener(ta, "keyup",function() {
			if ( ta.scrollHeight > ta.clientHeight ) ta.style.height = ta.scrollHeight + "px"; 
		});
	}

    Event.onDOMReady(function() {
	
		// build all of my slider & checkbox objects
		for(var i in sliders){
			var s= sliders[i];
			nf[s.id] = slider(s);
		}
		YAHOO.log("Finished sliders, starting checkboxes");
		for(var i in checkboxes){
			var c = checkboxes[i];
			nf[c.id] = checkbox(c);
		}
		
		// now that all controls are created, setup the inter-dependencies
		handleDeferredSubscriptions();
		
		// and finally, make my ity-bitty text area resize automatically.
		resizeTextarea( "message" );

    });
})();