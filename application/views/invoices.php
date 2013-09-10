

<h2>Invoices</h2>

<script type="text/javascript">
function checkall(ckd){
	var f,c,
		i=0,
		d=document; 
	f=d.getElementById('invoices'); 
	c=f.getElementsByTagName("input"); 
	for(i; i<c.length; i++){
		//alert(i +' = '+c[i] + '\ntype = ' + c[i].type + '\nchecked = '+c[i].checked);
		if(c[i].type == "checkbox") {
			c[i].checked = (ckd) ? true : false; 
		}
	}; 
};
</script>

<?php if(isset($invoices) && sizeof($invoices)): ?>

	
	
	<form action="/client/pay_confirm" method="post" id="invoices" />
		<table width="98%" cellspacing="0">
        	<thead>
            	<tr>
                	<td><input type="checkbox" name="check_all" title="check / uncheck all" onclick="checkall(this.checked);" /></td>
                  	<td width="36" title="Invoice Number">Inv. #</td>
                    <td title="Date Invoice Was Sent">Date</td>
                    <td>Description</td>
                    <td align="right">Amount</td>
                 </tr>
            </thead>  
                    
	<?php 
	
	$total = 0;
	
	foreach($invoices as $invoice): 
		extract($invoice);
		$total += $amount; 
		
	?>
			<tr>
				<td>
					<input type="checkbox" name="pay[<?=$invoiceid?>]" <?=(sizeof($invoices)==1)?'checked="checked"':''?> />
				</td>
                <td>
					<?=$invoiceid?>
                </td>
                <td>
					<?=date('n/j/Y',strtotime($date))?>
                </td>
				<td>
					<?php if($url): ?>
                    <a href="<?=$url?>"><?=$description?></a>
                    <?php else: ?>
                    <?=$description?>
                    <?php endif; ?>
                </td>
				<td align="right">
					$<?=sprintf("%01.2f",$amount);?>
                </td>
			</tr>
			
	<?php endforeach; ?>
    		<tfoot>
            	<tr>
                	<td align="right" colspan="4" style="padding-right:8px;">Total:</td>
                    <td align="right">$<?=sprintf("%01.2f",$total);?></td>
            	</tr>
            </tfoot>
					
		</table>
        
        <p><input type="submit" value="Pay with Credit Card" /></p>
        
        <p><img src="/img/cards.gif" /></p>
		
		<!--table>
			<tr>
				<td valign="top">
					<button type="submit" name="pay" >
						<b>Pay <span id="js_amount"><?=sprintf("%01.2f",$total)?></span> with Credit Card</b><br />
						<img src="/img/cards.gif" />
					</button>
				</td>
				<td valign="middle">
					 - Or -	
				</td>
				<td>
					<b>Pay With Check</b>
					<p>Please make checks payable to Nathan Friedly and mail them to:<p> 
					<p>nFriedly Web Development
					725-6 Clifton Colony Dr
					Cincinnati OH 45220</p>
					
				</td>
			</tr>
		</table -->
	</form>
	
<?php else: ?>

<p>You have no invoices currently. Looks like you're all payed up!</p>
	
<?php endif; ?>

<br /><br />