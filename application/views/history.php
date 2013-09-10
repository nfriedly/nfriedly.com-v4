<?php if(!isset($history_type)) $history_type = ""; ?>

<h2><?=ucwords($history_type)?> History</h2>

<?php if(isset($history) && sizeof($history)): ?>

	
	<table width="98%" cellspacing="0" id="history">
		<thead>
			<tr>
				<td title="Date of History">Date</td>
				<td>Type</td>
				<td>Description</td>
				<td width="36" title="Invoice Number">Inv. #</td>
				<!-- td title="Date of Invoice">Inv. Date</td -->
				<td align="right">Inv. Amount</td>
				<td align="right">Total</td>
			 </tr>
		</thead>  
                    
<?php 

$lasthistoryid = 0;
foreach($history as $item): 
	extract($item);
	if($historyid != $lasthistoryid):
	// two different branches: one for the first invoice in a piece of history, one for subsequent invoices
?>
		<tr>
			<td>
				<?=date('n/j/Y',strtotime($timestamp ))?>
			</td>
			<td>
				<?=ucwords($type)?>
			</td>
			<td>
				<?php if($item['url']): ?>
				<a href="<?=$url?>"><?=$description?></a>
				<?php else: ?>
				<?=$description?>
				<?php endif; ?>
			</td>
			<td>
				<?=(isset($item['invoiceid']))?$item['invoiceid']:''?>
			</td>
			<!-- td>
				<?=(isset($item['inv_date']))?date('n/j/Y',strtotime($item['inv_date'])):''?>
			</td -->
			
			<td align="right">
				<?php 
				if($type == 'payment' && isset($item['inv_amount'])) echo '$'.sprintf("%01.2f",$inv_amount);
				elseif(isset($item['amount'])) echo '$'.sprintf("%01.2f",$amount);
				?>
			</td>			
			
			<td align="right">
				$<?=sprintf("%01.2f",$amount);?>
			</td>
		</tr>
	<?php else: ?>
	
		<tr>
			<td>&nbsp;
				
			</td>
			<td>&nbsp;
				
			</td>
			<td>
				<?php if($item['url']): ?>
				<a href="<?=$url?>"><?=$description?></a>
				<?php else: ?>
				<?=$description?>
				<?php endif; ?>
			</td>
			<td>
				<?=(isset($item['invoiceid']))?$item['invoiceid']:''?>
			</td>
			
			<!-- td>
				<?=(isset($item['inv_date']))?date('n/j/Y',strtotime($item['inv_date'])):''?>
			</td -->
			
			<td align="right">
				<?=(isset($item['inv_amount']))?'$'.sprintf("%01.2f",$inv_amount):''?>
			</td>			

			<td align="right">&nbsp;
				
			</td>
		</tr>
	
	<?php endif; ?>
<?php 
	$lasthistoryid = $historyid;

endforeach; ?>
				
	</table>
	
<?php else: ?>

<p>You have no <?=$history_type?> history to display.</p>
	
<?php endif; ?>


<?php if($history_type == "recent"): ?>

<br />
<a href="/client/history">View All History</a>

<?php endif; ?>