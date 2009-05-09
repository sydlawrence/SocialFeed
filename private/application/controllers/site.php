<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Custom Front End Zest controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Site_Controller extends Zest_Controller {
	
	public $feeds;
	
	public $theme;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
	
		$this->theme = Theme::instance();
	
		parent::index();
		
		
		
		$feeds = ORM::factory('external_feed')->find_all();
		$this->feeds = $feeds;
		$content = $this->_render_boxes();
		$this->__set_options(array(
			'content' => $content,
			'feeds' => $this->feeds,
			'theme' => $this->theme,
			'profile_links' => $this->_render_profiles(),
		));
	}
	
	public function _render_boxes() {
		$posts = ORM::factory('external_feedpost')->orderby('pubDate','desc')->find_all();
		$html = "";
		$i = 1;
		foreach ($posts as $post) {
			$box = $post->box();
			if ($i%3 == 0)
				$box->set_class($box->get_class().' last');
			$html .= $box->render();
			$i++;
		}
		return $html;
	}
	
	public function _render_profiles() {
		$html = "";
		$profiles = ORM::factory('profile')->find_all();
		foreach ($profiles as $profile) {
			$html .= $profile->render();
		}
		
		return $html;
	}
}