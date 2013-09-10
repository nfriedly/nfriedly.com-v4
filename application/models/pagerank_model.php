<?php

//PageRank Lookup v1.1 by HM2K (update: 31/01/07)
//based on an alogoritham found here: http://pagerank.gamesaga.net/
// heavily modified by Nathan Friedly

// this exception is thrown if the ratel limit is reached
// the rate limit only applies to requests that go to google, not those cached in the database.
class RateLimitException extends Exception { }

class Pagerank_model extends Model {

// old http://toolbarqueries.google.com/search?client=navclient-auto&features=Rank&ch=8f3b58e04&q=info:[URLHERE]
// new http://toolbarqueries.google.com/tbr?client=navclient-auto&features=Rank&ch=8f3b58e04&q=info:[URLHERE]

	//settings - host and user agent
	var $googlehost='toolbarqueries.google.com';
	var $googleua='Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.6) Gecko/20060728 Firefox/1.5';
	
	// use graphical (google-hosted) images or css
	var $imgFormat = 'css';
	
	// name of squlte database file
	// both the db and it's folder must be writable by the server(!)
	var $dbname = "application/data/pagerank.sqlite3";
	
	// will be set to "cache", "google", or "none"
	var $lastSource = false;
	
	// how many lookups a given ip can preform before getting rate-limited. Cached lookups don't count.
	var $maxPerDay = 30;
	
	var $db; // internal var
	
	function Pagerank_model(){
		$this->db = new SQLiteDatabase($this->dbname);
	}
	
	function createdb(){
		//$this->db->query("Drop table pageranks");
		$this->db->query("CREATE TABLE pageranks ( id INTEGER PRIMARY KEY, url, pagerank, timestamp, ip )");		
	}
	//convert a string to a 32-bit integer
	function StrToNum($Str, $Check, $Magic) {
		$Int32Unit = 4294967296;  // 2^32
	
		$length = strlen($Str);
		for ($i = 0; $i < $length; $i++) {
			$Check *= $Magic; 	
			//If the float is beyond the boundaries of integer (usually +/- 2.15e+9 = 2^31), 
			//  the result of converting to integer is undefined
			//  refer to http://www.php.net/manual/en/language.types.integer.php
			if ($Check >= $Int32Unit) {
				$Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
				//if the check less than -2^31
				$Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
			}
			$Check += ord($Str{$i}); 
		}
		return $Check;
	}
	
	//genearate a hash for a url
	function HashURL($String) {
		$Check1 = $this->StrToNum($String, 0x1505, 0x21);
		$Check2 = $this->StrToNum($String, 0, 0x1003F);
	
		$Check1 >>= 2; 	
		$Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
		$Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
		$Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);	
		
		$T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
		$T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );
		
		return ($T1 | $T2);
	}
	
	//genearate a checksum for the hash string
	function CheckHash($Hashnum) {
		$CheckByte = 0;
		$Flag = 0;
	
		$HashStr = sprintf('%u', $Hashnum) ;
		$length = strlen($HashStr);
		
		for ($i = $length - 1;  $i >= 0;  $i --) {
			$Re = $HashStr{$i};
			if (1 === ($Flag % 2)) {              
				$Re += $Re;     
				$Re = (int)($Re / 10) + ($Re % 10);
			}
			$CheckByte += $Re;
			$Flag ++;	
		}
	
		$CheckByte %= 10;
		if (0 !== $CheckByte) {
			$CheckByte = 10 - $CheckByte;
			if (1 === ($Flag % 2) ) {
				if (1 === ($CheckByte % 2)) {
					$CheckByte += 9;
				}
				$CheckByte >>= 1;
			}
		}
	
		return '7'.$CheckByte.$HashStr;
	}
	
	//return the pagerank checksum hash
	function getch($url) { return $this->CheckHash($this->HashURL($url)); }
	
	//return the pagerank figure
	function getpr($url) {
		$url = $this->fixurl($url);
		
		// if we have it cached return that
		$query = sprintf(
			"SELECT pagerank FROM pageranks WHERE url='%s' AND timestamp >='%s' ORDER BY timestamp DESC LIMIT 1",
			sqlite_escape_string($url),
			strtotime("-1 day")
		);
		$result = $this->db->query($query);
		if($result->numRows()){
			$res = $result->fetch(SQLITE_ASSOC);
			$this->lastSource = "cache";
			return $res['pagerank'];
		}
		
		// otherwise, check in with google
		
		// first, see if the user has caused over 100 new lookups in the past 24 hours
		$query = sprintf(
			"SELECT count(*) AS lookups FROM pageranks WHERE ip='%s' AND timestamp >='%s'",
			$this->_get_ip(),
			strtotime("-1 day")
		);
		$result = $this->db->query($query);
		$res = $result->fetch(SQLITE_ASSOC);
		// if the limit has been reached, throw an exception
		if($res['lookups'] >= $this->maxPerDay){
			throw new RateLimitException("Sorry, you've hit the rate limit. Please try again in 24 hours.");
		}
		
		$ch = $this->getch($url);
		$fp = fsockopen($this->googlehost, 80, $errno, $errstr, 30);
		if ($fp) {
		   $out = "GET /tbr?client=navclient-auto&ch=$ch&features=Rank&q=info:$url HTTP/1.1\r\n";
		   //echo "<pre>$out</pre>\n"; //debug only
		   $out .= "User-Agent: {$this->googleua}\r\n";
		   $out .= "Host: {$this->googlehost}\r\n";
		   $out .= "Connection: Close\r\n\r\n";
		
		   fwrite($fp, $out);
		   
		   //$pagerank = substr(fgets($fp, 128), 4); //debug only
		   //echo $pagerank; //debug only
		   while (!feof($fp) && !isset($pr)) {
				$data = fgets($fp, 128);
				//echo $data;
				$pos = strpos($data, "Rank_");
				if($pos === false){} else{
					$pr=substr($data, $pos + 9);
					$pr=trim($pr);
					$pr=str_replace("\n",'',$pr);
				}
		   }
		   fclose($fp);
		   
		   if(isset($pr)) {
				// save & return the results
				$this->lastSource = "google";
				$this->db->query(sprintf(
					"insert into pageranks (url, pagerank, timestamp, ip) values ('%s','%s','%s','%s')",
					sqlite_escape_string($url),
					$pr,
					time(),
					$this->_get_ip()
				));
				return $pr;
		   } 
		   else {
			   $this->lastSource = "none";
			   return NULL; 
		   }
		}
	}
	
	function fixurl($url){
		return (substr($url,0,4) != 'http') ?  'http://'.$url : $url;
	}
	
	//generate the graphical pagerank
	function image($pr,$width=40) {
		$pagerank="PageRank: $pr/10";
	
		//The (old) image method
		if ($this->imgFormat == 'image') {
		$prpos=$width*$pr/10;
		$prneg=$width-$prpos;
		$html='<img src="http://www.google.com/images/pos.gif" width='.$prpos.' height=4 border=0 alt="'.$pagerank.'"><img src="http://www.google.com/images/neg.gif" width='.$prneg.' height=4 border=0 alt="'.$pagerank.'" title="'.$pagerank.'">';
		}
		//The pre-styled method
		if ($this->imgFormat == 'css') {
		$prpercent=100*$pr/10;
		$html='<div title="'.$pagerank.'" class="prbar" style="width: 40px;"><strong style="width: '.$prpercent.'%;"><span></span></strong></div>';
		}
		
		return $html;
	}
	
	function getPRInfo($url){
		$url = $this->fixurl($url);
		$pr = $this->getpr($url);
		return array(
			'url' => $url,
			'pagerank' => $pr,
			'image' => $this->image($pr),
			'source' => $this->lastSource
		);
	}
	
	// looks up a list of urls. Silently drops anything after the first 10.
	function getList($urls){
		$urls = preg_split("[\r\n]",$urls);
		$output = array();
		$counter = 0;
		foreach($urls as $url){
			$url = trim($url);
			if($url){
				$counter++;
				$output[$this->fixurl($url)] = $this->getPRInfo($url);
			}
			if($counter >= 10) {
				break;
			}
		}
		return $output;
	}
	
	function stats($timeframe="day"){
		 $row = $this->db->query(sprintf("select count(*) from pageranks WHERE timestamp >='%s'", strtotime("-1 " . $timeframe)))->fetch();
		 
		 $lookups = $row[0];
		
		// there's probably a way to do this with only one query, but SELECT COUNT(DISTINCT ip) didn't do it.
		$row = $this->db->query(sprintf("select count(*) from (SELECT DISTINCT ip FROM pageranks WHERE timestamp >='%s')", strtotime("-1 " . $timeframe)))->fetch();
		
		$ips = $row[0];
		
		return array('ip' => $ips, 'lookups' => $lookups);
	}
	
	function _get_ip(){
		$headers = apache_request_headers();
		if(isset($headers['X-Real-IP'])) return $headers['X-Real-IP']; // request was proxied through nginx
		// else, we're looking at a request made directly to apache
		return (isset($_SERVER['REMOTE_ADDR'])) ?	$_SERVER['REMOTE_ADDR'] : '';
	}
  
}