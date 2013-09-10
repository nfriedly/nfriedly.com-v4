<?php

class Invoices extends Model {

    function Invoices()
    {
        // Call the Model constructor
        parent::Model();
    }
    
	function get_all($userid,$paid=0,$year=NULL){
		
		$this->db->order_by('invoiceid');
	
		// who
		if($userid == '*') { 
			$this->db->select('invoices.*, users.username');
			$this->db->join('users','invoices.userid = users.userid', 'left');
		}
		else {
			$this->db->where('userid', $userid);
		}
		// what
		if($paid !== NULL){
			$this->db->where('paid', $paid );
		}
		
		// when
		if($year && is_numeric($year)){
			$this->db->where('date >',$year);
			$this->db->where('date <',$year + 1);
		}
		
		// where
		$this->db->from('invoices');
		
		// all we're missing is the why...
		
       	return $this->db->get()->result_array(); 
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

	function mark_paid($userid,$ids,$amount = 0){
		// this should always be an array
		if(!is_array($ids)) $ids = array($ids);
		
		// first record what we're about to do
		$this->record_history('payment',array(
			'invoices'=>$ids, // a single id by this point
			'userid' => $this -> session -> userdata ( 'userid' ),
			'amount' => $amount
		));
	
		// then do it
		foreach($ids as $id){
			$this->db->where('invoiceid',$id);
			$this->db->where('userid',$userid);
			$this->db->update('invoices',array('paid'=>true));
		}
	}

	function record_history($type,$data){
		$userid = $this -> session -> userdata ( 'userid' );
		
		$dbdata = array('userid'=>$userid,'type'=>$type,'data'=>print_r($data,1));
		
		if(isset($data['userid'])) $dbdata['clientid'] = $data['userid'];
		if(isset($data['amount'])) $dbdata['amount'] = $data['amount'];
		
		$this->db->insert('history',$dbdata);
		$historyid = $this->db->insert_id();
		
		// now that we have the historyid, record the invoices
		if(isset($data['invoiceid'])) $data['invoices'] = array($data['invoiceid']); // for events that only affect one invoice
		if(isset($data['invoices'])) {
			foreach($data['invoices'] as $invoiceid){
				$this->db->insert('history_invoices',array(
					'historyid' => $historyid,
					'invoiceid' => $invoiceid
				));
			}
		}
	}
	
	function suggest_id(){
		if($res = $this->db->query("SHOW TABLE STATUS WHERE name='nf_invoices'")){
			$row = $res->row_array();
			return ($row['Auto_increment']) ? $row['Auto_increment'] : "" ;
		} else return "";
	}
}

?>