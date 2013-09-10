<?php

class Invoices extends Model {

    function Invoices()
    {
        // Call the Model constructor
        parent::Model();
    }
    
	function get_all($userid){
	
		$this->db->order_by('invoiceid');
	
		if($userid == '*') { 
			$this->db->select('invoices.*, users.username');
			$this->db->from('invoices');
			$this->db->join('users','invoices.userid = users.userid', 'left');
			return $this->db->get()->result_array(); 
		}
		
       	$query = $this->db->get_where('invoices', array('userid' => $userid, 'paid' => 0 ));
		return $query->result_array();
	}
	
	function get_list($userid, $list){
		$this->db->where('userid', $userid);
		$this->db->where_in('invoiceid',$list);
		$query = $this->db->get('invoices');
		return $query->result_array();
	}
	
	function get_invoice($invoiceid=0){
		$this->db->where('invoiceid', $invoiceid);
		$query = $this->db->get('invoices');
		return $query->row_array();	
	}

	function add($data){
		$return = $this->db->insert('invoices', $data);
		if($return) $this->record_history('added invoice',$data);
		return $return;
	}
	
	function update($invoiceid, $data){
		$this->db->where('invoiceid', $invoiceid);
		$return = $this->db->update('invoices', $data);
		if($return) $this->record_history('updated invoice',$data);
		return $return;	
	}

	function mark_paid($userid,$ids){
		if(is_array($ids)) {
			foreach($ids as $id){
				$this->mark_paid($userid,$id);
			}
		} else {
			$this->db->where('invoiceid',$ids);
			$this->db->where('userid',$userid);
			$this->db->update('invoices',array('paid'=>true));
			$this->record_history('payment',array(
				'invoiceid'=>$ids, // a single id by this point
				'userid' => $this -> session -> userdata ( 'userid' )
			));
		}
	}

	function record_history($type,$data){
		$userid = $this -> session -> userdata ( 'userid' );
		
		$dbdata = array('userid'=>$userid,'type'=>$type,'data'=>print_r($data,1));
		
		if(isset($data['invoiceid'])) $dbdata['invoiceid'] = $data['invoiceid'];
		if(isset($data['userid'])) $dbdata['clientid'] = $data['userid'];
		
		$this->db->insert('history',$dbdata);
	}
	
	function suggest_id(){
		if($res = $this->db->query("SHOW TABLE STATUS WHERE name='nf_invoices'")){
			$row = $res->row_array();
			return ($row['Auto_increment']) ? $row['Auto_increment'] : "" ;
		} else return "";
	}
}

?>