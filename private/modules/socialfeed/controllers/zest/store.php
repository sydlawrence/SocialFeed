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
class Store_Controller extends Zest_Controller {

	// Disable this controller when Kohana is set to production mode.
	// See http://docs.kohanaphp.com/installation/deployment for more details.
	
	public function __construct() {
		parent::__construct();
		
	}

	public function index()
	{			
		$options = array(
			"content" => "hello world",
		);
		
		$this-__set_options($options);
	}
	
	
	
} // End Welcome Controller
