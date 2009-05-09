<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Front End Zest controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Zest_Controller extends Template_Controller {

	public $main_feed = 1;
	public $latest_count = 5;
	
	public $template = 'templates/main';
	
	public $shop_uri = "shop";
	
	public $page;
	public $navbar;
	public $subnav;
	public $header;
	public $footer;
	public $title;
	public $session;
	public $user;
	public $extraHead;	
	public $seoTitle;
	public $content;

	public function __construct() {
		socialFeed::get_favicon_from('http://www.delicious.com/sydlawrence');
		$this->session = Session::instance();
		$this->db = new Database();
		parent::__construct();
		$_POST = $this->input->xss_clean($_POST);
		if ($this->input->post('attempt_login')) {
			$return = login::attempt_login();
			
			if (isset($return->id) && $return->id > 0)
				$this->user = $return;
			else
				$this->__set_options(array('error' => $return));
				if (isset($_GET['redirect']))
					url::redirect(urldecode($_GET['redirect']));
				
		}
	
		$this->user = login::check_login();
			
		if ($this->input->get('logout')) {
			Auth::instance()->logout(TRUE);
			url::redirect();
		}

		$this->page = Page_Model::get_by_url();
		$this->feed = Feed_Model::get_by_url();
		$this->feedpost = Feedpost_Model::get_by_url();
		$this->__setup();
		
		$this->header = new View('includes/header');
		$this->footer = new View('includes/footer');
		
		$this->__binds();
	}
	
	public function cron($key = 0) {
		if ($key == "3579") {
			$feeds = ORM::factory('external_feed')->find_all();
			foreach ($feeds as $feed) {
				echo $feed->update();
			}
		}
		exit;
	}
	
	
	public function __binds() {
		$this->template->bind("navbar",$this->navbar)
						->bind("header",$this->header)
						->bind("footer",$this->footer)
						->bind("seoTitle",$this->seoTitle)
						->bind("user",$this->user)
						->bind("extraHead",$this->extraHead)
						->bind("page",$this->page)
						->bind("title",$this->title)
						->bind("content",$this->content);
		$this->header->bind("navbar",$this->navbar)
						->bind("header",$this->header)
						->bind("footer",$this->footer)
						->bind("title",$this->title)
						->bind("page",$this->page)
						->bind("seoTitle",$this->seoTitle)
						->bind("user",$this->user)
						->bind("extraHead",$this->extraHead)
						->bind("content",$this->content);
		$this->footer->bind("navbar",$this->navbar)
						->bind("header",$this->header)
						->bind("title",$this->title)
						->bind("page",$this->page)
						->bind("footer",$this->footer)
						->bind("seoTitle",$this->seoTitle)
						->bind("user",$this->user)
						->bind("extraHead",$this->extraHead)
						->bind("content",$this->content);
	}
	
	
	public function __set($key,$val) {
		$this->$key = $val;
	}
	
	public function index() {
	
			
		if (	($this->page && $this->page->id > 0)
				|| $this->feed 
				|| $this->feedpost 
			) {/* Page Found */}
		else
			throw new Kohana_404_Exception('Page cannot be found');

		if ($this->page && $this->page->id > 0 && !$this->feedpost)
			$this->__render_page();
		if ($this->feed && !$this->feedpost)
			$this->__render_feed();
		if ($this->feedpost)
			$this->__render_feedpost();
		
	}
	
	public function __render_page() {			
		$this->__binds();
		
		$this->template->bind("page",$this->page);
		$this->header->bind("page",$this->page);
		$this->footer->bind("page",$this->page);			
			
		zest::add_stat('page',$this->page->id);
		
		$this->seoTitle = $this->page->seoTitle;
		$this->title = $this->page->title;
		$this->content = text::widont($this->page->bodyText);
	
		$this->__set_options(array(
			"extraCSS"		=> $this->page->extraCSS,
			"extraJS"		=> $this->page->extraJS,
		));			
	}
	
	public function __render_feedpost($options = null) {
		
		$this->template->bind("feed",$this->feed)
						->bind("feedpost",$this->feedpost);
		$this->header->bind("feed",$this->feed)
						->bind("feedpost",$this->feedpost);
		$this->footer->bind("feed",$this->feed)
						->bind("feedpost",$this->feedpost);
	
	
	
		zest::add_stat('feedpost',$this->feedpost->id);
		if (isset($_GET['activate'])) {
			$comment = ORM::factory('comment',$_GET['id'])->attempt_activate($_GET['hash']);
			url::redirect($this->feedpost->get_url().'#comments');
		}
		if (isset($_GET['delete'])) {
			$comment = ORM::factory('comment',$_GET['id']);
			if ($comment->can_modify()) {
				$comment->delete();
				url::redirect($this->feedpost->get_url().'#comments');
			}
		}
	
		$this->seoTitle	= $this->feedpost->title." : ".$this->feed->title;
		$this->extraHead = $this->feed->render_rss();
		$this->title = $this->feedpost->title;
		$this->content = $this->feedpost->render($options);
	
	}
	
	public function __render_feed($options = null, $feedpost_options = null) {
		
		$this->template->bind("feed",$this->feed);
		$this->header->bind("feed",$this->feed);
		$this->footer->bind("feed",$this->feed);
	
		$content = $this->feed->render_summary($options,$feedpost_options);
		if ($this->page)
			$content = $this->page->get_definition()->bodyText.$content;			
		$this->seoTitle	= $this->feed->title;
		$this->extraHead = $this->feed->render_rss();
		$this->title = $this->feed->title;
		$this->content = $content;
	}
	
	public function logout() {
		Auth::instance()->logout(TRUE);
		url::redirect('');
	}
	
	private function __setup($options = null) {
		$this->navbar = $this->__get_navbars();
		$this->extraHead = ORM::factory('feed',$this->main_feed)->render_rss().ORM::factory('setting','EXTRA_HEAD')->value;		
		$this->__set_options(array(		
			"analytics"		=> ORM::factory('setting','ANALYTICS_CODE')->value,	
		));
	
		if ($options) {
			foreach ($options as $key => $value) {
				$this->__set_options($key,$value);
			}
		}
	}
		
	public function __set_options($variable,$val=null) {
		if (is_array($variable)) {
			foreach ($variable as $var => $val) {
				$this->__set_options($var,$val);
			}
		}
		else {			

			$this->template->$variable = $val;
			$this->header->$variable = $val;
			$this->footer->$variable = $val;
		}
	}
	
	public function __get_navbars() {
		$n = array();
		$navs = ORM::factory('navbar')->find_all();
		foreach ($navs as $nav) {
			$n[] = $nav->render();
		}
		return $n;
	}
	
	public function __call($method, $arguments) {
		$this->index($method);
	}
	
} // End Welcome Controller