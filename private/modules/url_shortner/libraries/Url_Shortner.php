<?php defined('SYSPATH') or die('No direct script access.');
 
class Url_Shortner_Core {
 
 	protected $config = array(
 		// The driver string
		'driver'      => NULL,
		'domain'	=> NULL
 	);
 	
 	public $url = "";
 	public $method;
  
 	public function __construct($config = array()) {
		$this->config = arr::overwrite(Kohana::config_load('url_shortner'),$config);
 	}
 	
 	public static function factory($config = array()) {
 		return new Url_Shortner( $config );
 	} 
 	
 	public static function instance( $config = array() )
	{
		static $instance;
		empty( $instance ) and $instance = new Url_Shortner( $config );
		return $instance;
	}
	
	public function set_method($method) {
		$this->method = $method;
	}
 
 	public function add_options($key = null,$val = null) {
 		
 		if (is_array($key)) {
 			foreach($key as $k => $v) { 				
 				$this->add_options($k,$v);
 			}
 		}
 		else {
 			
 			if (is_array($val)) {
 				foreach ($val as $v) {
 					$this->add_options($key,$v);
 				}
 			}
 			else {
	 			$this->url .= '&'.$key.'='.str_replace('+',urlencode('+'),$val);
	 		}
 		}
 	}
 	
 	public function set_key($key) {
 		$this->config['key'] = $key;
 	}
 	
 	public function set_login($login) {
 		$this->config['login'] = $login;
 	}
 	
 	public function set_user_details($login,$key) {
 		$this->set_key($key);
 		$this->set_login($login);
 	}
 	
 	public function is_clean() {
 		if ($this->url == "")
 			return true;
 		return false;
 	}
 	
 	public function clean() {
 		$this->url = "";
 	}
 	
 	public function generate_url() {
 		return  "http://api.bit.ly/".$this->method."?version=".$this->config['version']."&login=".$this->config['login']."&apiKey=".$this->config['key']."&history=1&format=".$this->config['format'].$this->url;
 	}
 
 	public function execute() {
 		$curl_options = array(
						CURLOPT_RETURNTRANSFER  => TRUE,
						CURLOPT_URL             => $this->generate_url()
						);
		$curl = new Curl($curl_options);
		$res = $curl->execute();
		return json_decode($res);
 	}
 	
 	public static function load() {
 		$bitly = Bitly::factory();
 	//	Event::add('system.display', array('Bitly', 'shorten_text'));
 	}
 	
 //	Event::add('system.display', array('Bitly', 'load'));
 	
	public static function shorten_url($longUrl) {
		
		$options = array(
				'longUrl' => $longUrl
			);
		$bitly = Url_Shortner::factory()->add_options($options);
		$results = $bilty->execute();
		if (is_array($longUrl)) {
			$res = array();
			foreach ($results->results as $key => $url) {
				$res[$key] = $url->shortUrl;
			}
			return $res;
		}		
		return $results->results->$longUrl->shortUrl;

	}
	
	public static function find_urls($str) {
		if (preg_match_all('~\b(?<!href="|">)(?:ht|f)tps?://\S+(?:/|\b)~i', $str, $urls)) {
			return $urls[0];
		}
		return false;
	}
		
	public function string_shorten($str) {
		if ($urls = Url_Shortner::find_urls($str)) {
			$this->clean();
			$this->add_options(array('longUrl' => $urls));
			$this->set_method('shorten');
			$data = $this->execute();
			foreach ($data->results as $key => $val) {
				$str = str_replace(str_replace(' ','+',$key),$val->shortUrl,$str);
			}
		}
		return $str;
	}
	
	public function get_info($url) {
		$this->clean();
		$this->add_options(array('shortUrl' => $url));
		$this->set_method('info');
		return $this->execute();
	}
	
	public function get_stats($url) {
		$this->clean();
		$this->add_options(array('shortUrl' => $url));
		$this->set_method('stats');
		return $this->execute();
	}
	
	public function string_expand($str) {
		if ($urls = Url_Shortner::find_urls($str)) {
			foreach ($urls as $url) {
				$this->clean();
				$this->add_options(array('shortUrl' => $url));
				$this->set_method('expand');
				$data = $this->execute();					
				$hash = str_replace($this->config['domain'],'',$url);
				$str = str_replace($url,$data->results->$hash->longUrl,$str);
			}	
		}
		return $str;
	}
		
}
 
?>