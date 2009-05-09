<?php defined('SYSPATH') or die('No direct script access.');

class External_feedpost_Model extends ORM {

	// Relationships
	
	protected $has_one = array('external_feed','media','status');
	
	public function get_box_object() {
		return $this->external_feed->get_box_object();
	}
	
	public function permalink() {	
		return $this->external_feed->permalink().'/'.$this->id.'/'.urlencode($this->title);
	}
	
	public function get_box_class() {
		return $this->external_feed->get_box_class();
	}
	
	public function render_html($html) {
	
	}
	public function box() {
		return Box::factory($this);
	
	}
	
} // End Auth User Model
