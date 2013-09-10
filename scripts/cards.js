var cc = {
	regs: {
		// from http://www.regular-expressions.info/creditcard.html
		// drop em up here so they only have to be compiled once
		visa: 		new RegExp('^4[0-9]{12}(?:[0-9]{3})?$'), 
		mc: 		new RegExp('^5[1-5][0-9]{14}$'),
		amex: 		new RegExp('^3[47][0-9]{13}$'), 
		discover:	new RegExp('^6(?:011|5[0-9]{2})[0-9]{12}$'),
		dc: 		new RegExp('^3(?:0[0-5]|[68][0-9])[0-9]{11}$'), 
		jcb: 		new RegExp('^(?:2131|1800|35\d{3})\d{11}$'),
		all_cards:	new RegExp('^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$'),
		nums_only:	new RegExp('/[^\d]/','g')
	},
	type: function(num){
		
		num.replace(this.regs.nums_only,'');
		
		if(!this.is_valid(num)) return false;
		
		else if(this.regs.visa.test(num)) 		return 'Visa';
		else if(this.regs.mc.test(num)) 		return 'Master Card';
		else if(this.regs.amex.test(num)) 		return 'American Express';
		else if(this.regs.discover.test(num)) 	return 'Discover';
		else if(this.regs.dc.test(num)) 		return 'Diners Club';
		else if(this.regs.jcb.test(num)) 		return 'JCB';
		
		else return false;
	},
	is_valid: function (cc_num){
		
		cc_num.replace(this.regs.nums_only,'');

		if(!this.regs.all_cards.test(cc_num)) return false;

		var numberProduct,
			numberProductDigitIndex,
			checkSumTotal = 0;
		
		for (	digitCounter = cc_num.length - 1; 
				digitCounter >= 0; 
				digitCounter--
		){
			checkSumTotal += parseInt (cc_num.charAt(digitCounter));
			digitCounter--;
			numberProduct = String((cc_num.charAt(digitCounter) * 2));
			for (	var productDigitCounter = 0;
					productDigitCounter < numberProduct.length; 
					productDigitCounter++
			){
				checkSumTotal += parseInt(numberProduct.charAt(productDigitCounter));
			}
		}
		return(checkSumTotal % 10 == 0);
	}
};

google.load("jquery", "1");
google.setOnLoadCallback(function(){
	var input = $('#cc_num');
	var span = $('#type');
	input.keyup(function(){
		if(type = cc.type(this.value)) span.html('Valid '+type);
		else span.html('Invalid');
	});
});

