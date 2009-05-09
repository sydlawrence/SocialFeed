<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Statistic_Model extends ORM {

	// Relationships
//	protected $has_many = array('user_tokens');


//	protected $belongs_to_many = array('banners','pages');

	/**
	 * Allows a model to be loaded by filename.
	 */

	public function add_view($type,$id) {
		$this->item_type = $type;
		$this->item_id = $id;
		$this->ip = Input::instance()->ip_address();
		$this->referrer = request::referrer();
		$this->user_agent = Kohana::user_agent();
		$this->save();
	}

} // End Auth User Model