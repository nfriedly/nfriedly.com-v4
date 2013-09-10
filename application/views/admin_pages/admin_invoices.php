<?php if(isset($invoices) && sizeof($invoices)): ?>

	
		<table width="98%" cellspacing="0">
        	<thead>
            	<tr>
                	<td>&nbsp;</td>
                  	<td width="36">Inv. #</td>
                    <td>Date</td>
                    <td>Description</td>
                    <td align="right">Amount</td>
                    <td>Paid</td>
                 </tr>
            </thead>  
                    
	<?php 	
	foreach($invoices as $invoice): 
		extract($invoice);
	?>
			<tr>
				<td>
					<a href="/admin/account/<?=$username?>"><?=$username?></a>
				</td>
                <td>
					<a href="/admin/invoice/<?=$invoiceid?>"><?=$invoiceid?></a>
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
                <td>
                	<?=($paid)?'y':'n'?>
                </td>
			</tr>
			
	<?php endforeach; ?>
		</table>
			
<?php else: ?>

<p>There are no invoices to display.</p>
	
<?php endif; ?>