<?php

class Usermodel extends Model {

    function Usermodel()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    function check_and_get($username, $password)
    {
		if(!$result = $this->get($username)) return false;
		elseif($result->password != md5($password)) return false;
		else return $result;
    }
	
	function get($username){
        $result = $this->db->get_where('users', array('username' => $username),1)->result();
		if(!sizeof($result)) return false;
		else return $result[0];		
	}
	
	function get_all(){
		 $this->db->select('username, fname, lname');
		 return $this->db->get('users')->result();
	}

	function list_users(){
		// returns an array of userid => fname, lname ( login )
		$query  = $this->db->query("SELECT userid, concat(fname, ' ', lname, ' (', username, ')') as name FROM nf_users");
		$return = array();
		foreach($query->result() as $row){
			$return[$row->userid] = $row->name;
		}
		return $return;
	}
	
	function update($userid,$data){
		// update the data
		$this->db->where('userid',$userid);
		$this->db->update('users', $data); 
		
		// and return a fresh copy of what's actually in the database
		$query = $this->db->get_where('users', array('userid' => $userid),1);
		return $query->row();
	}
	
	function get_history($userid, $all = false){
			$this->db->select('history.*,
				history_invoices.*,
				invoices.description, 
				invoices.url , 
				invoices.date AS inv_date, 
				invoices.amount as inv_amount'
			);
			$this->db->from('history');
			$this->db->join('history_invoices','history_invoices.historyid = history.id', 'left');
			$this->db->join('invoices','invoices.invoiceid = history_invoices.invoiceid', 'left');
			$this->db->where('clientid', $userid);
			$this->db->where('deleted','n');
			if(!$all) $this->db->where('timestamp >=', date("Y-m-d",strtotime("-1 month")));
			$this->db->order_by('timestamp','desc');
			return 	$this->db->get()->result_array(); 
	}

	function get_all_history($userid){
			return $this->get_history($userid,true);
	}
	
	function add($data){
		if(isset($data['password'])) $data['password'] = md5($data['password']);
		$return = $this->db->insert('users', $data);
		//if($return) $this->record_history('added invoice',$data);
		return $return;
	}


/*	// hopefully I won't need this guy again
	function fix_history(){
		$query = $this->db->query("SELECT * FROM nf_history WHERE type in (\"added invoice\", \"updated invoice\")");
		echo '<pre>';
		foreach ($query->result_array() as $row){
			echo "data: " . $row['data'];
			$imatch = array();
			$invoiceid = preg_match("/\[invoiceid\] \=\> ([0-9]{1,3})/",$row['data'],$imatch);
   			echo "\r\ninvoiceid: ";
			echo ($invoiceid)? $imatch[1] : 'not found';
			
			$cmatch = array();
			$clientid = preg_match("/\[userid\] \=\> ([0-9]{1,3})/",$row['data'],$cmatch);
   			echo "\r\nclientid: ";
			echo ($clientid)? $cmatch[1] : 'not found';
			
			if($clientid && $invoiceid){
				$sql = "UPDATE nf_history SET invoiceid=".$imatch[1].", clientid=".$cmatch[1]." WHERE id=".$row['id']." Limit 1";
				echo "\r\n".$sql . "\r\n";
				print_r($this->db->query($sql));
			}
			echo "\r\n\r\n";
		}	
	}
	
*/


}
?>