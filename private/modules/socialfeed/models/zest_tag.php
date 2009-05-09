<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Tag_Model extends ORM {

	// Relationships
//	protected $has_many = array('banner_pages');
//	protected $has_many = array('tags');
	protected $has_and_belongs_to_many = array('products','feedposts');
//	protected $has_one = array('media');
//	protected $has_and_belongs_to = array('user','feed');


	public function unique_key($id)
	{
		if ( ! empty($id) AND is_string($id) AND ! ctype_digit($id))
		{
			return 'title';
		}

		return parent::unique_key($id);
	}

} // End Auth User Model