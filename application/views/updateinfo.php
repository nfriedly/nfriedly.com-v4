<h1>Update your info</h1>

<p>Please use your billing information.</p>

<?=form_open('client/updateinfo')?>

	<table>
	<?php foreach($fields as $field=>$name): ?>
	
		<tr>
			<td><b><?=$name?>:</b></td>
			<td><?=form_input($field, $this->validation->$field)?></td>
			<?php 
			$error_name = $field."_error";
			if($this->validation->$error_name): ?>
			<td class="errors">
				<?=$this->validation->$error_name?>
			</td>
			<?php endif; ?>			
		</tr>
	
	<?php endforeach; ?>
	</table>

<input type="submit" name="submit" value="Continue" />

</form>
