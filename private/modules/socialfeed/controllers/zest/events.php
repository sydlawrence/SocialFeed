<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Default Kohana controller. This controller should NOT be used in production.
 * It is for demonstration purposes only!
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Events_Controller extends Zest_Controller {

	// Disable this controller when Kohana is set to production mode.
	// See http://docs.kohanaphp.com/installation/deployment for more details.
	const ALLOW_PRODUCTION = FALSE;

	// Set the name of the template to use
	public $template = 'templates/events';
	
	public function __construct() {
		parent::__construct();
	}

	public function index($id = null,$args = null)
	{			
		$event = ORM::factory('event',$id);
		if (strtolower($event->title) == urldecode($this->uri->segment($id)))
			$this->__display_event($event);
		else
			$this->__display_events();				
	}
	
	public function __display_event($event) {
		$this->template = 'templates/event_detail';
		parent::__construct();
		$this->__set_options(array(
			"seoTitle"	=> $event->title." - Events",
			"extraCSS"	=> "",
			"extraJS"	=> "",
			"extraHead"	=> "",
			"event" => $event,
			"attendees" => $event->users,
		
		));
	}
	
	public function __display_events() {
		
		$per_page = 9;
		
		$all_page = $this->uri->segment('a_page',1);		
		$all_events = event_helper::get_all_events();
	
		$all_pagination = new Pagination(array(
    		'uri_segment'    => 'a_page', 
    		'total_items'    => count($all_events),
    		'items_per_page' => $per_page, 
    		'style'          => 'classic', 
   		));
   		
   		$past_page = $this->uri->segment('p_page',1);
   		$past_events = event_helper::get_past_events();
	
		$past_pagination = new Pagination(array(
    		'uri_segment'    => 'p_page', 
    		'total_items'    => count($past_events),
    		'items_per_page' => $per_page, 
    		'style'          => 'classic', 
   		));
   		
   		$future_events = event_helper::get_future_events();
   		$future_page = $this->uri->segment('f_page',1);
		$future_pagination = new Pagination(array(
    		'uri_segment'    => 'f_page', 
    		'total_items'    => count($future_events),
    		'items_per_page' => $per_page, 
    		'style'          => 'classic', 
   		));
	
		$this->__set_options(array(
			"seoTitle"	=> "Events",
			"extraCSS"	=> "",
			"extraJS"	=> "",
			"extraHead"	=> "",
			"future_events"		=> event_helper::get_future_events($per_page,($future_page-1)*$per_page),
			"future_pagination"	=> $future_pagination,
			"past_events"		=> event_helper::get_past_events($per_page,($past_page-1)*$per_page),
			"past_pagination"	=> $past_pagination,
			"all_events"		=> event_helper::get_all_events($per_page,($all_page-1)*$per_page),
			"all_pagination"	=> $all_pagination,
			
	//		"next" => $next,
		));
	}
	
	public function __call($method, $arguments) {
		$this->index($method);
	}
		
} // End Welcome Controller
