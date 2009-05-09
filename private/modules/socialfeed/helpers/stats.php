<?php defined('SYSPATH') or die('No direct script access.');
 
class stats_Core {
	
	public static function get_visitor_count($start, $end, $unique = false) {
		
		$db = new Database();
		if (!$unique) {
			if ($start)
				$count = $db->where(array('when_log >' => $start,'when_log <' =>$end))->count_records('statistics');
			else
				$count = $db->count_records('statistics');
			return $count;
		}
		else {
			if ($start) 
				$count = $db->select('COUNT(DISTINCT ip) as count')->where(array('when_log >' => $start,'when_log <' =>$end))->from('statistics')->get()->result_array();
			else
				$count = $db->select('COUNT(DISTINCT ip) as count')->from('statistics')->get()->result_array();
			return $count[0]->count;
		}
	} 
	
	public static function referrers($start,$end) {
		$db = new Database();
		$sql = "select DISTINCT referrer from zest_statistics where when_log > '$start' AND when_log < '$end'";
		$query = $db->query($sql)->result_array();

		$array = array();
		
		foreach ($query as $q) {
			if ($q->referrer != '' && strpos($q->referrer,$_SERVER['HTTP_HOST']) === FALSE) {
			
				$count = $db->where(array('referrer'=>$q->referrer,'when_log >' => $start,'when_log <' =>$end))->count_records('statistics');
				$array[$q->referrer] = $count;
			}
		}
		
		arsort($array);
		return $array;
	}
	
	public static function popular_pages($start,$end) {
		$db = new Database();
		$sql = "select item_type, item_id from zest_statistics where when_log > '$start' AND when_log < '$end'";
		$query = $db->query($sql)->result_array();
	//	print_r($query);
	//	exit;
		$array = array();
		
		foreach ($query as $q) {
			
				$count = $db->where(array('item_type'=>$q->item_type,'item_id' => $q->item_id,'when_log >' => $start,'when_log <' =>$end))->count_records('statistics');
				
				$str = $q->item_type.'.'.$q->item_id;
				$array[$str] = $count;
		}
		arsort($array);
		//exit;
		return $array;
	}

	public static function user_agents($start,$end) {
		$db = new Database();
		$sql = "select DISTINCT user_agent from zest_statistics where when_log > '$start' AND when_log < '$end'";
		$query = $db->query($sql)->result_array();
	//	print_r($query);
	//	exit;
		$array = array();
		
		foreach ($query as $q) {
			
				$count = $db->where(array('user_agent'=>$q->user_agent,'when_log >' => $start,'when_log <' =>$end))->count_records('statistics');
				
				if (zest::parse_user_agent($q->user_agent,'is_browser')) {
					$browser = zest::parse_user_agent($q->user_agent,'browser');
					$version = zest::parse_user_agent($q->user_agent,'version');
					$version = explode('.',$version);
					$version = $version[0];
					$str = $browser. ' '.$version;
			//		echo $str.' '.$count.'<br/>';
					
					if (isset($array[$str])) {
						$count = $array[$str] + $count;
						$array[$str] = $count;
					}
					else
						$array[$str] = $count;
				}
		}
		arsort($array);
		//exit;
		return $array;
	}

}

 
?>