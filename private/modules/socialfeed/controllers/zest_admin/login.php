<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Login controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Login_Controller extends Template_Controller {

	// Disable this controller when Kohana is set to production mode.
	// See http://docs.kohanaphp.com/installation/deployment for more details.
	const ALLOW_PRODUCTION = TRUE;

	public $template = 'zest/login';

	// default method
	public function index()
	{			
		$this->template->title = "Please login";
		
		$this->template->content = new View('zest/login_content');
		
		
		$version = zest::get_version(TRUE);
		$this->template->version = $version;
		
		$return = login::attempt_login();
		
		if (isset($return->id)) {
			if ($return->roles[0]->id == 4)
				$this->template->message = "You do not have access to this area of the site";
			else	
				url::redirect('admin');	
		}
		else
			$this->template->message = $return;	
	}

	public function check_openID() {
			
	}

} // End Login Controller