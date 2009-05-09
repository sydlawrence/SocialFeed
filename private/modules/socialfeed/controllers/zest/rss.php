<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Rss controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Rss_Controller extends Controller{
	
	public function index($id) {
		$feed = ORM::factory('feed',$id);
		
		$posts = $feed->where(array('status_id' => 2))->feedposts;
		
		$items = array();
		foreach ($posts as $item) {
			$items[] = array(
				"pubDate"	=> $item->get_date('r'),
				"title" => $item->title,
				"description" => text::limit_words($item->text,200),
				"item_is_complete" => 1,
				"link"	=>	"http://".$_SERVER['HTTP_HOST'].$item->get_url(),
			);
		}
		$channel=array(
			"title"=> ORM::factory('setting','COMPANY_NAME')->value." - ".$feed->title,
			"description"=>$feed->description,
			"link"=> "http://".$_SERVER['HTTP_HOST'].url::base(),
			"items" => $items,
     	);
		
		$rss = new RSS_Writer($channel);
		echo $rss->get_feed();
	}
	
	public function full() {
		$posts = ORM::factory('feedpost')->$feed->where(array('status_id' => 2))->find_all();
		
		$items = array();
		foreach ($posts as $item) {
			$items[] = array(
				"pubDate"	=> $item->get_date('r'),
				"title" => $item->title,
				"description" => text::limit_words($item->text,200),
				"item_is_complete" => 1,
				"link"	=>	"http://".$_SERVER['HTTP_HOST'].$item->get_url(),
			);
		}
		$channel=array(
			"title"=> ORM::factory('setting','COMPANY_NAME')->value." - ".$feed->title,
			"description"=>$feed->description,
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