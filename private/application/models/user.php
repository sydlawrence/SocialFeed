<?php defined('SYSPATH') or die('No direct script access.');

class User_Model extends Zest_User_Model {
	
	// This class can be replaced or extended
	protected $has_many_and_belongs_to = array('feedposts','events');


	
} // End User Model