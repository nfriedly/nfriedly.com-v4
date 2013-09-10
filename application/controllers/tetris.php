<?php

class Tetris extends Controller {

	function Tetris()
	{
		parent::Controller();
		$this->load->library('session');
	}
	
	function form(){
		echo '<form action="/tetris" method="post" target="asdf">piece: <input name="piece" value="j" /><br>board: <textarea name="board" rows="20" cols="10">.......... .......... .......... .......... .......... .......... .......... .......... .......... .......... .......... .......... .......... .......... .......... .......... .......... .......... .......... ..........</textarea><br /><input type="submit" value="go" /></form><iframe name="asdf" src="#"></iframe><p><a href="http://tetrisapp.appspot.com/">http://tetrisapp.appspot.com/</a></p>';
	}
	
	function index()
	{
		$board = $this->input->post('board');
		$piece = $this->input->post('piece');
		
		log_message('error',"next piece: $piece");
		
		if(!$board) $board = "........";
		if(!$piece) $piece = "t";
		
		$board = $this->_parse_shape($board);
		$piece = $this->_get_piece($piece);
				
		$res = $this->_find_fit($board,$piece);
				
		extract($res);
		/* */
		
		//$pos = rand(0,9);
		//$deg = rand(0,3)*90;
		
		$msg = "position=$pos&degrees=$deg";
		echo $msg;
		
		log_message('error', "returning: $msg;" );
		exit();
		
	}
	
	function _get_piece($piece){
		switch(strtolower($piece)){
			case "i":
				$shape = 	"i ".
							"i ".
							"i ".
							"i";
			break;
			case "j":
				$shape = 	".j ".
							".j ".
							".j ".
							"jj";	
			break;
			case "l":
				$shape = 	"l. ".
							"l. ".
							"l. ".
							"ll";	
			break;
			case "0":
				$shape = 	"oo ".
							"oo";				
			break;
			case "s":
				$shape = 	".ss ".
							"ss.";					
			break;
			case "t":
				$shape = 	"ttt ".
							".t.";				
			break;
			case "z":
				$shape = 	"zz. ".
							".zz";				
			break;
			default:
				return $this->_parse_shape('i');
		}
		return $this->_parse_shape($shape);
	}
	
	function _parse_shape($str){
		$shape = array();
		$rows = explode(" ",$str);
		foreach($rows as $row_num => $row){
			$thisrow = array();
			$pieces = str_split($row);
			foreach($pieces as $space_num => $piece){
				$thisrow[$space_num] = ($piece == '.') ? false : true; // true means there's something there.
			}
			$shape[$row_num] = $thisrow;
		}
		log_message('error',"shape: ".$this->_print($shape) );
		return $shape;
	}
	
	function _find_fit($board,$piece){
		$top_row = false;
		foreach ($board as $row_num => $row){
			if(in_array(true,$row)){
				$top_row = ($top_row) ? $top_row : $row_num;
				return $this->_fit_line($row,$piece);
			}
		}
		return array('pos' => rand(0,9),
					 'deg' => rand(0,3)*90
		);
	}
	
	function _fit_line($row,$piece){
		$bottom_widths = $this->_get_bottom_widths($piece);
		$rotation = $this->_get_max_width($bottom_widths);
		$width = $bottom_widths[$rotation];
		$pos = $this->_find_hole($row,$width); // ignores the fact that pieces may be wider than their bottom width
		if($pos === false) $pos = rand(0,9);
		return array('pos'=>$pos,'deg'=>$rotation);
	}
	
	function _get_bottom_widths($piece){
		$return = array();
		for($i=0;$i<360;$i=$i+90){
			$curpiece = $this->_rotate($piece,$i);
			$bottom_row = $curpiece[sizeof($curpiece)-1];
			$width=0;
			foreach($bottom_row as $val){
				if($val) $width++;
			}
			$return[$i] = $width;
		}
		return $return;
	}
	
	function _get_max_width($widths){
		$max_width = 0;
		$opt_rotation = 0;
		foreach($widths as $rotation => $width){
			if($width > $max_width){
				$max_width = $width;
				$opt_rotation = $rotation;
			}
		}
		return $opt_rotation;
	}
	
	function _find_hole($row,$hole_size){
		$cur_size = 0;
		foreach($row as $pos => $val){
			if($val) $cur_size = 0;
			else{
				if($cur_size >= $hole_size) return $pos - $cur_size;
				$cur_size++;
			}
		}
		return false;
	}
	
	function _rotate($piece, $degrees){
		if(!$degrees) return $piece;
		$new_piece = array();
		$old_width = sizeof($piece[0]) -1; // -1 because arrays start at 0.
		$old_height = sizeof($piece) -1;
		foreach($piece as $old_y => $row){
			foreach($row as $old_x => $val){
				$new_piece[$old_x][$old_height - $old_y] = $val;
			}
		}
		ksort($new_piece); // it's not javascript. php arrays stay in whatever order you built them unless you ksort them.
		foreach($new_piece as $y => $row){
			 ksort($row);
			$new_piece[$y] = $row;
		}
		return ($degrees == 90) ? $new_piece : $this->_rotate($new_piece,$degrees - 90);
	}
	
	function _print($shape,$text=""){
		$str = "$text\r\n\r\n";
		foreach($shape as $row){
			foreach($row as $piece){
				$str .= ($piece) ? 'x' : '.';
			}
			$str .= "\r\n";
		}
		return $str;
	}
}

/* End of file page.php */
/* Location: ./system/application/controllers/page.php */