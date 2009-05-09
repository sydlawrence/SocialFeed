<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Status_Model extends ORM {

	// Relationships
//	protected $has_many = array('banner_pages');
	protected $belongs_to_many = array('pages');
//	protected $belongs_to_many = array('banners','pages');

	public function render($item) {
		$y = "green";
		if ($this->id == 1)
			$y = "red";
		$link = "#";
		return "<a id='status_".$item->id."' style='color:$y' href='#' title='change status' onclick='change_status(".$item->id.",\"".$item->object_name."\");'>".$this->title."</a>";
	}

} // End Auth User Model