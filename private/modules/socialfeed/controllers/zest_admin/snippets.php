<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Forms controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Snippets_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		
		if (isset($_POST['filename'])) {			
			if (file_exists(APPPATH.'/views/snippets/'.strtolower($_POST['filename']).'.zest')) { }
			else {
				$ourFileHandle = fopen(APPPATH.'/views/snippets/'.strtolower($_POST['filename']).'.zest', 'w') or die("can't open file");
				fclose($ourFileHandle);
				url::redirect('admin/snippets/edit/'.strtolower($_POST['filename']));
			}
		}

		
		$this->__set_heading("Snippets");
		$view = new View('zest/tabs');	
			
		$tabs = array(
			"List"	=> $this->__list(),
			"Add New" => $this->__form(),
		);
		
		$view->tabs = $tabs;
		$this->__set_content($view);
	}
	
	private function __form() {
		$form = "";
		$form .= form::open();
		$form .= form::label('filename','Title');
		$form .= form::input('filename','','class="fullWidth"');
		$form .= form::submit('submit', 'Save', 'class="submit"');
		$form .= form::close();
		return $form;
	}
	
	public function edit($url) {
		$display_name = ucwords(str_replace('_',' ',$url));
		$this->__set_heading("Edit Snippet - ".$display_name);
		$view = new View('zest/content');
		
		$content = form::open('admin/snippets/save/'.$url);
		$html = zest::template_to_html('snippets/'.$url);
		
		
		
		$content .= form::label('content','Code');
		$content .= '<p><small>This is only for advanced users. To edit <a onclick="$(\'#content\').toggle();return false;" href="#">click here</a></small></p>';
		$content .= form::textarea('content',$html,'id="content" class="fullWidth no-editor hide"');
		$content .= form::submit('submit', 'Save', 'class="submit"');
		$content .= form::close();
		
		$view->content = $content;
		
		$this->__set_content($view);
	}
	
	public function save($filename) {
		zest::save_to_file('snippets/'.$filename.'.zest',$_POST['content']);
		url::redirect('admin/snippets');
	}
	
	
	
	public function __list() {
		$html = "<ul style='list-style:none'>";
		$directory = APPPATH.'/views/snippets/';
		$files = zest::dir_to_array($directory);
	    foreach ($files as $file) {
	    	$filename = str_replace('.zest','',$file);
	        
	        $display_name = ucwords(str_replace('_',' ',$filename));
	        
	        $html .= "<li style='padding-left:45px !important;' class='snippet'><div class='right'>&nbsp;".html::anchor('admin/snippets/edit/'.$filename,html::image('zest/images/icon_pencil.png'))."</div><span>".$display_name."</span></li>";
	
	    // tidy up: close the handler
	    }
		
		$html .= "</ul>";
		return $html;
	}
		
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Forms Controller