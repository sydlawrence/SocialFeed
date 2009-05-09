<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Profile_Model extends ORM {

	// Relationships
	
	public function render() {
		return '<a href="'.$this->url.'" rel="me" title="'.$this->title.'"><img src="'.$this->get_favicon().'" alt='.$this->title.'"" /></a>';
	}
	
	public function get_favicon() {
		return socialFeed::get_favicon_from($this->url);
	}
	
} // End Auth User Model
