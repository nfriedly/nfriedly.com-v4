<?php header("Location: http://nfriedly.com/estimate"); exit(); ?>

<?php $GLOBALS['extracredit'] = 'Photos by <a href="http://www.sxc.hu/photo/1011312">Lars Sundström</a> &amp; <a href="http://www.sxc.hu/profile/mterraza">Marcelo Terraza</a>'; ?>


<h1>Get a quote</h1>
<form action="/submit" method="post">
	<img src="/img/danger_hard_hat_area.jpg" alt="" class="right" />
	<h4>What do you need?</h4>
	<p>
		<input type="radio" name="need" value="Whole Website" />A whole website<br />
		<input type="radio" name="need" value="Just Development Work" />Just some work on an existing one<br />
	</p>
	
	<h4>How big will it be?</h4>
	<p>
		<input type="radio" name="pages" value="Single page" />Just one page<br />
		<input type="radio" name="pages" value="A few pages" />A few pages<br />
		<input type="radio" name="pages" value="CMS" />A whole lot of pages (or a <acronym title="Content Management System">CMS</acronym>)
	</p>
	
	<h4>Will I be working on a web application?</h4>
	<p>(Will the site <em>do something</em> as opposed to just having information? This is my area of expertiese.)</p>
	<p>
		<input type="radio" name="webapp" value="Yes" />Yes<br />
		<img class="right" src="/img/cone.jpg" alt="" style="margin-right:30px;" />
		<input type="radio" name="webapp" value="No" />No
	</p>
	
	<h4>Check off any items that you would like in your site:</h4>
	<p>
		<input type="checkbox" name="Site Email" />E-Mail accounts @YourDomain.com<br />
		<input type="checkbox" name="Blog" />A Site Blog<br />
		<input type="checkbox" name="User Accounts" />Password protect areas of the site or allow users to login<br />
		<input type="checkbox" name="CMS" />Ability to update the site yourself from an admin area<br />
		<input type="checkbox" name="Logo" />A new logo design<br />
		<input type="checkbox" name="Shopping Cart" />A shopping cart
	</p>
	
	<p>Any work I do will include clean code, and search engine optimization.</p>
	
	<h4>In as much detail possible, please describe your goal to me:</h4>
	<textarea name="message" style="width:548px;" cols="80" rows="15"></textarea>

	<img src="/img/hardhat.jpg" alt="" class="right" style="margin-right:30px;margin-top:10px;" />	
	<table>
		<tr>
			<td>Your name:</td>
			<td><input name="name" /></td>
		</tr>
		<tr>
			<td>Your email:</td>
			<td><input name="email" /></td>
		</tr>
	</table>
	<p class="sb">Leave this blank: 
	<input class="sb" name="website" value="" /></p>
	
	<p><input type="submit" value="Send" /></p>

</form>

<?php include(APPPATH . 'views/footer.php'); ?>
