<?php defined('SYSPATH') or die('No direct script access.');

class Zest_External_feed_Model extends ORM {

	// Relationships
//	protected $has_many = array('banner_pages');
	protected $has_many = array('external_feedposts');
//	protected $has_and_belongs_to_many = array('pages');
//	protected $has_one = array('media');
//	protected $has_and_belongs_to = array('user','feed');

	public $default_status = 2;

	public function update() {
		
		// grab xml
		$items = zest::get_xml_entries($this->url);
		$this->last_updated = date('Y-m-d H:i:s');
		$this->save();
		$count = 0;
		if (!is_array($items)) {

		}
		foreach ($items as $item) {
			$values = array(
				"title" => $item->title,
				"text" => $item->text,
				"pubDate" => date('Y-m-d H:i:s',strtotime($item->pubDate)),
				"permalink" => $item->link,
				"status_id" => $this->default_status,
				"external_feed_id" => $this->id,
			);
			
			$item = ORM::factory('external_feedpost')->like(array("permalink" => $values['permalink']	, 'external_feed_id' => $this->id))->find();
			if ($item->id > 0){
			
			}
			else {
				$count++;
				foreach ($values as $key => $val) {
					$item->$key = (string)$val;
					
				}
				$item->save();
			}
		}
		return "Updated ".$count." ".$this->title." posts<br/>";
	}
} // End Auth User Model