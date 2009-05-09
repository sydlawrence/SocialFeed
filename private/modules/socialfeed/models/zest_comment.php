<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Comment_Model extends ORM {

	// Relationships
	protected $has_one = array('feedpost','user');
	
	public function __set($key, $value)
	{
		if ($key === 'id')
		{
		}

		parent::__set($key, $value);
	}
	
	public function validate($array) {
		$default = array(
			"title" => "",
			"display_name" => "",
			"email" => "",
		);
		
		$array = arr::overwrite($default,$array);
		$errors = array();
		
		if ($array['display_name'] == "")
			$errors['display_name'] = "Please enter a display name";
		if (!valid::email($array['email']))
			$errors['email'] = "Please enter a valid email";
		if ($array['title'] == "")
			$errors['title'] = "Please enter text for your comment";
		$array['title'] = strip_tags($array['title']);
		
		$array['errors'] = $errors;
		return $array;
	}
	
	public function activate_url() {
		return 'http://'.$_SERVER['HTTP_HOST'].$this->feedpost->get_url().'?activate=comment&id='.$this->id.'&hash='.$this->generate_hash();
	}
	
	private function generate_hash() {
		return md5($this->id.$this->display_name);
	}
	
	private function check_hash($hash) {	
		if ($hash == $this->generate_hash())
			return true;
		return false;
	}
	
	public function attempt_activate($hash) {
		if ($this->check_hash($hash)) {
			$this->status_id = 2;
			$this->save();
			return true;	
		}
		return false;
	}
	
	public function render($options = null) {
		if (!$options){
			$config = Kohana::config_load('zest');
			$options = $config['comment'];
		}
		$array = array(
			"date_format" => 'D jS M Y',
			"image" => array(50,50),
			"html" => '{AVATAR}{DATE} by {AUTHOR}<br/><p>{TEXT}</p><a href="{DELETE_LINK}" title="delete comment"></a><div class="spacer">&nbsp;</div>',
			"default_image" => 'http://'.$_SERVER['HTTP_HOST'].'/zest/images/user_icon.gif',
			"template" => '',
		);
		$array = arr::overwrite($array,$options);
		if (isset($array['template']) && $array['template'] != "") {
			$html = zest::template_to_html('snippets/'.$array['template']);
		}
		else
			$html = $array['html'];
		$html = str_replace('{DATE}',date($array['date_format'], strtotime($this->date)),$html);
		$html = str_replace('{AVATAR}',gravatar::render($this->email,$array['image'][0],$array['default_image']),$html);
		if ($this->fl_deleted == 1)
			$html = str_replace('{TEXT}','<i>This comment has been deleted.</i>',$html);
		else
			$html = str_replace('{TEXT}',$this->title,$html);

		$html = str_replace('{AUTHOR}',$this->display_name,$html);
		
		if ($this->can_modify())
			$html = str_replace('{DELETE_LINK}',$this->delete_url(),$html);
		return $html;
	}
		
	public function delete_url() {
		return '<a href="?delete=true&id='.$this->id.'" title="delete comment">delete</a>';
	}
	
	public function can_modify() {
		$user = zest::check_login();
		if ($user && ($this->user->id == $user->id || $user->roles[0]->id < 3))
			return true;
		return false;
	}
	
	
} // End Auth User Model
