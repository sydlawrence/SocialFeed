<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Settings controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Settings_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{		
		if ($_FILES) {
			$this->__upload_logo();	
		}
	
		$this->__set_heading("Superuser Settings");
		
		$view = new View('zest/content');
		
		$view->content  = $this->__logo();
		$view->content .= $this->__company_name();
		$view->content .= $this->__post_message();
		$view->content .= $this->__paypal();
		$view->content .= $this->__under_development();
		$this->__set_content($view);
	}
	
	private function __post_message() {
				
		$html = form::open();
		$html .= "<h2>Post a Message</h2>";
		$html .= form::label('MESSAGE_TITLE','Title');
		$html .= form::input('MESSAGE_TITLE','','class="fullWidth"');
		$html .= form::label('MESSAGE_BODY','Body');
		$html .= form::textarea(array('name' => 'MESSAGE_BODY', 'class' => 'fullWidth'));
		$html .= form::submit('submit', 'Save', 'class="submit"').'<p>&nbsp;</p><p>&nbsp;</p>';
		$html .= form::close();
		
		return $html;
	
	}
	
	private function __logo() {
		$html = form::open(NULL, array('enctype' => 'multipart/form-data'));
		$html .= form::label('file','Change the logo');
		$html .= "<br />";
		$html .= html::image('zest/images/logo.jpg');	
		$html .= "<br />";
	
		
		$html .= form::upload('file');
		$html .= form::submit('submit', 'Save', 'class="submit"').'<p>&nbsp;</p><p>&nbsp;</p>';
		$html .= form::close();
		
		return $html;
	}
	
	private function __company_name() {
		$COMPANY_NAME = ORM::factory('setting','COMPANY_NAME');

		if (isset($_POST['COMPANY_NAME'])) {
			$COMPANY_NAME = ORM::factory('setting','COMPANY_NAME');
			$COMPANY_NAME->value = $_POST['COMPANY_NAME'];
			$COMPANY_NAME->save();
		}
		
		$html = form::open();
		$html .= form::label('COMPANY_NAME','Change company name');
		$html .= form::input('COMPANY_NAME',$COMPANY_NAME->value,'class="fullWidth"');
		$html .= form::submit('submit', 'Save', 'class="submit"').'<p>&nbsp;</p><p>&nbsp;</p>';
		$html .= form::close();
		
		return $html;
	}
	
	private function __paypal() {
		$PAYPAL_ID = ORM::factory('setting','PAYPAL_ID');
		if (isset($_POST['PAYPAL_ID'])) {
			$PAYPAL_ID->value = $_POST['PAYPAL_ID'];
			$PAYPAL_ID->save();
		}
		
		
		$html = form::open();
		$html .= form::label('PAYPAL_ID','Change paypal account');
			
		$html .= form::input('PAYPAL_ID',$PAYPAL_ID->value,'class="fullWidth"');
		$html .= form::submit('submit', 'Save', 'class="submit"').'<p>&nbsp;</p><p>&nbsp;</p>';
		$html .= form::close();
	
		return $html;
	}
	
	private function __under_development() {
		$UNDER_DEVELOPMENT = ORM::factory('setting','UNDER_DEVELOPMENT');
		if (isset($_POST['UNDER_DEVELOPMENT'])) {
			$UNDER_DEVELOPMENT->value = $_POST['UNDER_DEVELOPMENT'];
			$UNDER_DEVELOPMENT->save();
		}
		
		$data = array("name" => "UNDER_DEVELOPMENT", "class" => "fullWidth");
		$options = array(null => "YES", "1" => "NO");
		$selected = $UNDER_DEVELOPMENT->value;
		
		$html = form::open();
		$html .= form::label('UNDER_DEVELOPMENT','Under Development');
		
		$html .= form::dropdown($data, $options, $selected);
		
		$html .= form::submit('submit', 'Save', 'class="submit"').'<p>&nbsp;</p><p>&nbsp;</p>';
		$html .= form::close();
		
		return $html;
	}
	
	private function __upload_logo() {
		$_FILES = Validation::factory($_FILES)->add_rules('file', 'upload::valid', 'upload::type[gif,jpg,png]', 'upload::size[2M]');
 
	
		unlink(DOCROOT.'zest/images/logo.jpg');
			
		// Temporary file name
		$filename = upload::save('file');


		// Resize, sharpen, and save the image
		$img = Image::factory($filename);

			
		$img->resize(150,80,Image::AUTO);


		$img->save(DOCROOT.'zest/images/logo.jpg');

		// Remove the temporary file
		unlink($filename);

		$this->__throw_success("The image has been successfully uploaded!");
		$this->__throw_warning("If the logo appears to be unchanged, the logo will change next time you login.");
			
		return true;
			
		
	}
		
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Settings Controller