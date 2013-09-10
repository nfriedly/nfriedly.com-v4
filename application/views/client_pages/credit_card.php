<h1>Credit Card:</h1>

<?=(isset($message))?"<p class=\"highlight message\">$message</p>":''?>

<p>Please enter your credit card information below.</p>

<form action="/client/card_check">

<p>Credit Card Number:<br />
	<input  name="cc_num" id="cc_num" autocomplete="off" /> <span id="type"></span>
</p>


<p>Expiration Date:<br />
	<select id="month" name="month">
	<?php foreach($months as $value => $name): ?>
		<option value="<?=$value?>"><?=$name?></option>
	<?php endforeach; ?>
	</select>
	
	<select id="year" name="year">
	<?php foreach($years as $year): ?>
		<option value="<?=$year?>"><?=$year?></option>
	<?php endforeach; ?>
	</select>
</p>


<p><input type="submit" value="Continue" /></p>


<p class="right" title="Your information is encrypted with GeoTrust high-grade 256-bit end-to-end encryption during transport, and is not stored on this server." style="margin-top:0;cursor:help;">
	<img src="/img/lock.png" alt="" />
	<b>Secure Site</b>
	<br />
	256-bit Encryption
</p>

<p><img src="/img/cards.gif" alt=""><br />
Visa, Master Card, Discover, and American Express are accepted.</p>


</form>



<script type="text/javascript" src="https://www.google.com/jsapi?key=ABQIAAAAWMsuqAAoJe0vLYg5hsR_RhSOpBqeijn_PFXyh9G70yoMxuLEGxQp76oyfuI3ixXHxHGC_R4Z3BMQ3w"></script>
<script type="text/javascript" src="/scripts/cards.js"></script>