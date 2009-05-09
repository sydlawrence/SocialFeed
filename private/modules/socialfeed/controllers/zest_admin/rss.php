<?php defined('SYSPATH') or die('No direct script access.');
/**
 * RSS controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Rss_Controller extends Controller{
	
	public function index($id) {
		$feed = ORM::factory('feed',$id);
		
		$items = $feed->feedposts;
		
		$items = array();
		foreach ($feed->feedposts as $item) {
			$items[] = array(
				"date"	=> $item->date,
				"title" => $item->title,
				"description" => $item->text,
				"item_is_complete" => 1,
#				"link"	=>	"http://www.google.com",
			);
		}
		$channel=array(
			"title"=> ORM::factory('setting','COMPANY_NAME')->value." - ".$feed->title,
			"description"=>"",
			"link"=> "http://".$_SERVER['HTTP_HOST'].url::base(),
			"items" => $items,
     	);
		
		$rss = new RSS_Writer($channel);
		echo $rss->get_feed();
	}
	
	public function __call($method, $arguments) {
		$this->index($method, $arguments);
	}
}