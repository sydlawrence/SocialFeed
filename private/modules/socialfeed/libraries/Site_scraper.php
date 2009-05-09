<?php defined('SYSPATH') or die('No direct script access.');
/**
 *
 * @package    SocialFeed
 * @author     Syd Lawrence
 * @copyright  (c) 2009 Syd Lawrence
 */
class Site_scraper_Core{
	
	/**
	 * start_url
	 * 
	 * @var string
	 * @access protected
	 */
	protected $start_url;
	
	/**
	 * sites - sites discovered
	 * 
	 * @var array
	 * @access protected
	 */
	protected $sites = array();
	
	/**
	 * feeds - feeds discovered
	 * 
	 * @var array
	 * @access protected
	 */
	protected $feeds = array();

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @param string $url
	 * @return void
	 */
	public function __construct($url) {
		$this->start_url = $url;
	}
	
	/**
	 * execute function.
	 * 
	 * @access public
	 * @return array of results
	 */
	public function execute() {
		$this->process_url($this->start_url);
		return array("profiles" => $this->sites,"feeds" => $this->feeds);
	}
	
	/**
	 * process_url function.
	 * 
	 * @access protected
	 * @param string $url
	 * @return void
	 */
	protected function process_url($url) {
		
		if (strstr($url,'http://') !== FALSE && !in_array($url,$this->sites)) {		
			$this->check_for_feed($url);
			$related = $this->get_rel_me($url);
			foreach ($related as $url2) 
				$this->process_url($url2);
			$this->sites[] = $url;	
		}
	}
	
	/**
	 * get_rel_me function.
	 * 
	 * @access public
	 * @param string $url
	 * @return array of discovered profiles
	 */
	public function get_rel_me($url) {
		$query = "select href from html where url='".$url."' and xpath='//a' and rel='me'";
		$q = urlencode($query);
		$url = 'http://query.yahooapis.com/v1/public/yql?q='.$q.'&format=json';
		$curl_options = array(
			CURLOPT_RETURNTRANSFER  => TRUE,
			CURLOPT_URL             => $url,
		);
		$curl = new Curl($curl_options);
		$data = $curl->execute();
		$data = json_decode($data);
		$array = array();
	 	if (isset($data->query) && isset($data->query->results)) {
			foreach ($data->query->results->a as $a) {
				if (isset($a->href))
					$array[] = $a->href;
			}
		}
		return $array;	
	}
	
	/**
	 * check_for_feed function.
	 * 
	 * @access public
	 * @param string $url
	 * @return boolean
	 */
	public function check_for_feed($url) {
		$query = "select title,href from html where url='".$url."' and xpath='//link' and type='application/rss+xml'";
		$q = urlencode($query);
		$url = 'http://query.yahooapis.com/v1/public/yql?q='.$q.'&format=json';
		$curl_options = array(
			CURLOPT_RETURNTRANSFER  => TRUE,
			CURLOPT_URL             => $url,
		);
		$curl = new Curl($curl_options);
		$data = $curl->execute();
		$data = json_decode($data);
		if (!isset($data->error) && isset($data->query->results)) {
			if(is_array($data->query->results->link)) {
				foreach ($data->query->results->link as $link) {
					if(isset($link->href) && strstr($link->href,'http://') != FALSE)
						$this->feeds[$link->title] = array("profile" => $url,"feed" => str_replace('&lang','&amp;lang',$link->href));
				}
			}
			else if (isset($data->query->results->link->href) && strstr($data->query->results->link->href,'http://') != FALSE)
				$this->feeds[$data->query->results->link->title] = array("profile" => $url,"feed" => str_replace('&lang','&amp;lang',$data->query->results->link->href));
			return TRUE;
		}
		else
			return FALSE;
	}
}