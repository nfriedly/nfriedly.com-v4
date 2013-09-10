<form action = "/admin/invoice/<?=$invoiceid?>" method="post" enctype="multipart/form-data" />
<input type="hidden" name="act" value="<?=$act?>" />
<table>
	<tr>
		<td>Client</td> 
		<td><?=dropdown('userid',$this->users, $userid, true)?></td> 
	</tr>
	<tr>
		<td>Invoice Number</td> 
		<td><input name="invoiceid" value="<?=$invoiceid?>" /></td> 
	</tr>
	<tr>
		<td>Description</td> 
		<td><input name="description" value="<?=$description?>" /></td> 
	</tr>
    <tr>
    	<td>Amount</td>
        <td><input name="amount" value="<?=$amount?>" /></td>
	<tr>
		<td>File</td> 
		<td><input name="file" type="file" /></td> 
	</tr>
	<tr>
		<td>Date</td> 
		<td><input name="date" value="<?=$date?>" /></td> 
	</tr>
	<tr>
		<td>Paid</td> 
		<td><?=dropdown('paid', array('no','yes'), $paid)?></td> 
	</tr>
	<tr>
		<td>&nbsp;</td> 
		<td><input type="submit" value="Save" /></td> 
	</tr>
</table>
</form>