<?php defined('SYSPATH') or die('No direct script access.');

class Page_Model extends Zest_Page_Model {

	// Relationships
	protected $has_many = array('banner_pages','page_definitions');
	protected $has_and_belongs_to_many = array('banners',"medias");
	protected $has_one = array('template','status','form','navbar');



} // End Auth User Model