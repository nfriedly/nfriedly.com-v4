<?php

function dropdown($name,$options,$selectedValue=false, $addBlank = false){

	$html = sprintf('<select id="%1$s" name="%1$s">'."\r\n",$name);
	if($addBlank) {
		$html .= '<option value=""></option>'."\r\n";
	}
	foreach($options as $value => $name){
		if($selectedValue == $value) $selected = ' selected="selected" ';
		else $selected = "";
		$html .= sprintf('<option value="%s" %s>%s</option>'."\r\n",
			$value,
			$selected,
			$name
		);
	}
	return $html . "</select>";
}


// takes uploaded files, cleans the file name, saves it, and returns the url. 
// returns false on errors.
function handle_upload($name,$target_dir,$base_url){
	if(isset($_FILES[$name]) && !$_FILES[$name]['error']){
		$fname = eregi_replace(' ','_',$_FILES[$name]['name']);
		$fname = eregi_replace('[^a-z0-9\-_\.]','',$fname);
		$fname = eregi_replace('_+','_',$fname);
		if(move_uploaded_file($_FILES[$name]['tmp_name'], $target_dir . $fname)){
			return $base_url . $fname;
		}
		else echo "Error saving file";
	}
	return false;
}

?>