<?php

class Sitemap extends Controller {

	var $pages = array(
	
		'webdev' => 1.0,
		
		//'index' => 0.9,
		
		'portfolio' => 0.8,
    
		'pagerank' => 0.6,
    
		'about' => 0.6,
		
		'estimate' => 0.5,
		'demos/twitter' => 0.5,
		'blb/' => 0.5,
		'stuff/Nathan_Friedly_SSL_TLS.doc' => 0.5,
    
		'fellowship' => 0.4,
    
		'contact' => 0.4,
		
		'sitemap' => 0.3,
		
		'clients' => 0.1
	);

	function Sitemap()
	{
		parent::Controller();
	}
	
	function index()
	{
		header("content-type: text/xml");

		echo '<'.'?xml version="1.0" encoding="UTF-8"?' . '>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <sitemap>
      <loc>http://nfriedly.com/sitemap.xml</loc>
   </sitemap>
   <sitemap>
      <loc>http://nfriedly.com/techblog/sitemap.xml</loc>
   </sitemap>
</sitemapindex>';

	}
	
	function main(){
		header("content-type: text/xml");
		
		echo '<'.'?xml version="1.0" encoding="UTF-8"?' . '>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	
		echo $this->_url('','index',0.9);
		
		foreach($this->pages as $page => $priority){
			echo $this->_url($page, 'pages/'.$page, $priority);
		}

		echo '</urlset>';	
		
	}
	
	
	function _url($loc, $filename, $priority){
		$file = APPPATH . 'views/' . $filename . '.php';
		if(file_exists($file)){
			$lastmod = filemtime($file);
		} else {
			$lastmod = false;
		}
		$str = '<url>';
			$str .= '<loc>http://nfriedly.com/'.$loc.'</loc>';
			if($lastmod) $str .= '<lastmod>'.date('Y-m-d',$lastmod).'</lastmod>';
			$str .= '<changefreq>monthly</changefreq>';
			$str .= '<priority>' . number_format($priority,1) . '</priority>';
		$str .= '</url>';
		return $str;
	}
	
}


/* End of file eoc.php */
/* Location: ./system/application/controllers/sitemap.php */

?>