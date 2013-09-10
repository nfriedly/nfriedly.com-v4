<?php

class MY_Input extends CI_Input {
	
	function MY_Input(){
		parent::CI_Input();
	}

	function post($index = '', $xss_cleen = false){
		if(is_array($index)){
			$results = array();
			foreach($index as $thisIndex){
				$results[$thisIndex] = parent::post($thisIndex, $xss_cleen);
			}
			return $results;
		}
		else {
			return parent::post($index, $xss_cleen);
		}
		
	}
}