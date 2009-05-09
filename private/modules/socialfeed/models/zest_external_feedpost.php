<?php defined('SYSPATH') or die('No direct script access.');

class Zest_External_feedpost_Model extends ORM {

	// Relationships
	protected $has_one = array('status');
	
	public function delete() {
		$this->status_id = 1;
		$this->save();
		return;
	}
	
} // End Auth User Model
