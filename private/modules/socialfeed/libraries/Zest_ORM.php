<?php defined('SYSPATH') or die('No direct script access.');

class Zest_ORM extends ORM {
		
	public function save() {
		$log = ORM::factory('activity');
		$log->user_id = login::check_login()->id;
		$log->item_type = $this->object_name;
		$log->item_id = $this->id;
		if ($this->id > 0) {
			$log->activity_type = "update";
			$log->item_old = serialize($this);
		}
		else {
			$log->activity_type = "insert";
			$log->item_old = serialize($this);
		}	
		$log->save();
		
		return parent::save();
	}
	
	public function delete() {
		$log = ORM::factory('activity');
		$log->user_id = login::check_login()->id;
		$log->item_type = $this->object_name;
		$log->item_id = $this->id;
		$log->activity_type = "delete";
		$log->item_old = serialize($this);	
		$log->save();
		return parent::delete();
	}

} // End Auth User Model