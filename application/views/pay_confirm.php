<h1>Confirm Information:</h1>


<p>Please Verify the Information below. If it is correct, click Continue to be directed to our secure payment website. If it is incorect please <a href="/client/updateinfo">update your information</a>.</p> 

<h3>Billing Address:</h3>

<p><?=$fname?> <?=$lname?><br />
<?=$address?><br />
<?=$city?>, <?=$state?> <?=$zip?><br />
<?=$email?><br />
<small>[ <a href="/client/updateinfo">Edit</a> ]</small></p>

<h3>Invoices</h3>

<form method="post" action="https://www.securepay.com/secure18/index.cfm">

    <input type="hidden" name="Merch_id" value="58405" />
    <input type="hidden" name="transkey" value="2VCjn4pD8mg8TR52" />
    <input type="hidden" name="Success_URL" value="<?=site_url('/client/pay_return/s')?>" />
    <input type="hidden" name="Failure_URL" value="<?=site_url('/client/pay_return/f')?>" /> 
    <input type="hidden" name="FMethod" value="No" /> 
    <input type="hidden" name="SEND_MAIL" value="Yes" />

    
    <?=($lname)	? '<input type="hidden" name="Name" value="'.$fname.' ' .$lname.'" />' : ''?>
    
    <?=($address)?'<input type="hidden" name="Street" value="'.$address.'" />' 		: ''?>
    
    <?=($city)	? '<input type="hidden" name="City" value="'.$city.'" />' 				: ''?>
    
    <?=($state)	? '<input type="hidden" name="State" value="'.$state.'" />' 			: ''?>
    
    <?=($zip)	? '<input type="hidden" name="Zip" value="'.$zip.'" />' 				: ''?>
    
    <?=($email)	? '<input type="hidden" name="Email" value="'.$email.'" />' 			: ''?>



    <table width="98%" cellspacing="0">
        <thead>
            <tr>
                <td width="36">Inv. #</td>
                <td>Date</td>
                <td>Description</td>
                <td align="right">Amount</td>
             </tr>
        </thead>  
                
<?php 


foreach($invoices as $invoice): 
    extract($invoice);
    
?>
        <tr>
            <td>
                <?=$invoiceid?>
            </td>
            <td>
                <?=date('n/j/Y',strtotime($date))?>
            </td>
            <td>
                <a href="<?=$url?>"><?=$description?></a>
            </td>
            <td align="right">
                $<?=sprintf("%01.2f",$amount);?>
            </td>
        </tr>
        
<?php endforeach; ?>
        <tfoot>
            <tr>
                <td align="right" colspan="3" style="padding-right:8px;">Total:</td>
                <td align="right">$<?=sprintf("%01.2f",$total);?></td>
            </tr>
        </tfoot>
                
    </table>
    
    <p><input type="submit" value="Continue" disabled="disabled" /> (This is now disabled.)</p>
    
    <p><img src="/img/cards.gif" /></p>

        
    <input type="hidden" name="Amount" value="<?=sprintf("%01.2f",$total)?>" />
</form>
