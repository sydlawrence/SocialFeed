<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Zest Admin controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Zest_Admin_Controller extends Template_Controller {

	const ALLOW_PRODUCTION = TRUE;

	public $template = 'zest/template';
	public $user;
	public $superuser = FALSE;
	public $admin = FALSE;
	public $UNDER_DEVELOPMENT;
	
	public $zest;
	public $theme;
	public $requires_authentication = true;
	
	public $config;
	
	public function __construct() {
		$this->theme = Theme::instance();
		$this->zest = new Zest_admin();
		parent::__construct();
		$this->config = Kohana::config_load('zest');
		$this->__setup();
		if ((request::is_ajax())) {		
			$this->auto_render = FALSE;
			Event::add('system.post_controller', array($this, '_json_render'));	
		}
	}
		
	public function json($array) {
		$this->auto_render = FALSE;
		$array = json::decode_url();
				
		$json = array();
		
		$items = ORM::factory($array['class'][0])->where($array['where'])->orderby($array['orderby'])->limit($array['limit'][0])->find_all();		
		foreach ($items as $item)
		{
    		$array = $item->as_array();
    		if (isset($array['url']) && !$array['url'])
    			unset($array['url']);    		
    		if (method_exists($item,'get_url'))
				$array['url'] = $item->get_url();
    		$json[] = $array;
		}
		
		echo json_encode($json);
		$this->auto_render = FALSE;
	}
	
	public function _json_render() {
		unset($this->input);
		unset($this->uri);		
		echo json_encode($this->template->kohana_local_data);
		$this->auto_render = FALSE;
	}
	
	public function index()
	{
		$content = new View('zest/tabs');
				
		$tabs = array(
			"Home"				=> $this->_dashboard(),
		);
		$content->tabs = $tabs;
		
		$this->__set_content($content);

		$this->__set_heading("Dashboard");
	}
	
	public function __set_extraJS($js) {
		$this->template->extraJS = $js;
	}
	
	public function __set_content($content) {
		$this->template->content = $content;
	}
	
	public function __set_heading($heading) {
		$this->template->heading = $heading;
	}
	
	public function __throw_success($msg) {
		$this->template->success_message = $msg;
	}
	
	public function __throw_warning($msg) {
		$this->template->alert_message = $msg;
	}
	
	public function __throw_error($msg) {
		$this->template->error_message = $msg;
	}
	
	protected function __setup()
	{
		if ($this->requires_authentication) {
			$this->__check_login();
			if ($this->user->roles[0]->id > 3)
				url::redirect('admin/login');
		}
		
		if (!$this->user)
			$this->user = ORM::factory('user');
		
		$this->UNDER_DEVELOPMENT = ORM::factory('setting','UNDER_DEVELOPMENT')->value;
		
		$this->template->superuser = $this->superuser;
		
		$page_title = ORM::factory('setting','COMPANY_NAME');
		$this->template->title = '.: Social Feed - '.$page_title->value.' :.';

		// The username of the user logged in
		$this->template->username = $this->user->username;
		
		// extraJS
		$this->template->extraJS = "";
			
		// An array of links to display at the top.
		$this->template->topLinks = $this->__top_links();
		
		// An array of links to display in the main area.
		$this->template->mainLinks = $this->__main_links();
		
		// An array of links to display on the right of the main area.		
		$this->template->rightLinks = $this->__right_links();
	
	}
	
	private function __top_links()
	{
		$array = array
			(
				'Dashboard'     	=> 'admin',
				'Profile'      		=> 'admin/profile',
			#	'Templates'			=> 'admin/templates',
				'Themes'			=> 'admin/snippets',
				'Superuser'			=> 'admin/settings'
			);
			
		
		return $array;
	}
	
	private function __main_links()
	{
		$arr = $this->config['admin.main'];
		$arr = array_reverse($arr);
		return $arr;
	}
	
	private function __right_links()
	{
		if ($this->admin)
		{				
			$array = $this->config['admin.admin'];
		} else {
			$array = array();
		}
		return $array;
	}
	
	private function _dashboard() {
		$html = "";
		
		$html .= "<div style='width:335px;height:300px;position:relative;margin-right:15px;padding:15px;margin-bottom:15px;border:4px solid #dededd;float:left'>
		".$this->__quick_links()."
		</div>";
		
		$html .= "<div style='width:335px;height:300px;position:relative;padding:2%;margin-bottom:15px;border:4px solid #dededd;float:left'>
		".$this->_stats_summary()."
		</div>";
		
		$html .= "<div style='width:335px;height:300px;position:relative;margin-right:15px;padding:15px;margin-bottom:15px;border:4px solid #dededd;float:left'>
		".$this->_zest_news()."
		</div>";
		
		$html .= "<div style='width:335px;height:300px;position:relative;padding:2%;margin-bottom:15px;border:4px solid #dededd;float:left'>
		".$this->_marm_news()."
		</div>";
		
		$html .= "<div class='spacer'>&nbsp;</div>";
		
		return $html;
	}
	
	private function _stats_summary() {
		$html = "<h2>Site Statistics Summary</h2>";
		
		$date = date('m Y',strtotime('1 months ago'));
		$date = explode(" ",$date);
		$html .= $this->__visitor_count_month(array('month' => $date[0],'year' => $date[1]),TRUE);
		
		return $html;
	}
	
	private function _marm_news() {
		return "";
		$html = "<h2>Marmalade News</h2><hr/>";
		$url = "http://dev.marmdevelopment.co.uk/rss/7";
		
		$curl_options = array(
						CURLOPT_RETURNTRANSFER  => TRUE,
						CURLOPT_URL             => $url
						);
		$curl = new Curl($curl_options);
		
		$data = new SimpleXMLElement($curl->execute());
		$data = $data->channel->item;
		$arr = array();
		$i = 0;
		foreach($data as $item) {
			if ($i == 5)
				break;
			$arr[] = $item;
			$i++;
		}
		$arr = array_reverse($arr);
		
		foreach ($arr as $item) {
			$html .= "<p>".date('d M',strtotime($item->pubDate))."<br/><a href='".$item->link."' target='_BLANK'>".$item->title."</a></p><hr/>";	
		}

				
		return $html;
	}
	
	public function _zest_news() {
		return "";
		$html = "<h2>Zest News</h2><hr/>";
		$url = "http://zestcms.com/rss/4";
		
		$curl_options = array(
						CURLOPT_RETURNTRANSFER  => TRUE,
						CURLOPT_URL             => $url
						);
		$curl = new Curl($curl_options);
		
		$data = new SimpleXMLElement($curl->execute());
		$data = $data->channel->item;
		$arr = array();
		$i = 0;
		foreach($data as $item) {
			if ($i == 5)
				break;
			$arr[] = $item;
			$i++;
		}
		$arr = array_reverse($arr);
		
		foreach ($arr as $item) {
			$html .= "<p>".date('d M',strtotime($item->pubDate))."<br/><a href='".$item->link."' target='_BLANK'>".$item->title."</a></p><hr/>";	
		}
				
		return $html;
	}
	
	private function __quick_links() {
		$html = "<h2>Quick Links</h2><hr />
				<h3>Edit a page</h3>
				<select class='fullWidth' onchange='location = \"".url::site()."admin/pages/edit/\"+this.value' >
				<option value=''>-- Please Select One --</option>";
		$pages = ORM::factory('page')->find_all();
		foreach ($pages as $page) {
			$html .= "<option value='".$page->id."'>".$page->title."</option>";
		}
		
		$html .= "</select><hr/ ><h3>Add a new image</h3>";
		$html .= new View('zest/new_image_form');
		
		return $html;
	}
	

	
	private function __check_login() {	
		// IF LOGGED IN
		if ($this->user = zest::check_login()) {
			
			$roles = $this->user->roles;
			foreach ($roles as $role) {
				if ($role->id == 1) {
					$this->superuser = TRUE;
				}
				
				if ($role->id == 1 || $role->id == 2)
					$this->admin = TRUE;
			}
		}
		else {
			// Redirect back to the login page
			url::redirect('admin/login');
		}
	}
			
	public function logout() {
		
		// Force a complete logout
		Auth::instance()->logout(TRUE);

		// Redirect back to the login page
		url::redirect('admin/login');
	}
	
	public function __visitor_count() {
		$content = "";
		$content .= "<p>total visits: ".stats::get_visitor_count(null,null)."</p>";
		$content .= "<p>unique visitors: ".stats::get_visitor_count(null,null,true)."</p>";
	
		$view = new View('zest/tabs');
	
		$tabs = array();
		
		for ($i = 0;$i<12;$i++) {
			$title = date('M',strtotime($i.' months ago'));		
			$date = date('m Y',strtotime($i.' months ago'));
			$date = explode(" ",$date);
			$tabs[$title] = $this->__visitor_count_month(array('month' => $date[0],'year' => $date[1]));
		}
		$view->tabs = $tabs;
		return $content.$view;
	}
	
	public function _plus_month($date) {
		$month = $date['month'];
		$year = $date['year'];
		
		$month++;
		if ($month == 13) {
			$year++;
			$month = 1;
		}
			
		return array('month' => $month,'year' => $year);
	}
	
	
	
	public function __visitor_count_month($date, $summary = FALSE) {
		
		$start_date;
		$start = date('Y-m-d H:i',strtotime($date['year']."-".$date['month']."-01 00:00"));
		$final_date = $this->_plus_month($date);
		$end = date('Y-m-d H:i',strtotime($final_date['year']."-".$final_date['month']."-01 00:00"));
		
		$html = "";
		$html .= "<p>total visits: ".stats::get_visitor_count($start,$end)."</p>";
		$html .= "<p>unique visitors: ".stats::get_visitor_count($start,$end,true)."</p>";
		$views = array();
		$unique = array();
		foreach (date::days($date['month'],$date['year']) as $day) {
			$start = date('Y-m-d H:i',strtotime($date['year']."-".$date['month']."-".$day." 00:00"));
			$end_day = $day+1;
			if (count(date::days($date['month'],$date['year'])) < $end_day) {
				$end = date('Y-m-d H:i',strtotime($final_date['year']."-".$final_date['month']."-01 00:00"));
			}
			else {
				$end = date('Y-m-d H:i',strtotime($date['year']."-".$date['month']."-".($day+1)." 00:00"));
			}
			
			
			
			$count = stats::get_visitor_count($start,$end);
			
			$views[$day] = $count;
			
			$count = stats::get_visitor_count($start,$end,true);
			$unique[$day] = $count;

		}
		
		
		$chart = new GoogChart();
				
		$dataMultiple = array( 
			"Page views" => $views,
			"Unique visitors" => $unique
		);
		
		$min = 0;
		$max = 10;
	
	//	chxr='y',$min,$max,(($max-$min)/10);
		/* # Chart 2 # */
		$chart->setChartAttrs( array(
			'type' => 'line',
			'title' => 'Visits for '.date('F Y',strtotime($start)),
			'data' => $dataMultiple,
			'size' => array( 750, 200 ),
			'labelsXY' => true,
			'color' => array('#27aae1','#e127aa'),
//			'axis' => array('1',$min,$max,(($max-$min)/10)),
			));
			
		if ($summary) {
			$chart->setChartAttrs( array(
				'size' => array( 330, 150 ),
				'axis' => array('5',$min,$max,(($max-$min)/10)),
				'labelsXY' => false,
				'legend' => false,
			));
		
		}	
			
			
		// Print chart
		$html .=  $chart;
		
		
		return $html; 
	}
	
	public function __referrers() {
		$content = "";
	
		$view = new View('zest/tabs');
	
		$tabs = array();
		
		for ($i = 0;$i<12;$i++) {
			$title = date('M',strtotime($i.' months ago'));		
			$date = date('m Y',strtotime($i.' months ago'));
			$date = explode(" ",$date);
			$tabs[$title] = $this->__referrer_month(array('month' => $date[0],'year' => $date[1]));
		}
		$view->tabs = $tabs;
		return $content.$view;
	}
	
	public function __popular_pages() {
		$content = "";
	
		$view = new View('zest/tabs');
	
		$tabs = array();
		
		for ($i = 0;$i<12;$i++) {
			$title = date('M',strtotime($i.' months ago'));		
			$date = date('m Y',strtotime($i.' months ago'));
			$date = explode(" ",$date);
			$tabs[$title] = $this->__popular_pages_month(array('month' => $date[0],'year' => $date[1]));
		}
		$view->tabs = $tabs;
		return $content.$view;
	}
	
	public function __popular_pages_month($date) {
		
		$start_date;
		$start = date('Y-m-d H:i',strtotime($date['year']."-".$date['month']."-01 00:00"));
		$final_date = $this->_plus_month($date);
		$end = date('Y-m-d H:i',strtotime($final_date['year']."-".$final_date['month']."-01 00:00"));
		
		$html = "";
		$referrers = stats::popular_pages($start,$end);		
		foreach ($referrers as $key => $val) {
			$key = explode('.',$key);
			$item = ORM::factory($key[0],$key[1]);
		
			$html .= "<div><span style='float:right'>$val</span>".ucfirst($key[0])." - <a href='".$item->get_url()."' target='_BLANK'>".$item->title."</a></div>";
		}
	
		return $html; 
	}
	
	public function __referrer_month($date) {
		
		$start_date;
		$start = date('Y-m-d H:i',strtotime($date['year']."-".$date['month']."-01 00:00"));
		$final_date = $this->_plus_month($date);
		$end = date('Y-m-d H:i',strtotime($final_date['year']."-".$final_date['month']."-01 00:00"));
		
		$html = "";
		$referrers = stats::referrers($start,$end);		
		foreach ($referrers as $key => $val) {
			$html .= "<div><span style='float:right'>$val</span><a href='$key' target='_BLANK'>$key</a></div>";
		}
	
		return $html; 
	}
	
	public function __user_agents() {
		$content = "";
	
		$view = new View('zest/tabs');
	
		$tabs = array();
		
		for ($i = 0;$i<12;$i++) {
			$title = date('M',strtotime($i.' months ago'));		
			$date = date('m Y',strtotime($i.' months ago'));
			$date = explode(" ",$date);
			$tabs[$title] = $this->__user_agents_month(array('month' => $date[0],'year' => $date[1]));
		}
		$view->tabs = $tabs;
		return $content.$view;
	}
	
	public function __user_agents_month($date) {
		
		$start_date;
		$start = date('Y-m-d H:i',strtotime($date['year']."-".$date['month']."-01 00:00"));
		$final_date = $this->_plus_month($date);
		$end = date('Y-m-d H:i',strtotime($final_date['year']."-".$final_date['month']."-01 00:00"));
		
		$html = "";
		$referrers = stats::user_agents($start,$end);		
		
		
		$chart = new GoogChart();
				
		$dataMultiple = $referrers;
		
		
		/* # Chart 2 # */
		$chart->setChartAttrs( array(
			'type' => 'pie',
			'title' => 'User Agents for '.date('F Y',strtotime($start)),
			'data' => $dataMultiple,
			'size' => array( 750, 400 ),
	#		'labelsXY' => false,
			'legend' => false,
			'color' => array('#e127aa','#27aae1'),
			));
		// Print chart
		$html .=  $chart;
		
		
		foreach ($referrers as $key => $val) {
			

			$html .= "<div><span style='float:right'>$val</span>$key</div>";
		}
	
		return $html; 
	}

	
	
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Welcome Controller
