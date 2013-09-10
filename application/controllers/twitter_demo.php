<?php

class Twitter_demo extends Controller {

	function Twitter_demo(){
		parent::Controller();
	}
	
	function index(){
		
		$this->load->library('twitter');
	
		$userid = $this->input->post('userid');
		$password = $this->input->post('password');
		$this->twitter->auth($userid, $password);
		
		$data = array();
		
		if($this->input->post('follow')) {
			$data['follow'] = $this->twitter->call('friendships', 'create',array('id' => '1139651', 'follow'=>'true'));
		}
		if($this->input->post('update')) {
			$data['update'] = $this->twitter->call('statuses', 'update', array('status' => '@nfriedly is awesome! http://nfriedly.com/demos/twitter'));
		}
		if($this->input->post('dm')) {
			$data['dm'] = $this->twitter->call('direct', 'messages_list');
			if(sizeof($data['dm'])) $data['dm'] = array_slice($data['dm'],0,1);
		}


		exit(json_encode($data));
		
	}
	

}

?> 