<?php defined('SYSPATH') or die('No direct script access.');

class Media_Model extends Zest_Media_Model {

	// Relationships
	protected $has_and_belongs_to_many = array('banners',"products","feedposts","pages");
	protected $belongs_to = array('type_media');
	
	public function get_url() {
		return url::base()."assets/uploads/".$this->filename;
	}

} // End Auth User Model