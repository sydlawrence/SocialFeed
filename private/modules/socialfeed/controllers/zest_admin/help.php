<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Help controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Help_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{		
		$this->__set_heading("Help");
		$view = new View('zest/tabs');
		$view->tabs = array(
			"Videos"				=> $this->__videos(),
			"Glossary" 				=> $this->__glossary(),
			"Terms &amp; Conditions"	=> $this->__t_and_c(),
#			"Tools" 				=> $this->__tools(),
		);	
		$this->__set_content($view);
	}
	
	private function __videos() {
		return "This will have video tutorials on it.";
	}
	
	private function __glossary() {
		return "This will have a glossary of terms on it, i.e. seo, url, etc.";
	}
	
	private function __t_and_c() {
		return "This needs to have terms and conditions!";
	}
	
	private function __tools() {
		return "This will have a list of tools on it, i.e. buzzwerdz, sitegrader, etc.";
	}
		
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Help Controller