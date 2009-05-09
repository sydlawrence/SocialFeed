<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Feeds controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Profiles_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{		
		$this->__set_heading("Profiles");

		$view = new View('zest/tabs');
		
		$tabs = array();
		
		$tabs['List'] = $this->_list();	
		$tabs["Add New"] = $this->_form();
		$view->tabs = $tabs;
		$this->__set_content($view);
	}
	
	public function _list() {
		$items = ORM::factory('profile')->orderby(array('fl_active'=>'DESC','title'=>'ASC'))->find_all();
		
		$html = "<ul>";
		
		foreach ($items as $item) {
			$html .= "<li><span style='float:right'>".$item->fl_active."</span>".$item->get_favicon()." ".$item->title."</li>";
		}
		$html .= "</ul>";
		return $html;
	}
	
	public function _form() {
		$html = "";
		
		
		return $html;
	}
	
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Feeds Controller
