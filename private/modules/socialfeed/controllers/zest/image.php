<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Image controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Image_Controller extends Controller {

	// Disable this controller when Kohana is set to production mode.
	// See http://docs.kohanaphp.com/installation/deployment for more details.
	const ALLOW_PRODUCTION = TRUE;

	const DEFAULT_IMAGE = "zest/img/no_image.jpg";

	// Set the name of the template to use

	public function index($method, $args)
	{	
		if ($method == "crop") {
			$this->__crop($args);
		}
	}
	
	private function __crop($args) {

		$width = $args[0];
		$height = $args[1];
		if (isset($args[2])) {
			$filename = 'assets/uploads/'.$args[2];
		}	
		else {
			$filename = self::DEFAULT_IMAGE;
		}

		$image = new Image($filename);	
	
		$image = $image->resize($width,$height,Image::MINIMUM);
	
		$image2 = $image->crop($width, $height);
		$image2->render();
	}
	
	public function __call($method, $arguments) {
		$this->index($method, $arguments);
	}
} // End Image Controller
