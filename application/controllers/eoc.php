<?php

class Eoc extends Controller {

	function Eoc()
	{
		parent::Controller();
	}
	
	function index()
	{
	}
	
	function image(){
	
	header( "HTTP/1.1 301 Moved Permanently" );
	header( "Location: http://nfriedly.com/img/410.gif" ); 
	exit();
	
    $args = func_get_args();
    $number = (sizeof($args)) ? array_shift($args) : false;
		$number = (is_numeric($number)) ? $number : '408666';
		//		header('content-type: image/gif');
		//$handle = fopen('http://folding.extremeoverclocking.com/sigs/sigimage.php?u='.$number, "r");
		//echo stream_get_contents($handle);
		//fclose($handle);
    
    $url = 'http://folding.extremeoverclocking.com/sigs/sigimage.php?u='.$number;
    $qs = $this->get_querystring($args);
    if($qs){
        $url .= '&' . $qs;
    }
    header('x-proxied-from: ' . $url);
		$c = new Curl_wrapper(array(), $url);
		$data = $c->get();
		$headers = $c->getHeaders();
		header('content-type: image/gif');
		foreach(array('Date','Expires','Last-Modified') as $header){
			if(isset($headers[$header])) header("$header: $headers[$header]");
		}
		echo $data;

	}
  
  function get_querystring($args){
    // skip the 'whatever.gif'
    if(strpos($args[sizeof($args)-1], '_gif')){
        array_pop($args); 
    }
    
    // if we still have anything left, turn that into a querystring
    if(sizeof($args)){
      foreach($args as $key => $value){
          $args[$key] = str_replace(':','=',$value);
      }
      return join('&',$args);
    }
    
    // otherwise, check for an actual querystring
    $q = strpos($_SERVER['REQUEST_URI'], '?');
    if($q !== false){
        return substr($_SERVER['REQUEST_URI'], $q+1); // 1 because we don't actually want the '?'
    } 
    
    return false; // no '?' in url
  }
  
}

// http://it.toolbox.com/wiki/index.php/Use_curl_from_PHP_-_processing_response_headers
// fixed by nfriedly - 11.30.08
class Curl_wrapper {
	private $request;
	private $response;
	private $response_meta_info = array();
    private $url;
	private $headers = array();

	function __construct($request, $url) {
		//E.g.
		//$request['report_num']=1432;
		//$request['token']='some string'
		$this->request = $request;
                $this->url = $url;
	}

	function get() {
		//initiate curl transfer
		$ch = curl_init();

		//set the URL to connect to
		curl_setopt($ch, CURLOPT_URL, $this->url);

		//do not include headers in the response
		curl_setopt($ch, CURLOPT_HEADER, 0);

		//register a callback function which will process the headers
		//this assumes your code is into a class method, and uses $this->readHeader as the callback //function
		curl_setopt($ch, CURLOPT_HEADERFUNCTION, array(&$this,'readHeader'));

		//Some servers (like Lighttpd) will not process the curl request without this header and will return error code 417 instead. 
		//Apache does not need it, but it is safe to use it there as well.
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent'=>'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.4) Gecko/2008102920 Firefox/3.0.4'));

		//Response will be read in chunks of 64000 bytes
		curl_setopt($ch, CURLOPT_BUFFERSIZE, 64000);

		//Tell curl to use POST
		curl_setopt($ch, CURLOPT_HTTPGET, 1); //; changed to get - n - 11/30/08

		//Tell curl to write the response to a variable
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		//Register the data to be submitted via POST
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $this->request);

		//Execute request
		$this->response = curl_exec($ch);

		//get the default response headers
		$headers = curl_getinfo($ch);

		//add the headers from the custom headers callback function
		$this->response_meta_info = array_merge($headers, $this->response_meta_info);

		//close connection
		curl_close($ch);

		//catch the case where no response is actually returned
		//but curl_exec returns true (on no data) or false (if cannot connect)
		if (is_bool($this->response)) {
			if ($this->response==false){
				throw new Exception('No connection');
			} else {
				//null the response, because there are actually no data
				$this->response=null;
			}

		}
		return $this->response;
	}

	/**
	 * CURL callback function for reading and processing headers
	 * Override this for your needs
	 * 
	 * @param object $ch
	 * @param string $header
	 * @return integer
	 */
	private function readHeader($ch, $header) {
		$arr = explode(':',$header);
		if(sizeof($arr) >= 2) $this->headers[$arr[0]] = trim(implode(':',array_slice($arr,1)));
		else $this->headers[$arr[0]] = trim(implode(':',$arr));
		return strlen($header);
	}

	private function extractCustomHeader($start,$end,$header) {
		$pattern = '/'. $start .'(.*?)'. $end .'/';
		if (preg_match($pattern, $header, $result)) {
			return $result[1];
		} else {
			return false;
		}
	}
	
	function getHeaders() {
		return $this->headers;
	}
	
	function getMeta() {
		return $this->response_meta_info;
	}
  
}


/* End of file eoc.php */
/* Location: ./system/application/controllers/eoc.php */