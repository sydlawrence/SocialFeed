<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Thumbnail controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Thumbnail_Controller extends Controller {

	// Disable this controller when Kohana is set to production mode.
	// See http://docs.kohanaphp.com/installation/deployment for more details.
	const ALLOW_PRODUCTION = FALSE;

	// Set the name of the template to use

	public function index($filename)
	{	
		$image = new Image('assets/uploads/'.$filename);		
		$image = $image->resize(100,100,Image::MINIMUM);
		$image = $image->crop(50, 50);
		$image->render();
	}
	
	public function __call($method, $arguments) {
		$this->index($method);
	}
} // End Welcome Controller