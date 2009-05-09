<?php defined('SYSPATH') or die('No direct script access.');

class Comment_Model extends Zest_Comment_Model {

	// Relationships
	protected $has_one = array('feedpost','user');
	
	public function activate_url() {
		return parent::activate_url();
	}
		
	public function render($options = null) {
		return parent::render($options);
	}
	
} // End Auth User Model
