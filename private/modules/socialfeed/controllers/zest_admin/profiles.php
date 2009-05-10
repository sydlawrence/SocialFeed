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
	
	public function scan() {
		$url = $_REQUEST['url'];
		$scraper = new Site_scraper($url);
		$results = $scraper->execute();
		
		$profiles = $results['profiles'];
		$feeds = $results['feeds'];
		
		$p = array();
		foreach ($profiles as $profile) {
			$item = ORM::factory('profile');
			$item->favicon = socialFeed::get_favicon_from($profile);
			$item->url = $profile;
			$item->fl_active = 1;
			$item->save();
			$p[] = $item->as_array();
		}
		
		$f = array();
		foreach ($feeds as $title => $feed) {
			$item = ORM::factory('external_feed');
			$item->favicon = socialFeed::get_favicon_from($feed['profile']);
			$item->title = $title;
			$item->url = $feed['feed'];
			$item->save();
			$f[] = $item->as_array();
		}
		
		$array = array("profiles"=>$p,"feeds"=>$f);				
		echo json_encode($array);
		exit;
	
	}
	
	public function activate($id) {
		$item = ORM::factory('profile',$id);
		$item->fl_active = 1;
		$item->save();
	}
	
	public function _list() {
		$html = "";
		$items = ORM::factory('profile')->find_all();
		
		$active = "";
		$inactive = "";
		foreach ($items as $item) {
			$i = "<li class='profile' title='".$item->url."'><img src='".$item->get_favicon()."' /></li>";
			if ($item->fl_active)
				$active .= $i;
			else
				$inactive .= $i;
		}
		
		
			
		$html .= "<fieldset><legend>Display</legend>";		
		$html .= "<ul id='active' class='connectedSortable'>".$active."<ul>";
		$html .= "</fieldset>";
		
		$html .= "<fieldset><legend>Don't Display</legend>";		
		$html .= "<ul id='inactive' class='connectedSortable'>".$inactive."<ul>";
		$html .= "</fieldset>";
		
		$html .= "<fieldset><legend>Delete</legend>
		<ul class='connectedSortable' id='delete'></ul>
		</fieldset>";
		
		return $html;
	}
	
	public function _form() {
		$html = new View('zest/profile_form');;
		
		return $html;
	}
	
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Feeds Controller
