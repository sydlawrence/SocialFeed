<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Media controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Media_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{		
		if (isset($_POST['edit_image_id'])) {
			$image = ORM::factory('media',$_POST['edit_image_id']);
			$image->title = $_POST['edit_image_title'];
			$image->category = $_POST['edit_image_category'];
			$image->save();
		}
		
		$this->__set_heading("Media");

		$view = new View('zest/tabs');
		
		$tabs = array(
			"Images"	=> $this->__images(),
			"Files"	=> $this->__files(),
		);

		if ($this->superuser) {
			$tabs["Videos"] = $this->__videos();
		}
		$view->tabs = $tabs;
		$this->__set_content($view);
	}
	
	public function get_categories() {
		$db = Database::instance();
		$query = "SELECT DISTINCT category from zest_medias";
		$result = $db->query($query);
		$arr = array();
		foreach ($result as $r) {
			$arr[] = $r->category;
		}
		echo implode("\n",$arr);
		exit;
	}
	
	public function new_form() {
		$form = '<div class="hide" id="new_image_form">';
		$form .= form::open_multipart('admin/media/add',array('onsubmit'=>"('#image_upload_button').attr('value','Uploading...')"));
		$form .= input(array('title','Title'),'');
		$form .= input(array('image_category','Category'),'',array('class'=>'media_category_complete'));
		$form .= hidden('media_type_id',1);
		$form .= '<input class="submit" type="submit" value="Upload" id="image_upload_button">';
		$form .= form::close();
		$form .= "</div>";
		echo $form;
		exit;
	}
	
	public function upload_file() {
		if (isset($_POST['name']) && isset($_POST['type'])) {		
			$file = ORM::factory('media');
			$file->media_type_id = $_POST['type'];
			$file->title = $_POST['name'];
			if (isset($_POST['category']))
				$file->category = $_POST['category'];
			
			$filename = upload::save('file');
			$file->filename = str_replace('assets/uploads/','',$filename);
			$file->save();
			switch ($file->media_type_id) {
				case 3:
					url::redirect('admin/media#tab_Files_2');
					break;
				default:
					url::redirect('admin/media');
					break;
			
			}
			
			
			
		}
	
	}
	
	public function delete($id) {
		$item = ORM::factory('media',$id);
		$type = $item->media_type_id;
		$msg = $item->title." has been deleted";
		$item->delete();
		if (!request::is_ajax()) {
			switch ($type) {
			case 3:
				url::redirect('admin/media#tab_Files_2');
				break;
			default:
				url::redirect('admin/media');
				break;
			}
		}
		else {
			$this->template->errors = 0;
			$this->template->error_message = "";
			$this->template->message = $msg;
		}

	}

	
	private function __files() {
		$view = new View('zest/padding');
		
		$content = "";
		
		$content .= form::open_multipart('admin/media/upload_file');
		$content .= form::hidden('type','3');
		$content .= form::label('name','File Name');
		$content .= form::input('name','',"class='fullWidth'");
		$content .= form::label('category','Category');
		$content .= form::input('category','',"class='fullWidth media_category_complete'");
		$content .= form::upload('file');
		$content .= "<input type='submit' onclick='this.value=\"Uploading...\"' class='submit' value='Save'>";
		$content .= form::close();
		
		$content .= "<hr/>";
		
		
		$medias = ORM::factory('media_type', '3')->orderby('category','asc')->medias;
		$cat = "";		
		foreach($medias as $media) {
			if ($media->category != $cat) {
				$content .= "<p>".$media->category."</p>";
				$cat = $media->category;
			}
			$content .= "<li class='file' style='list-style:none;padding-left:50px !important;'><div style='float:right;'>&nbsp;<a href='/admin/delete/media/".$media->id."' title='delete' class='ajax-button' rel='delete'><img src='/zest/images/delete.png' alt='delete'></a></div><div style='float:left;width:150px'><a href='".$media->get_url()."' target='_blank' title='".$media->title."'>".$media->title."</a></div>".$media->get_url()."</li>";

		}
		$view->content = $content;
		
	
		return $view;
	}
	
	private function __images() {
		$html = new View('zest/columns');
		
		$html->left_content = new View('zest/image_display');
		
		$content = "";
		
		$medias = ORM::factory('media_type', '1')->orderby('category','asc')->medias;
		$cat = "";		
		foreach($medias as $media) {
			if ($media->category != $cat) {
				$content .= "<p>".$media->category."</p>";
				$cat = $media->category;
			}
			$content .= "<a id='image_link_".$media->id."' onclick='select_image(\"".$media->id."\");return false;' href='".url::base()."assets/uploads/".$media->filename."' target='_blank' title='".$media->title."'>".html::image(array('src' => 'index.php/admin/thumbnail/'.$media->filename, 'alt' => $media->title, "id" => "image_".$media->id ,'title' => $media->title, 'class' => 'square_thumb'))."</a>";
			
	//		$content .= "<a class='thickbox' id='image_link_".$media->id."' href='".url::base()."assets/images/".$media->filename."' target='_blank' title='".$media->title."'>".html::image(array('src' => 'index.php/admin/thumbnail/'.$media->filename, 'alt' => $media->title, "id" => "image_".$media->id ,'title' => $media->title, 'class' => 'square_thumb'))."</a>";

		}
		
		$content .= "<p>&nbsp;</p><p id='image_url'></p>";
		
		$html->left_content->content = $content;
		
		$html->right_content = $this->__right_side();
		
		return $html;
	}
	
	private function __videos() {
	
		
	
		$html = form::open_multipart();
		$html .= form::upload(array("name"=>"video"), 'path/to/local/file').'<br/>';
		$html .= form::label('title','Title');
		$html .= form::input(array("name" => "title", "class"=>"fullWidth"));
		$html .= form::submit(array("value"=>"upload","class"=>"submit"));
		$html .= form::close();
	
	
	
		return $html;
	}
	
	public function get_name($id) {
		$media = ORM::factory('media',$id);
		echo $media->id.'{}'.$media->title.'{}'.$media->category;
		exit;
	}
	
	public function edit($id) {
		$media = ORM::factory('media',$id);
//		$media-;
		exit;
	
	}
	
	private function __right_side() {
	
		
	
		$html = new View('zest/new_image_form');
		$html .= "<hr/>";
		$html .= zest::button('#','Preview Image',array('onclick'=>'preview_image();return false;'));
		$html .= "<hr/>";
		$html .= zest::button('#','Edit Image',array('id'=>'edit_image','onclick'=>'edit_image();return false;'));
		
		$html .= form::open(null,array('id'=>'edit_image_form','class'=>'hide'));
		$html .= form::hidden('media_type_id',1);
		$html .= form::input(array('name'=>'edit_image_id','id'=>'edit_image_id','style'=>'display:none'));
		
		$html .= form::input(array('edit_image_title','Title'),'');
		
		$html .= form::input(array('edit_image_category','Category'),'','class="media_category_complete fullWidth"');		
		$html .= "<input type='submit' value='Save' class='submit' />";
		$html .= form::close();
		
		$html .= "<hr/>";
		$html .= zest::button('#','Delete Image',array('onclick'=>'delete_image();return false;'));

		return $html;
	}
	
	public function add() {
		if ($_POST) {
			$_FILES = Validation::factory($_FILES)->add_rules('file', 'upload::valid', 'upload::type[gif,jpg,png]', 'upload::size[2M]');
 			
 			//print_r($_FILES);
 			//print_r($_FILES->validate());
 			//exit;
 			
 			if (true)
			//if ($_FILES->validate())
			{
				// Temporary file name
				$filename = upload::save('file');
 				
 				$new_filename = md5(rand(0,1000)).basename($filename);
				// Resize, sharpen, and save the image
				$img = Image::factory($filename);				
				if ($img->__get('height') > 1000 || $img->__get('width') > 1000)
					$img->resize(1000,1000,Image::AUTO);
				
				$img->save(DOCROOT.'assets/uploads/'.$new_filename);
				// Remove the temporary file
				unlink($filename);
				
				$array = array(
					'media_type_id' => $_POST['media_type_id'],
					'filename' => $new_filename,
					'title' => $_POST['title'],
				);
				
				$file = ORM::factory('media');
				foreach ($array as $key => $val)
				{
					// Set user data
					$file->$key = $val;
				}
				
				if (isset($_POST['image_category']))
					$file->category = $_POST['image_category'];
				
				$file->save();
				url::redirect('admin/media');
				
			}
			else {
				$this->index();
				$this->__throw_error("There was an error uploading your image, please make sure it is a .gif, .jpg or .png and is no larger than 2MB in size.");
			}
		}
	else {
			$this->index();
		}
	}
		
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Media Controller
