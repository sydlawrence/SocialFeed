<?php defined('SYSPATH') or die('No direct script access.');
/**
 *
 * @package    SocialFeed
 * @author     Syd Lawrence
 * @copyright  (c) 2009 Syd Lawrence
 */
class socialFeed_Core {

	/**
	 * url_exists function.
	 * Checks to see if an url exists
	 * 
	 * @access public
	 * @param string $url
	 * @return bool
	 */
	public static function url_exists($url) {
		$curl_options = array(
			CURLOPT_RETURNTRANSFER  => TRUE,
			CURLOPT_URL             => $url,
		);
		$curl = new Curl($curl_options);
		try {
			$curl->exec();
			$error = FALSE;
		}
		catch (Exception $e) {
			$error = TRUE;	
		}
		return $error;
	}
	
		
	/**
	 * get_favicon_from function.
	 * returns a link to the favicon of a specified url
	 * 
	 * @access public
	 * @param string $url
	 * @return string $url
	 */
	public static function get_favicon_from($url) {
		return 'http://'.self::get_domain($url).'/favicon.ico';
	}
	
	/**
	 * get_domain function.
	 * just get the domain from a specified url
	 * 
	 * @access public
	 * @param string $url
	 * @return string $domain
	 */
	public static function get_domain($url) {
		$url = str_replace('http://','',$url);
		$explode = explode("/", $url);
		return $explode[0];
	}

}

