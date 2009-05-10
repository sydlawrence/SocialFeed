<?php defined('SYSPATH') or die('No direct script access.');

class External_feed_Model extends Zest_External_feed_Model {

	// Relationships
//	protected $has_many = array('banner_pages');
	protected $has_many = array('external_feedposts');
//	protected $has_and_belongs_to_many = array('pages');
//	protected $has_one = array('media');
//	protected $has_and_belongs_to = array('user','feed');

	public $default_status = 2;
	
/*	public function update() {
		if strstr($this->url,'youtube')
			return $this->youtube_update();	
		else
			return parent::update();
	}
*/
	public function youtube_update() {
	
	}

	public function get_box_object() {
		return str_replace('.','_',$this->title);
	}
	
	public function short_url() {
		$url = $this->url;
		$url = str_replace('http://','',$url);
		$url = explode('/',$url);
		$url = $url[0];
		$url = str_replace('www.','',$url);
		return str_replace('feeds.','',$url);
	}
	
	public function get_box_class() {
		return str_replace('.','_',$this->short_url());
	}
	
	public function permalink() {
		return url::base().'items/'.urlencode(strtolower($this->title));
	}

} // End Auth User Model