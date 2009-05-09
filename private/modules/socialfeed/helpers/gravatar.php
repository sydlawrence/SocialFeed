<?php defined('SYSPATH') or die('No direct script access.');
 
class gravatar_Core {

	public static function get_src($email, $size = 50,$default = 'identicon') {
		return 'http://www.gravatar.com/avatar/'.md5($email).'?s='.$size.'&d='.$default;
	}
	
	public static function render($email,$size,$default,$alt = null) {
		return '<img src="'.self::get_src($email,$size,$default).'" alt="'.$alt.'" />';
	}
}