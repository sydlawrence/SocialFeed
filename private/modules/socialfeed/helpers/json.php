<?php defined('SYSPATH') or die('No direct script access.');
 
class json_Core {

	public static function encode_url($array = array()) {
		$default = array(
			"where" => array(),
			"orderby" => array(),
			"limit" => array(),
			"class" => array()
		);
		
		$arr = arr::overwrite($default,$array);
		
		$array = array();
		foreach ($arr as $key => $val) {
			$array[$key] = urlencode(arr::arraytostr($val));
		}
		
	
		return 'json/'.$array['class'].'/'.$array['where'].'/'.$array['orderby'].'/'.$array['limit'].'/';	
	}
	
	public static function decode_url() {
		
		$uri = URI::instance();
		
		$array = array();
		$array['class'] = urldecode($uri->segment(3));
		$array['where'] = urldecode($uri->segment(4));
		$array['orderby'] = urldecode($uri->segment(5));
		$array['limit'] = urldecode($uri->segment(6));
		
		foreach ($array as $key => $val) {
			$array[$key] = arr::strtoarray($val);
		}
			
		return $array;
		
	}

}