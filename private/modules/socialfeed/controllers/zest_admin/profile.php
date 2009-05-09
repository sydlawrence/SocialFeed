<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Profile controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Profile_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		
		
		$this->__set_heading("Profile");
		$view = new View('zest/content');
		
		if ($_POST) {
			$post = new Validation($_POST);
			$post->add_rules('email', 'required', 'email');

			if ($post->validate()) {		
				$this->user->email = $post['email'];
				$this->user->openid = $post['openid'];
				if (isset($post['password']) && trim($post['password'][0]) != "") {
					if ($post['password'][0] == $post['password'][1]) {
					$this->user->password = $post['password'][1];	
					}
					else {
						$this->throw_error("Both passwords bust be the same");
					}
				}
				
				$this->user->save();
				$this->__throw_success("Your profile has been updated");
			}
			else {
				$this->throw_error("There has been an error updating your profile, please try again");
			}
		}
		
		$view->content = $this->_form($this->user);
		$this->__set_content($view);
	}
	
	public function _form($user) {
		$html = "";
		$html .= form::open(null,array('class'=>'valid_form'));
		$html .= form::input(array('email','Email'),$user->email,'class="fullWidth required email"');
		
		$html .= form::label('New Password');
		$html .= form::password('password[]','','class="fullWidth"');
		
		$html .= form::label('Repeat Password');
		$html .= form::password('password[]','','class="fullWidth"');
	
		$html .= "<hr/>";
	
		$html .= form::label('openid','OpenID <img src="http://www.plaxo.com/images/openid/login-bg.gif" />');
		$html .= '<p><small><a href="http://www.openid.net" target="_BLANK">What is an OpenID?</a></small></p>
			<p><small>Please remember the "http://"</small></p>';
		$html .= form::input('openid',$user->openid,'class="fullWidth url"');
		
		$html .= form::submit('submit', 'Save', 'class="submit"');	
				
		$html .= form::close();
		
		return $html;
	
	}
		
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Welcome Controller