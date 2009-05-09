<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Media_Model extends ORM {

	// Relationships
//	protected $has_many = array('user_tokens');
	protected $has_and_belongs_to_many = array('banners',"products","feedposts","pages");

	protected $belongs_to = array('type_media');


	public $name;
	
	public function __construct($id = NULL) {
		parent::__construct($id);
		$this->name = $this->title;
	}

//	protected $belongs_to_many = array('banners','pages');

	/**
	 * Allows a model to be loaded by filename.
	 */
	public function unique_key($id)
	{
		if ( ! empty($id) AND is_string($id) AND ! ctype_digit($id))
		{
			return 'filename';
		}

		return parent::unique_key($id);
	}
	
	public function get_url() {
		return url::base()."assets/uploads/".$this->filename;
	}
	
	public function get_crop_url($width,$height) {
		return url::site()."image/crop/$width/$height/".$this->filename;
	}
	
	public function render_cropped($width = 50,$height =50,$class = '') {
		return '<img src="'.$this->get_crop_url($width,$height).'" alt="'.$this->name.'" class="'.$class.'"/>';
	}
	
	public function delete() {
		
		unlink(DOCROOT.'assets/uploads/'.$this->filename);
		parent::delete();
	}

} // End Auth User Model