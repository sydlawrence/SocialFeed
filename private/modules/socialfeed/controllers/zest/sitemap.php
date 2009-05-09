<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Sitemap controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Sitemap_Controller extends Zest_Controller{
	
	
	public function __construct() {
		parent::__construct();
	}		
	
	public function index()
	{
		$this->__setup();		
		$this->__set_options("seoTitle","Your Quote Cart");
		
		$pages = ORM::factory('page')->where('status_id',2)->find_all();
    	$html = "";
    	
    	$www = $_SERVER['SERVER_NAME'];
    	
    	foreach ($pages as $page) {
    		if ($page->seoURL == "")
	    		$url = 'http://'.$www."/";
    		else
	    		$url = 'http://'.$www."/".$page->seoURL.".html";
    	
	        $html .= "<li>".$url."</li>";
		}
		return $html;
	}
	
	public function xml() {
		$sitemap=new Sitemap; //create new sitemap
		
		$www = $_SERVER['SERVER_NAME'];
		
    	$pages = ORM::factory('page')->where('status_id',2)->find_all();
    	foreach ($pages as $page) {
    		if ($page->seoURL == "")
	    		$url = 'http://'.$www."/";
    		else
	    		$url = 'http://'.$www."/".$page->seoURL.".html";
    	
	        $sitemap->add_url($url,date('Y-m-d'),'weekly',1); //url, last modified, change frequency, priority
		}
	
		$sitemap->location='http://'.$www.'/sitemap.xml'; //not necessary really since this url is assumed
		
		echo $sitemap->render(); //will output the sitemap and add an xml header
        $sitemap->ping_google();//tell Google about the sitemap
        $this->auto_render = false;	
	}	
	
	public function __call($method, $arguments) {
		$this->index($method);
	}
}