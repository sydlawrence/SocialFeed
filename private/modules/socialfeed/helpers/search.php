<?php defined('SYSPATH') or die('No direct script access.');
 
class search_Core {
 
	public static function search_site($string) {
		$results = array();
		
		$pages = ORM::factory('page')->like(
			array(
				'title' => $string,
				'bodyText' => $string,
				'seoTitle' => $string,
				'seoKeywords' => $string,
				'seoDescription' => $string,
			)
		)->where('status',2)->find_all();
	
		$posts = ORM::factory('page')->like(
			array(
				'title' => $string,
				'text' => $string,
			)
		)->where('status',2)->find_all();
	
		$cats = ORM::factory('product_category')->like(
			array(
				'title' => $string,
				'text' => $string,
			)
		)->find_all();
	
		$prods = ORM::factory('product')->like(
			array(
				'title' => $string,
				'text' => $string,
			)
		)->find_all();
		
		$tags = ORM::factory('tag')->like(
			array (
				'title' => $string,
			)
		)->find_all();
		
		$posts2 = $tags->feedposts;
		
		$prods2 = $tags->products;
		
		
		
		
	} 
}
 
?>