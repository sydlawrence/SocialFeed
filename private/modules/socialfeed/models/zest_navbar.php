<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Navbar_Model extends ORM_Tree {

	// Relationships
//	protected $has_many = array('banner_pages');
	protected $belongs_to_many = array('pages');
	protected $has_many = array('pages');
	
	public function __construct($id = null) {
		parent::__construct($id);
		
	}
	
	public function get_pages() {
		$pages = ORM::factory('page')->where(array('status_id' => 2,"navbar_id" => $this->id,"parent_id"=>0))->orderby('display_order','ASC')->find_all();
		
		return $pages;
	}

	public function render() {
		$options = array(
			"links" => $this->get_pages(),
			"view" => $this->view,
		);
		$navbar = new Navbar($options);
		return $navbar->render();
	}
} // End Auth User Model