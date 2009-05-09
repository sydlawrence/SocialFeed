<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Definition_Model extends Zest_ORM {

	// Relationships
//	protected $has_many = array('user_tokens');
//	protected $has_and_belongs_to_many = array('roles');
	protected $belongs_to = array('page');
	protected $has_one = array('language');

//	protected $belongs_to_many = array('banners','pages');


} // End Auth User Model