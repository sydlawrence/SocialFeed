<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Default Kohana controller. This controller should NOT be used in production.
 * It is for demonstration purposes only!
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Thumbnail_Controller extends Controller {

	// Disable this controller when Kohana is set to production mode.
	// See http://docs.kohanaphp.com/installation/deployment for more details.
	const ALLOW_PRODUCTION = FALSE;

	// Set the name of the template to use

	public function index($filename)
	{	

		if (is_int($filename)) {
			$filename = ORM::factory('media',$filename)->filename;
		}
		$image = new Image('assets/uploads/'.$filename);		
		$image = $image->resize(100,100,Image::MINIMUM);
		$image = $image->crop(50, 50);
		$image->render();
	}
	
	public function __call($method, $arguments) {
		$this->index($method);
	}
} // End Welcome Controller