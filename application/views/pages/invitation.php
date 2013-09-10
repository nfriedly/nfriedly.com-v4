<!DOCTYPE html>
<html><head><title>Rue La La - Invitations</title>
<body>


<h1>Fake test page</h1>

<div style="border: 1px dotted black; float: left;">
	<div id="rondavu_container"></div>
</div>

<script>
var RondavuData = {
	"config": {
		"version": "1.1"
	},
	
	/*
	"signature": {
		"user": "EgGinVixzcZoweKTzp9sqkcdHFwI86or7C1l1eYpsAIzwXQY9A763bXpy4aSrrzOWsG7R38AANbz\r\nsu30CZYfA6cl82L5mUKAEdCJu2hRGt2sy0Z2D3Eer1jFTnJLD16L4UJyVqhiHXUxCikUzXDp2dyA\r\nW3WDueBrThSBYjQzlBpGo1Ac9Eqsqkd2R/qQS5dyqmnpkYFcIb+psLbMquqzxpehs3Ogd4XzZxmj\r\nxkw74cCHtlippxx4D0wLZ95TjaHuUAmxLgKsBvHpqGFDnTDUNDL38gtz8VUIiSdCdd+tUG9MkUyS\r\noRUw4cSVbe5+idz3TxWpnl5KOF6HpmkrhOV3QQ==",
		
		"page": "lgpB6Pot9rd9vpNzeKB5DZ5fp7A0kUOitavuGDBHaeH2lRTX/JK+nsCQ/EQBnqORA2blZHynIzrG\r\nfHPNc3AbYW84bdTMF7KSXKkxKhCz2Yv5DiJjjXtsIiRJIhmuD0FYu5Q1aihohx8zipN5emnENzPB\r\nfzsKPrski3tESprhIXQLnPeeQ04cJek4UiUTJrVbLicGAVRa0XHLo9+3Ak1QEw1mQJ22YW+LDsbX\r\nlfAzMOtpFjSGfAjhRbahgY/7E8rlW0QMQOyxptzwANJ/T9SryIbBAhSo6MbmDjZPUkqzrr7O3pnc\r\nNBrVNvbAuU1B+q4ocOLldRcE4lgTs3ySY1BPgg==",
		
		"primary_mo": "ESpCktNM0Pd2YbpVyPp659Tyt1wpBwzBZ0HGGrh8AbG1OC8eBnGJyjIQrHz16RDOb1/hlu+cT9Zb\r\nt2PGfOkVMHVcBamXajkd8ZE0Z1oXU44builJr3YmqtQQsFqe8DcsfmkukP048+Dcb2AYheGk8KRZ\r\nu5W87BLO8fne/7Zu8FmGdQKZ11yOUsIzb1ld0aAxVWdo0OY1q+wkBxtLc8thlloS51YVACnt8N08\r\ndArOAlnd49T24IkbA6ZBDj/1cj3wl/U4xOwJo7NhWHc1yUnXSkW3RqbdZ8ozal489VazuOwPxIA8\r\nTEkC3KmfUDbBmSCNhO+tT1Uy93ee1vumC/JCIw=="
	},
	*/
	/*"user_base64": "eyJpZCI6W3siaWQiOjczMDEzNzQsInR5cGUiOiJydWVsYWxhIn1dLCJ0cmFja2luZyI6W3sibmFt\r\nZSI6InJlZmVycmVySWQiLCJ2YWx1ZSI6Ik56TXdNVE0zTkE9PSJ9LHsibmFtZSI6ImVLZXkiLCJ2\r\nYWx1ZSI6ImJtRjBhR0Z1UUhOdlkybGhZbXhsYkdGaWN5NWpiMjA9In0seyJuYW1lIjoiYWlkIiwi\r\ndmFsdWUiOjI4Njh9XX0=",
	
	"page_base64": "eyJkaXNhYmxlIjpmYWxzZSwibGFuZ3VhZ2UiOiJlbi1VUyJ9",
	
	"primary_mo_base64": "eyJpZCI6W3siaWQiOiJpbnZpdGF0aW9uIiwidHlwZSI6InBhZ2UifV0sIm5hbWUiOlt7Im5hbWUi\r\nOiJZb3VyIGludml0YXRpb24gdG8gUnVlIExhIExhLiIsImxhbmd1YWdlIjoiZW4tVVMiLCJwcmlt\r\nYXJ5Ijp0cnVlfV0sInByb21vdGlvbiI6eyJkb19wcm9tb3RlIjpmYWxzZX0sInVybCI6eyJkZXRh\r\naWwiOiJodHRwczovL3d3dy5ydWVsYWxhLmNvbS9yZWdpc3RyYXRpb24iLCJwaWN0dXJlIjp7InBy\r\naW1hcnkiOiJodHRwOi8vd3d3LnJ1ZWxhbGEuY29tL2ltYWdlcy9jb250ZW50L2ZiL3JsbC1sb2dv\r\nLTkwYnk5MC5qcGciLCJwcmltYXJ5X3NlY3VyZSI6Imh0dHBzOi8vd3d3LnJ1ZWxhbGEuY29tL2lt\r\nYWdlcy9jb250ZW50L2ZiL3JsbC1sb2dvLTkwYnk5MC5qcGcifX0sInByaW1hcnlfdGFnIjoicGFn\r\nZV9pbnZpdGF0aW9uIn0=",
	*/
	
	page: {"disable":false,"language":"en-US"},
	
	"primary_mo": {
		"id": [{
			"id": "invitation",
			"type": "page"
		}],
		"name": [{
			"name": "Your invitation to Rue La La.",
			"language": "en-US",
			"primary": true
		}],
		"promotion": {
			"do_promote": false
		},
		"url": {
			"detail": "https://ruestage.ruelala.com/registration",
			"picture": {
				"primary": "http://www.ruelala.com/images/content/fb/rll-logo-90by90.jpg",
				"primary_secure": "https://www.ruelala.com/images/content/fb/rll-logo-90by90.jpg"
			}
		},
		"primary_tag": "page_invitation"
	},
	"user": {
		"id": [{
			"id": 479478,
			"type": "ruelala"
		}],
		"tracking": [{
			"name": "referrerId",
			"value": "NDc5NDc4"
		}, {
			"name": "eKey",
			"value": "a2thbmR1bGFAcnVlbGFsYS5jb20="
		}]
	}
	
	
	/*"config":{"version":"1.1"},"page":{"disable":false,"language":"en-US"},"primary_mo_etag":"0aff4e8e3ec94a38052f5974b8ae61ef","mos_etags":[],"signature":{"user":"N3fXQ/khjIk5mbfqT1rfN2hrDa8sfk4OelP+4sh5mc0Rh9tQmdKyo53+VNkUgeIOXI6TUywwhr/M\r\nA8KYnjsnZbEYDcdyaqVZX+iMSnjEiF15mcpWqW68eoKCbjqREwcupCqmoqfIyqPcfd7ELPmBfV0R\r\nuM/h9vE8oOp3u1X6nshrz/bG9NygL1taONmS/dlfXb38f1l77mWJ7uPhRJ5VYjg8KzGkZdIWsZFM\r\n4y8dM4HroJDfziUzncBtn0hPzlIWMtfUxmEzRHNvTeSMVFSJRQRTUFnVWkld44MVJzoIqvAfYmpc\r\nk+VweAGuft3iPwE/j5btWBXlMJmR2FX5OVtjcg=="},"user_base64":"eyJpZCI6W3siaWQiOjQzMTAsInR5cGUiOiJydWVsYWxhIn1dLCJ0cmFja2luZyI6W3sibmFtZSI6\r\nInJlZmVycmVySWQiLCJ2YWx1ZSI6Ik5ETXhNQT09In0seyJuYW1lIjoiZUtleSIsInZhbHVlIjoi\r\nYm1GMGFHRnVRSE52WTJsaFlteGxiR0ZpY3k1amIyMD0ifV19"
	*/
};
(function(){
	var s = document.createElement('script'); 
	s.async = true; 
	s.src = ('https:' == window.location.protocol ? 'https://s3.amazonaws.com/' : 'http://') + 'qa.rondavu.com/C/RLL_QA/rondavu.js';
	document.getElementsByTagName('head')[0].appendChild(s); 
})();

</script>
</body>
</html>