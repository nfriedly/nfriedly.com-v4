
<h1>Your Account</h1>
<p>Hi <?=$this->session->userdata('fname')?></p>

<?php if(isset($message)) : ?>
<div id="message"><?=$message?></div>
<?php endif; ?>
