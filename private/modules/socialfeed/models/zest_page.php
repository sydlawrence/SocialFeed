<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Page_Model extends Zest_ORM {

	// Relationships
	protected $has_many = array('banner_pages','page_definitions');
	protected $has_and_belongs_to_many = array('banners',"medias");
	protected $has_one = array('template','status','form','navbar');
	protected $children = "pages";
	
	
	public $definition;
		
	public function __construct($id = null) {
		parent::__construct($id);	
	//	echo $this->bodyText;
	}
	
//	protected $belongs_to_many = array('banners','pages');

	public function get_url() {
	
		$url = url::site();
		
		$url .=	$this->seoURL;
		
		return $url;
	}
	
	public function add_this() {
		return zest::add_this($this->get_url(),$this->title);
	}
	
	public static function get_by_url() {
	
		static $instance;
		
		
		if (empty($instance)) {
					
			$uri = uri::instance();
			$page = $uri->segment(1);
			$page = ORM::factory('page')->where(array('seoURL' => $page, 'status_id' => 2))->find();
			if ($page->id > 0)
				$instance =  $page;
			else
				$instance = null;
		}
		
		return $instance;
	}
	
	public function get_children() {
		return ORM::factory('page')->where(array('parent_id' => $this->id, 'status_id' => 2))->find_all();
	}
	
	public function get_parent_id() {
		if ($this->parent_id == 0)
			return $this->id;
		else
			return $this->parent_id;
	}
	
	public function get_parent() {
		if ($this->parent_id == 0)
			return $this;
		else
			return ORM::factory('page',$this->parent_id);
	}
	
	public function get_subnav() {
		if ($this->parent_id == 0)
			$p = $this;
		else
			$p = ORM::factory('page',$this->parent_id);
				
		$options = array(
			"links"	=>	$p->get_children(),
			"view" => 'includes/subnav',
		);
		
		$navbar = new Navbar($options);
		return $navbar->render();
		
	}

} // End Auth User Model