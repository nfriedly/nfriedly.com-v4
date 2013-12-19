<?php

class Page extends Controller {
  var $nocache = false; // flag to mark pages as non-cacheable

	function Page()
	{
		parent::Controller();
		$this->load->library('session');
		//echo "<!-- " . print_r($_SESSION,1) . " -->";
		if(!isset($_SESSION['landing_page'])){
			$_SESSION['landing_page'] = $_SERVER['REQUEST_URI'];
			$_SESSION['original_referrer'] = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '';
		}
		//echo "<!-- " . print_r($_SESSION,1) . " -->";
	}
	
	function index()
	{
		$this->load->view('index');
    		$this->supercache('index');
		//$this->load->view('footer');
	}
	
	function _old_load($page=false){
		if($page){
		
			$this->load->view('header');
			$file = './system/application/views/pages/'.$page.'.php';
			if(file_exists($file)){
				$this->load->view('pages/'.$page);
			}
			else {
				$this->load->view('pages/404');
				//echo "<br />$file";
			}
			
			$this->load->view('footer');
		}
		else {
			$this->index();
		}
	
	}
	
	function load(){
	
		$a = func_get_args();
		if(!sizeof($a)){
			$this->index();
			return;
		}
		if(gettype($a[sizeof($a)-1]) == "array"){
			$data = $a[sizeof($a)-1];
			unset($a[sizeof($a)-1]);
		} else{
			$data = array();
		}
		$page = implode("/",$a);
		
		if($this->_check_for_special($page,$data)){
			return;
		}

		if(is_dir(APPPATH.'views/pages/'.$page)) $page .= "/index";
		else if($page == "") $page = "index"; 
    
    		$orig_page = $page;

		$page = 'pages/'.$page;
		
		//$this->load->view('header', $data);
		
		if(file_exists(APPPATH.'views/' . $page . '.php')){ // for main index page and any non-index subpages
			$this->load->view($page, $data);
      			$this->supercache($orig_page);
		//} 
		//elseif(file_exists(APPPATH.'views/' . $page . '/index.php')) { //for  sub-page indexes
		//	$this->load->view($page . '/index',$data);
		} else {
		
		/*
			// if the broken link is from the proxy, redirect the user there
			$ref = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : false;
			//exit($ref);
			if($ref && strpos($ref, 'nfriedly.com/px/') !== false) {
				$url = 'http://nfriedly.com/px/poxy/index.php?error=link&referer=' . urlencode($ref);
				header('Location: ' . $url);
				exit('<html><body><p>Redirecting you to <a href="' . $url . '">' . $url . '</a></body></html>');
			}
		*/
		
			header("HTTP/1.0 404 Not Found"); 
			//header("Status: 404 Not Found");  works also
      			echo '<!-- url: ' .$page . ' -->';
			$this->load->view('pages/404');
		}
		
		//$this->load->view('footer',$data);
	}
  
	  function supercache($page){
	    RETURN FALSE; // this is disabled because I want to have my cookie tracking, and it didn't really speed up page loads anyways
	    
	    if($this->session->userdata('loggedin') || $this->nocache) return; // don't cache pages for logged in users
	    
	    $output = $this->output->get_output();
	    
	    date_default_timezone_set('America/New_York');
	    $signature = "\n\n<!-- supercache generated at " . date('Y-n-j g:i:s A') . " -->\n\n";
	    
	    $output = str_replace('</body>',$signature . '</body>', $output);
	    
	    // clean up my $page, - remove 'index' and  make sure it has a trailing slash if it's not empty
	    $page = str_replace('index', '', $page);
	    if(strlen($page) && substr($page, -1) != '/') $page .= "/";
	   
	    $path = APPPATH . 'cache/' . $page;   
	    
	    if($page && !file_exists($path)) mkdir($path, 0777, true) or die("can't create folder");
	    
	    $fh = fopen($path. "index.html", 'w') or die("can't open file");
	    fwrite($fh, $output);
	    fclose($fh);
	    
	    chmod  ( $path. "index.html"  ,  0777  );
	    // could pre-gzip the output, but not worth the trouble. gzencode() .gz
	  }
	
	// returns true to prevent the regular page logic from continuing
	function _check_for_special($page,$data=array()){
		switch($page){
			case 'links':
				if(isset($_SERVER['HTTP_REFERER'])) {
					//if(substr($_SERVER['HTTP_REFERER'],'freelancedesigners') !== FALSE) {}
					header('Location: http://nfriedly.com/webdev');
					exit();
				}
			break;
      
			case 'submit':
        			$this->nocache = true;
				$this->_send_email($data);
				return false; // continue with the page load as normal
			break;
      
			/*(case 'webdev':
				$data = array('nomenu'=>true);
				$this->load->view('header',$data);
				$this->load->view('pages/webdev/index');
				$this->load->view('footer',$data);
				return true;
			
			break;*/
		}
		return false; // means do nothing
	}
	
	
	// captures form submission + some extra data
	function _send_email($data){
	
		$ip 		  	=  $this->_get_ip();
		$ua 			= (isset($_SERVER['HTTP_USER_AGENT']))	  ?	$_SERVER['HTTP_USER_AGENT']	:'';
		$landing_page		= (isset($_SESSION['landing_page'])) 	  ? 	$_SESSION['landing_page'] : '';
		$original_referrer 	= (isset($_SESSION['original_referrer'])) ?	$_SESSION['original_referrer'] :  '';
		
		$location =  ($ip) ? $this->_get_location($ip) : '';
		
		$headers = "From: contact@nfriedly.com"; 
		
		$name = (isset($_POST['name'])) ? $_POST['name'] : "";
		$email = (isset($_POST['email'])) ? $_POST['email'] : "";
		
		if( !preg_match( "/[\r\n]/", $name) && !preg_match( "/[\r\n]/", $email) && strlen($email)) {
			$headers .= "\n" . "Reply-To: $name <$email>";
		} 
		
		
		if(isset($_POST['website'])) {
		
			// do a print_r, but trim the Array ( ... ) and extra spacing from  it ;)
			$body = print_r($_POST,1);
			$body = substr($body, 8, strlen($body) -2 -8);
			$body = str_replace("   [", "[", $body);
			
			$body .= "\r\n\r\n"
				."Site Referrer: $original_referrer => $landing_page" 
				."\r\n"
				."IP & UA:" . $ip ."  ".  $ua
				."\r\n"
				."Location: " . $location;
			
			if($_POST['website'] == "" ) { //  && ($_POST['name'] != "" || $_POST['email'] != "" && $_POST['message'] != "")
				mail(
					"nathan.friedly@gmail.com",
					"[nfriedly] " 
					. $_POST['form'] 
					. ": " 
					. $_POST['name'],
					$body,
					$headers
				);
			}
			else echo "<!-- bot detected, no email sent -->";
		}	
	}
  
	function _get_ip(){
		$headers = apache_request_headers();
		if(isset($headers['X-Real-IP'])) return $headers['X-Real-IP']; // request was proxied through nginx
		// else, we're looking at a request made directly to apache
		return (isset($_SERVER['REMOTE_ADDR'])) ?	$_SERVER['REMOTE_ADDR'] : '';
	}
	
	function _get_location($ip){
		$this->load->library('curl');
		//$response = $this->curl->simple_get('http://api.hostip.info/get_html.php?ip=' . $ip);
		$response = $this->curl->simple_get('http://api.geoio.com/q.php?key=IuJuukPqpGmIJZeF&qt=geoip&d=pipe&q=' . $ip);
		if($response){
			$response = implode(", ",array_slice(explode("|",$response),0,3));
		}
        if(!$response) {
            $response = 'cURL Error: '.$this->curl->error_string
				. "\nInfo: " . print_r($this->curl->info,1);
        }
        return $response;
	}
	
}

/* End of file page.php */
/* Location: ./system/application/controllers/page.php */

?>
