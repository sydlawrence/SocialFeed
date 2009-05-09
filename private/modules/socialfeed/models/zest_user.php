<?php defined('SYSPATH') or die('No direct script access.');

class Zest_User_Model extends Auth_User_Model {
	
	// This class can be replaced or extended
	protected $has_many_and_belongs_to = array('feedposts','events');
	
	public $title;
	
	public function __construct($id = NULL) {
		parent::__construct($id);
		$this->title = $this->username;
	}
	
	public function get_full_name() {
		return $this->first_name." ".$this->last_name;
	}
	
	public function reset_password() {
		$str = text::random($type = 'alnum', $length = 10);
		$this->password = $str;
		$subject = "Your password has been reset for ".$_SERVER['HTTP_HOST'];
		$message = "Your username is: ".$this->username."\n\n";
		$message .= "Your new password is: ".$str."\n\n";
		$message .= "You can reset it from the profile section of the user area";
		$this->save();
		
		email::send($this->email, 'admin@'.str_replace('www.','',$_SERVER['HTTP_HOST']), $subject, $message, FALSE);
	}
	
	public function login() {
		$session = Session::instance();
		$session->set("user",$this);
	}
	
	public function avatar($size = 50,$default = null) {
		if (!$default)
			$default = "http://".$_SERVER['HTTP_HOST']."/zest/images/icon_user.gif";
		return gravatar::render($this->email,$size,$default,$this->username.'\'s avatar');
	}
	
	public function avatar_src($size = 50, $default = null) {
		if (!$default)
			$default = "http://".$_SERVER['HTTP_HOST']."/zest/images/icon_user.gif";
		return gravatar::get_src($this->email,$size,$default);
	}
	
} // End User Model