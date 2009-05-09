<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Role_Model extends Auth_Role_Model {

	// This class can be replaced or extended
	public $title;
	
	public function __construct($id = NULL) {
		parent::__construct($id);
		$this->title = $this->name;
	}

} // End Role Model