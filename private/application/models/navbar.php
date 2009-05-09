<?php defined('SYSPATH') or die('No direct script access.');

class Navbar_Model extends Zest_Navbar_Model {

	// Relationships
	protected $belongs_to_many = array('pages');
	protected $has_many = array('pages');

	public function render() {
		return parent::render();
	}
} // End Auth User Model