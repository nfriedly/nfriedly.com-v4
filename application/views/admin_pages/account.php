<h1><?=(isset($userid))?'Edit':'Add'?> Account</h1>

<form action = "/admin/account_admin/<?=$act?>" method="post"  />

<?php if(isset($message)): ?>
<p><?=$message?></p>
<?php endif; ?>

<?php if(isset($userid)): ?>
<input type="hidden" name="userid" value="<?=$userid?>" />
<?php endif; ?>

<table>
	<tr>
		<td>Username</td> 
		<td><input name="username" value="<?=(isset($username))?$username:''?>" /></td> 
	</tr>
	<tr>
		<td>Password</td> 
		<td><input name="password" value="<?=(isset($password))?$password:''?>" /></td> 
	</tr>
	<tr>
		<td>&nbsp;</td> 
		<td><input type="submit" value="Save" /></td> 
	</tr>
</table>
</form>