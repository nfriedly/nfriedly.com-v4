<?php

class Client extends Controller {

	var $invoice_fields = array('invoiceid','userid','paid','amount','description','url','date');
	var $file_base_path = '/home/nfriedly/nfriedly.com/files/invoices/';
	var $file_base_url = '/files/invoices/';

	function Client()
	{
		parent::Controller();	
		$this->load->library('session');
	}
	
	function index()
	{
		$this->check_login();
		
		$this->load->helper('url');
		
		$this->load->model("invoices",'',true);
		$this->load->model("usermodel",'',true);
		$userid = $this->session->userdata('userid');
		
		if($this->session->userdata('username') == 'bmansley') $this->_bryon();

		$data = array(
			'invoices' => $this->invoices->get_all($userid),
			'history'  => $this->usermodel->get_history($userid),
			'history_type' => 'recent'
		);
		
		$this->load->view('header');
		$this->load->view('client');
		$this->load->view('invoices',$data);
		$this->load->view('history',$data);
		$this->load->view('footer');
	}
	
	function history(){
	
		$this->load->model("usermodel",'',true);
		$userid = $this->session->userdata('userid');
	
		$data = array(
			'history'  => $this->usermodel->get_all_history($userid),
			'history_type' => ''
		);
		
		$this->load->view('header');
		$this->load->view('client');
		$this->load->view('history',$data);
		$this->load->view('footer');	
	}

/* // hopefully I won't need this guy again	
	function fix_history(){
		$this->load->model("usermodel",'',true);
		$this->usermodel->fix_history();
	}
*/
	
	function login(){
		// looks for a login attempt, if found, verifies and redirects to target page or /clients
		
		// something here is broken.
		$this->load->library('input');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username && $password){
			$this->load->model('usermodel', '', true);
			if($result = $this->usermodel->check_and_get($username, $password)){
				$this->session->set_userdata($result);
				$this->session->set_userdata('loggedin',true);
				if(!$target = $this->session->flashdata('target')){
					$target = '/client';
				}
				if($target == 'client/login') { // avoid getting caught in a loop where they go to the login page after logging in.
					$target = '/client';
				}
				
				$this->go($target);
			}
		}
		
		// otherwise loads login page
		$this->session->keep_flashdata('target');
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');		
	}
	
	function check_login(){
		// saves target page to session
		$this->session->set_flashdata('target',$this->uri->uri_string()); 
		
		
		//returns true if good
		if($this->session->userdata('loggedin')) return true;
		// else redirect to login page
		else $this->go('/client/login');
		
	}
	
	function updateinfo(){		
		$this->load->view('header');
		
		$this->load->helper('form');
		$this->load->library('validation');
		
		$first_run = !($this->input->post('submit')); // if we run the validation immediately and everything checked out, they'd never get the chance to change anything.
		
		$this->session->set_userdata('target',$this->input->post('target'));

		$fields['fname'] = "First Name";
		$fields['lname'] = "Last Name";
		$fields['address'] = "Address";
		$fields['city'] = "City";
		$fields['state'] = "State";
		$fields['zip'] = "Zip";
		$fields['phone'] = "Phone Number";
		$fields['email'] = "Email Address";
		
		$rules = array();
		$data = array();
		
		foreach($fields as $key => $value){
			$rules[$key] = 	"trim|required";
			$data[$key] = $this->session->userdata($key);
		}
		$rules['email'] = "trim|required|valid_email";
		
		// uses extension by http://www.sellersrank.com/codeigniter/using-the-code-igniter-validation-class-to-set-default-form-values/
		if($first_run) $this->validation->set_default_values($data);
		
		$this->validation->set_rules($rules);
		$this->validation->set_fields($fields);
		
		$this->validation->set_error_delimiters('','');

		if ($first_run || $this->validation->run() == FALSE)
		{
			$this->session->keep_flashdata('target');
			$this->load->view('updateinfo', array('fields'=>$fields) );
		}
		else
		{
			// save to the database, update the session, and send the user on their way
			$this->load->model('usermodel','',true);
			$result = $this->usermodel->update(
				$this->session->userdata('userid'), 
				$this->input->post( array_keys($fields) )
			);
			$this->session->set_userdata($result);
			$target = $this->session->flashdata('target');
			$target = ($target) ? $target : '/client';
			$this->go( $target );
		}

		$this->load->view('footer');
	}
	
	function pay_confirm(){
	
		// tally up listed checkboxes, give them their shipping info, send them to securepay

		$this->load->view('header');
		
		$this->load->helper('url');
		

		// lookup the list of invoice id's from the user and tally up the total
		if(!$invoices = $this->input->post('pay')){
			if(!$invoices = $this->session->userdata('invoices')){
				$this->go("client");
			}
		}
		
		
		$this->session->set_flashdata('target','/client/pay_confirm'); // in case they click update account.
		$this->session->set_userdata('invoices',$invoices); // for the return page & if they click update account
		$userdata = $this->session->userdata(array('fname','lname','address','city','state','zip','email'));
		
		if( 
			$userdata['fname']	=='' || 
			$userdata['lname']	=='' ||
			$userdata['address']=='' || 
			$userdata['city']	=='' || 
			$userdata['state']	=='' || 
			$userdata['zip']	=='' || 
			$userdata['email']	==''
		){
			// they need to have this information saved
			$this->go('/client/updateinfo');
		}
		
		$invoices = array_keys($invoices);
		$this->load->model('invoices','',true);
		$invoices = $this->invoices->get_list($this->session->userdata('userid'), $invoices);
		
		$userdata['invoices'] = $invoices;
		
		$this->load->view('pay_confirm',$userdata);

		echo '<!-- ' . print_r($_SESSION,1). ' -->';
			
		$this->load->view('footer');
	}
	
	function pay_return($success="f"){
	 	// saves to ourdatabase whatever the cart says they just paid
		$invoices = $this->session->userdata('invoices');
		$userid = $this->session->userdata('userid');
		$this->load->model('invoices','',true);
		
		
		if($success == "s"){
			$this->invoices->mark_paid(
				$userid,
				(is_array($invoices)) ? array_keys($invoices) : $invoices
			);
			$this->go('client/pay_thankyou');
		}
		else {
			$this->invoices->record_history('payment failure',$invoices);
			$this->go('client/pay_error');
		}
	}
	
	function pay_thankyou(){
		$this->load->view('header');
		$this->load->view('thankyou');
		$this->load->view('footer');	
	}

	function pay_error(){
		$this->load->view('header');
		$this->load->view('nothankyou');
		$this->load->view('footer');	
	}
		
	function logout(){
		$this->session->destroy();
		$this->go();
	}
	
	function go($place=""){
		$this->load->helper('url');
		header('Location: '. site_url($place) );
		exit();
	}
	
	// updates the database for btyon's bill
	function _bryon(){
	
		// recompute the amount Bryon owes, if it's not what we have then save it to the database
		$current = $this->invoices->get_invoice(5);
		
		if(!$current['paid']){
		
			$monthly = 20;
	
			$thismonth = $startmonth = strtotime("April 1, 2009");
			$months = 0;
			while($thismonth < strtotime("+1 month")){
				$thismonth = strtotime("+1 Month",$thismonth);
				$months++;
			}
			$months--; // it's not backpay for the current month.
			$backpay = $months * $monthly;
			
			//$forwardpay = $monthly * 12;
			
			//$amount = $backpay + $forwardpay;
			
			//$amount -= 240; // paid in cash on mar 3rd 2009
			
			$amount = $backpay;
			
			$desc = "\$$monthly/month from " . date("F j, Y",$startmonth) . " through ".date("F"). " 1, ".date("Y",strtotime("+1 year")). "<br />";
			
			if($current['amount'] != $amount) {
				$this->invoices->update(5,array('description'=>$desc, 'amount'=>$amount));
			}
		}
	}
	
}

/* End of file client.php */
/* Location: ./system/application/controllers/client.php */