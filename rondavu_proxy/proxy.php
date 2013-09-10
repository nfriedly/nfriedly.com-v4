test <?php

// work out our path
$path = (isset($_GET['url'])) ? $_GET['url'] : "";
$remote = (isset($_GET['server'])) ? $_GET['server'] : "http://dev.weekendstatus.com:8272/";
$url = $remote . $path;

// mention it to the user
header('x-proxied-url: ' . $url);


$post = $_SERVER['REQUEST_METHOD'] == 'POST';
header('x-post: ' . ($post?'true':'false'));

if($post){
  exit('headers');//json_encode($headers));
}

// and proxy the data
$ch = curl_init($url);


// set post data or options header
if($post){
  $post_str = "";
  foreach($_POST as $k => $v){
    $v = urlencode($v);
    $post_str .= "$k=$v&";
  }
  header('x-proxied-post: ' . substr($post_str,0,25) . '...' . substr($post_str,-25));
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_str);
} elseif ( $_SERVER['REQUEST_METHOD'] != 'GET'){
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_SERVER['REQUEST_METHOD']);
}


// set the (other) headers
$headers = array();
foreach($_SERVER as $i=>$val) {
	if (strpos($i, 'HTTP_') === 0) {
		$name = str_replace(array('HTTP_', '_'), array('', '-'), $i);
		$headers[$name] = $val;
	}
}
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // follow redirects
curl_setopt($ch,CURLOPT_HEADER,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$data = curl_exec($ch); // should echo output
curl_close($ch);

$split = strpos($data, "\r\n\r\n");

$headers = substr($data, 0, $split);
$fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $headers));
foreach( $fields as $field ) {
    header($field);
}

echo substr($data, $split + 4) // the body minus the extra spaces


?>