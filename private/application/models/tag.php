<?php defined('SYSPATH') or die('No direct script access.');

class Tag_Model extends Zest_Tag_Model {

	// Relationships
	protected $has_and_belongs_to_many = array('products','feedposts');


} // End Auth User Model