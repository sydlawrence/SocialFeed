<?php defined('SYSPATH') or die('No direct script access.');
 
class image_helper_Core {

	public static function render_crop($filename, $width, $height) {
		return "/image/crop/$width/$height/".$filename;
	}
	
}