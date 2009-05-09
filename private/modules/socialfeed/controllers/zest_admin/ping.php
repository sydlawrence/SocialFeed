<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Administrator controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Ping_Controller extends Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->technorati();
	}
	
	public function technorati()  
	{
		technorati::ping(ORM::factory('setting','COMPANY_NAME')->value,'http://'.$_SERVER['HTTP_HOST']);
	}

	
		
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Administrator Controller
