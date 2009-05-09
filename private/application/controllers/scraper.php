<?php defined('SYSPATH') or die('No direct script access.');
/**
 *
 * @package    SocialFeed
 * @author     Syd Lawrence
 * @copyright  (c) 2009 Syd Lawrence
 */
class Scraper_Controller extends Zest_Controller {
	
	public $sites = array();
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
	
		$url = "http://sam.clark.name/socialism";	
		
		$scraper = new Site_scraper($url);
		$results = $scraper->execute();
		print_r($results);
		
		exit;	
	}
	
	
}