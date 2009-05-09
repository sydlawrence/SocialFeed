<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Zest Admin controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Sessions_Controller extends Controller {

	
	public function login() {
	
	}
	
	public function reset_password() {
		if ($_POST && isset($_POST['forgot_password_username'])) {
			$_POST = $this->input->xss_clean($_POST);
			$email = $_POST['forgot_password_username'];
			
			$user = ORM::factory('user',$email);
			if ($user->id > 0)
				$user->reset_password();
		}
		
		url::redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function logout() {
	
	}	
	
	
	
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Welcome Controller
