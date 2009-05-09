<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Template_Model extends ORM {

	// Relationships
//	protected $has_many = array('user_tokens');
//	protected $has_and_belongs_to_many = array('roles');

	protected $belongs_to_many = array('pages');

//	protected $belongs_to_many = array('banners','pages');


} // End Auth User Model