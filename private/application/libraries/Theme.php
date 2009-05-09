<?php defined('SYSPATH') or die('No direct script access.');
 
class Theme_Core {
 	
 	public static function instance() {
 		return new Theme();
 	}
 	
 	protected $name = "default";
 	
 	public static function factory($name = null) {
 		$object_name = "Theme_".inflector::underscore($name);
 		if (false) {
 			return new $object_name($post);
 		}
 		else {
 			return new Theme($name);
 		}
 	}

 	public function get_default_path() {
 		return url::site().'themes/default/';
 	}
 	
 	public function get_path() {
 		return url::site().'themes/'.inflector::underscore($this->name).'/';
 	}
 	
 	public function __construct($name = null) {
 		$this->set_theme_name($name);
 		define('THEME_PATH',$this->get_path());
 		define('DEFAULT_THEME_PATH',$this->get_default_path());
 	}
 	
 	public function set_theme_name($name) {
 		if ($name)
 			$this->name = $name;
 	}
 	
}
?>
