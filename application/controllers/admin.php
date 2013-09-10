<?php

require_once('client.php');

class Admin extends Client{

	function Admin(){
		parent::Client();
		$this->load->model('invoices','',true);
		$this->check_login();	
	}

	function index(){
		$this->go('/admin/invoice');
	}

	function check_login(){
		// calls the parrent function, then checks the access level also
		if(parent::check_login() && $this->session->userdata('accesslevel') == 'admin') return true;
		else $this->go('/client/login');
	}

	function invoice($invoiceid=false){
	
		$this->load->helper('forms');
		$this->load->model('usermodel','',true);
			
		$this->users = $this->usermodel->list_users();
		
		if($invoiceid){
			$data = $this->invoices->get_invoice($invoiceid);
			$data['act'] = 'edit_invoice';
		} else {
			$data = $this->_empty_data();
		}
				
		$output = array();
		
		
		if($this->input->post('act') == 'add_invoice'){
			//echo '<!-- adding invoice -->';
		
			$data = $this->input->post($this->invoice_fields);
			$data['url'] = handle_upload('file',$this->file_base_path, $this->file_base_url);
			
			$data['date'] = date('Y-m-d',strtotime($data['date']));
			
			//echo ('<!-- data: ' . print_r($data) . ' -->');
				
			if($this->invoices->add($data)) $output['message'] = "The invoice was saved!";
			else $output['message'] = "Error: The invoice was not saved!";

			$data = $this->_empty_data();
			
		} elseif ($this->input->post('act') == 'edit_invoice'){
			$old_data = $data;
			
			//echo "<!-- old_data (should match): ".print_r($old_data,1)." -->\r\n";
			
			// this wouldn't normally work, but I tweaked the input library to allow it.
			$data = $this->input->post($this->invoice_fields);
			$data['date'] = date('Y-m-d',strtotime($data['date']));
			$data['url'] = handle_upload('file',$this->file_base_path, $this->file_base_url);

			//echo "<!-- data[url]: $data[url] - type". gettype($data['url'])." -->\r\n";
			
			
			if(!$data['url']) $data['url'] = $old_data['url'];
			
			//echo "<!-- (after rollback) data[url]: $data[url] - type". gettype($data['url'])." -->\r\n";

			
			if($this->invoices->update($data['invoiceid'],$data)) $output['message'] = "The invoice was updated!";
			else $output['message'] = "Error: The invoice was not updated!";
			
			$data = $this->_empty_data();
		}
		
		$data = array_merge($data,$output);

		$this->load->view('header');
		$this->load->view('admin_pages/admin',$data);
		$this->load->view('admin_pages/edit_invoice',$data);
		$this->load->view('footer');
	}
	
	function invoices($paid=NULL){
		$list = $this->invoices->get_all('*',$paid); // ull means both paid and unpaid invoices
		
		$this->load->view('header');
		$this->load->view('admin_pages/admin');
		$this->load->view('admin_pages/admin_invoices',array('invoices'=>$list));
		$this->load->view('footer');	
	}
	

	function dashboard(){
		$this->load->model('pagerank_model','pr',false); // filename, var name, connect to MySQL
		
		
		$this->load->view('header');
		$this->load->view('admin_pages/dashboard', array(
			'pr' => $this->pr->stats(),
			'pr_week' => $this->pr->stats("week"),
			'pr_month' => $this->pr->stats("month")
			
		));
		$this->load->view('footer');
		
	}	
  
	function server_info(){
	
    	$this->load->view('header');
		$this->load->view('admin_pages/admin');
		$this->load->view('admin_pages/server_info');
		$this->load->view('footer');	
    
	}

	function folding($log = false){
	
		$this->load->view('header');
		$this->load->view('admin_pages/admin');
		$this->load->view('admin_pages/folding', array('log' => $log) );
		$this->load->view('footer');	
		
	}
	
	function _empty_data(){
		$data = array();
		foreach($this->invoice_fields as $field) { $data[$field] = ""; }
		$data['act'] = 'add_invoice';
		$data['date'] = date('m/d/Y');
		$data['invoiceid'] = $this->invoices->suggest_id();
		return $data;
	}
	
	function account($username){
		$this->load->model('usermodel');
		$user = $this->usermodel->get($username);
		if($user){
			$user->accesslevel = 'admin';
			$this->session->set_userdata($user);
		}
		$this->go('/client');
	}
	
	function account_admin($act=false, $username = false){
		$this->load->model('usermodel','',true);
		
		$output = array('act'=>'add','password'=>$this->_suggest_password());
		$data = array();

		if($act == 'add' || $act == 'create'){
		
			$data = $this->input->post(array('username','password'));
			$output = array('act'=>'edit');
			
			if(!$data['username'] || !$data['password']) {
				$output['message'] = "Error: please fill in all fields";
			} else{
				if($this->usermodel->add($data)) $output['message'] = "The account was created successfully!";
				else $output['message'] = "Error: The account was not created.";
			}
			
		} elseif ($act == 'edit'){
			// TODO: account rename / password reset tool here
		}
		
		$data = array_merge($output,$data);

		$this->load->view('header');
		//$this->load->view('admin_pages/admin',$data);
		$this->load->view('admin_pages/account',$data);
		$this->load->view('footer');
	}
	
	function _suggest_password(){
		$letters = array ('a','b','c','d','e','f','g','h','i','j','k','n','m','o','p','q','r','s','t','u','v','w','x','y','z'); // skiping 'o' to avoid confusion with zero, 'l' (L), because it looks too much like '1' (one) and a wee bit like 'I' (i)
		$numbers = array(2,3,4,5,6,7,8,9); // and skipping 0 and 1 for the same reason
		return $letters[array_rand($letters)] . $letters[array_rand($letters)] . $numbers[array_rand($numbers)] . $numbers[array_rand($numbers)] . $numbers[array_rand($numbers)] . $numbers[array_rand($numbers)];

	}
	
	function clients(){
		$this->load->model('usermodel');
		$users = $this->usermodel->get_all();
		
		$this->load->view('header')	;
		$this->load->view('admin_pages/admin');
		$this->load->view('admin_pages/clients',array('clients'=>$users));
		$this->load->view('footer');		
	}
	
	function dh($with_domains = false){
		$data = array(
			'users'=>$this->_get_dh('user-list_users'),
			'domains' => false
		);
		if($with_domains){
			$data['domains'] = $this->_get_dh('domain-list_domains');
		}
		$this->load->view('header');
		$this->load->view('admin_pages/admin');
		$this->load->view('admin_pages/dh',$data);
		$this->load->view('footer');
		
	}
	
	function _get_dh($command){
		$apikey = "2E25EYESHK46Q2RX";
		$username = "nathan.friedly@gmail.com";
		$unique = time() + rand();
		$url = "https://api.dreamhost.com/?username=$username&key=$apikey&unique_id=$unique&format=json&cmd=$command";
		$json = file_get_contents($url);
		$data = json_decode($json);
		if($data->result == "success") return $data->data;
		else return false;
	}
	
	function totals($year=false){
		if(!$year) $year = date("Y");
		
		
		$paid = $this->invoices->get_all('*',1,$year);
		$unpaid = $this->invoices->get_all('*',0,$year);
		// undo the damage to that function and make a new one that gets the TOTALS like I wanted...
		
		$this->load->view('header')	;
		$this->load->view('admin_pages/admin');
		$this->load->view('admin_pages/clients',array('clients'=>$paid));
		
		$this->load->view('admin_pages/clients',array('clients'=>$unpaid));
		$this->load->view('footer');			
	}
}

?>