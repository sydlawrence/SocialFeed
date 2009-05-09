<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Bug controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Stats_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
				
		$this->__set_heading("Statistics");

		$view = new View('zest/tabs');
		
		$view->tabs = array(
			"Visitor count"	=>	$this->__visitor_count(),
			"Referrers" => $this->__referrers(),
			"User agents" => $this->__user_agents(),
			"Popular items"	=>	$this->__popular_pages(),
		);
		
		$this->__set_content($view);	
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
	
	
	
	public function __visitor_count_month($date) {
		
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
#			'axis' => array('1',$min,$max,(($max-$min)/10)),
			));
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
	
	
	
	public function __known_bugs() {
	
	}
		
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Bug Controller