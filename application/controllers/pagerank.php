<?php

class Pagerank extends Controller {

	function Pagerank()
	{
		parent::Controller();
		error_reporting(E_ALL);
		$this->load->library('session');
		$this->load->model('pagerank_model','db',false); // filename, var name, connect to MySQL
	}

  function index(){
    $this->load->view('header', array(
        'title' => 'Google PageRank Lookup Tool - Free, No Captcha, Multiple URLs, Bookmarklett, History'
        ,'keywords' => 'page,rank,pagerank,google,lookup,tool,utility,no captcha,multiple urls,bookmarklett,website,site'
        ,'description' => 'Free tool for finding the PageRank of up to 10 web pages at once. No CAPTCHAs or advertising! Also includes a bookmarklett to lookup the pagerank of the current page and records your recent history.'
    ));
    $this->load->view('pagerank/form');

    if(isset($_REQUEST['q'])) {
      	$this->_lookup($_REQUEST['q']);
    }
    
    $recent = $this->_getRecent();
    
    if(sizeof($recent)) {
      $this->load->view('pagerank/list', array(
        "listname" => "Your Recent Queries:",
        "list" => $recent
      ));
    }
    
    $this->load->view('pagerank/about');
    $this->load->view('footer');
  }
  
  function _lookup($urls){
	$message = false;
	
	try {
		$list = $this->db->getList($urls);
	} catch(RateLimitException $ex){
		$message = $ex->getMessage();
		$list = array();
	}
		 
	$this->load->view('pagerank/list', array(
		"listname" => "Results:",
		"list" => $list,
		"message" => $message
	));

	$recent = $this->_getRecent();
	
	$_SESSION['recent'] = array_merge($recent,array(), $list);

	$this->load->library('mixpanel');
	if($message){
		$this->mixpanel->track('ratelimit', array(
			'source'=>'website', 
			'ip' => $this->_get_ip()
		));		
	} else {
		$this->mixpanel->track('lookup', array(
			'source'=>'website', 
			'urls' => array_keys($list) 
		));
	}
  }
  
  function js(){
	  $a = func_get_args();
	if(sizeof($a)){
      $url = implode("/",$a);
      
      $info = false;
      
      try {
	      $info = $this->db->getPRInfo( $url );

		  $_SESSION['recent'][$info['url']] = $info;
		  if(!$info['pagerank']){
			$info['pagerank'] = '(not ranked)';
		  }
		  	$out = "$info[url]\\n\\nPagerank: $info[pagerank]";
		  
	  } catch (RateLimitException $ex){
	  	$out = str_replace("'", "\'", $ex->getMessage());
	  }
	}
    else $out = "No url found!";
    echo "alert('$out')";
    
	$this->load->library('mixpanel');

	if($info){
		$this->mixpanel->track('lookup', array(
		  'source'=>'bookmarklett', 
		  'url' => $info['url']
		));
    } else {
		$this->mixpanel->track('ratelimit', array(
			'source'=>'bookmarklett', 
			'ip' => $this->_get_ip()
		));	    
    }

  }
  
  function dump(){

  	
    $this->load->view('header', array('header' => '<meta name="ROBOTS" content="NOINDEX,NOFOLLOW" />'));
    
    $res = $this->db->db->query(sprintf("select * from pageranks WHERE timestamp >='%s'", strtotime("-1 week")));
    
  	//exit("error code: " . $this->db->db->lastError() . " <br />error text: " . sqlite_error_string($this->db->db->lastError()) . "<br /> num rows : " . $res->numRows());
    
    $dates = array();
    $sites = array();
    //$ips = array();
    while($row = $res->fetch(SQLITE_ASSOC)) {
      extract($row);
      
      $date = strtotime(date('F j, Y', $timestamp));
      if($date < strtotime('1/1/2008')) continue; // skip the bad data
      
      $url = strtolower(preg_replace('/^https?:\/\/(www)?2?\.?/i', '', $url));
      $url = preg_replace('/\/$/','',$url);
      
      if(!isset($dates[$date])) $dates[$date] = $date;
      
      if(!isset($sites[$url])) $sites[$url] = array();
      $sites[$url][$date] = $pagerank;
      
      //if(!isset($ips[$url])) $ips[$url] = array();
      //$ips[$url][$date] = $ip;
    }
    
    sort($dates, SORT_NUMERIC);
    ksort($sites, SORT_STRING);
    
    $this->load->view('pagerank/dump',array(
      'dates' => $dates
      ,'sites' => $sites
      //,'ips' => $ips
    ));

    $this->load->view('footer');
  }
  
  function _getRecent(){
    if(!isset($_SESSION['recent']) || !is_array($_SESSION['recent'])){
    	$_SESSION['recent'] = array();	
    }
    return $_SESSION['recent'];
  }
  
	function _get_ip(){
		$headers = apache_request_headers();
		if(isset($headers['X-Real-IP'])) return $headers['X-Real-IP']; // request was proxied through nginx
		// else, we're looking at a request made directly to apache
		return (isset($_SERVER['REMOTE_ADDR'])) ?	$_SERVER['REMOTE_ADDR'] : '';
	}

}


?>