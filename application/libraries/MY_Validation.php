<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

//http://www.sellersrank.com/codeigniter/using-the-code-igniter-validation-class-to-set-default-form-values/

class MY_Validation extends CI_Validation {

   function My_Validation()
   {
	   parent::CI_Validation();
   }

   function set_default_values($data, $value = null)
   {
	   if (is_array($data) == TRUE)
	   {
		   foreach($data as $field => $value)
		   {
			   $this->$field   = $value;
			   $_POST[$field]  = $value;
		   }
	   }
	   else
	   {
		   $this->$data    = $value;
		   $_POST[$data]   = $value;
	   }
   }
}
?>
