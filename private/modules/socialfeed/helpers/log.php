<?php defined('SYSPATH') or die('No direct script access.');
 
class log_Core {
 
 
	public static function activity($title, $body) {
		/*
		TO BE IMPLEMENTED
		*/
//		if (self::basecamp($title,$body)) {}
//		else { echo "BASECAMP ERROR!"; return false;}
		
		
//		if (self::twitter($title)) {}
//		else { echo "TWITTER ERROR!"; return false;}
		
		return true;	
	}
	
	public static function error($string) {
		/*
		TO BE IMPLEMENTED
		*/
		return;
	}
	
	public static function basecamp($title,$body) {
		$basecamp = new Basecamp();
		if ($basecamp->createMessage($title,$body)) {
			return true;
		}
		return false;
	}
	
	public static function twitter($title) {
		$twitter = new Twitter();
		if ($twitter->tweet($title)) {
			return true;
		}
		return false;
	}
	
}
 
?>