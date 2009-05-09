<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Search controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Preview_Controller extends Zest_Controller {

	// Disable this controller when Kohana is set to production mode.
	// See http://docs.kohanaphp.com/installation/deployment for more details.
	const ALLOW_PRODUCTION = FALSE;
	
	public function __construct() {
		parent::__construct();
	}

	public function index($id = null)
	{	
	
		$page = ORM::factory('page',$id);
		
		$post = $_POST;
		
		if (isset($post['banner'])) {
    	    $banner = $post['banner'];
    	    unset($post['banner']);
	    }
	    
	    if (isset($banner) && count($banner) > 0) {
	    	$banner_images = $banner;
			 	
		 	$page_banners = $page->banners;
		 	$arr = array();
		 	
		 	
		 	
		 	
		 	foreach ($page_banners as $b) { 
		 		$arr[] = $b;
		 		$page->remove($b);	
		 	}
		 	if (count($arr))
  			 	ORM::factory('banner')->delete_all($arr);
		 	
		 	$b = ORM::factory('banner');
		 	$b = new Banner_Model();
		 	$b->title = $page->title.' - Banner';
		 	foreach ($banner_images as $image) {
		 		$b->add(ORM::factory('media', $image));
		 	}
		 				 			 	
		 	$page->add($b);    
	    }
   	    
   	    if (isset($post['gallery'])) {
	    	$gallery = $post['gallery'];
	    	unset($post['gallery']);
	    }
	    
	    if (isset($gallery) && count($gallery) > 0) {			        	    	
	    	$page_images = $page->medias;
		 	$arr = array();
		 	foreach ($page_images as $img) { 
		 		$arr[] = $img->id;
		 		$page->remove($img);	
		 	}
		 	
		 	
		 	
		 	foreach ($gallery as $image) {
		 		$page->add(ORM::factory('media', $image));
		 	}

	    }
	    
	    
	    foreach ($post as $key => $val)
		{
			// Set user data
			$page->$key = $val;
		}

		$this->page = $page;
		
		$this->template = new View('templates/'.$this->page->template->url);
		$this->setup_done = false;
		$this->__setup();
		
		$extraJS = "$(function() {
			$('body').append('<div style=\"position:absolute;top:0px;left:0px;background: rgb(0, 174, 239); color:#fff;padding:20px;\">THIS IS ONLY A PREVIEW</div>');
		});";
		
		$this->__set_options(array(
			"seoTitle"		=> "PREVIEW - ".$this->page->seoTitle,
			"extraJS"		=> $this->page->extraJS.$extraJS,
		));

	}

				
} // End Welcome Controller
