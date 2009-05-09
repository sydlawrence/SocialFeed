<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Pages controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Pages_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	private $page_array = array();

	private function get_children($parent, $level = 0) {
   		// retrieve all children of $parent
   		$pages = ORM::factory('page')->where('parent_id', $parent)->orderby('display_order','asc')->find_all();

   		// display each child
   		foreach ($pages as $page) {
      		// indent and display the title of this child
       		$this->page_array[] = array($page,$level);
       		$this->get_children($page->id, $level+1); 
   		}
	} 

	public function preview() {
		$page = ORM::factory('page');
		
		if ($_POST)
		{
         	
    	    if (isset($post['banner'])) {
        	    $banner = $post['banner'];
        	    unset($post['banner']);
    	    }
    	    
    	    if (isset($banner) && count($banner) > 0) {
    	    	$banner_images = $banner;
   			 	$page_banners = $page->banners;
   			 	$arr = array();
   			 	foreach ($page_banners as $b) { 
   			 		$arr[] = $b;
   			 		$page->remove($b);	
   			 	}
   			 	if (count($arr))
	      			 	ORM::factory('banner')->delete_all($arr);
   			 	$b = ORM::factory('banner');
   			 	$b = new Banner_Model();
   			 	$b->title = $page->title.' - Banner';
   			 	
   			 	foreach ($banner_images as $image) {
   			 		$b->add(ORM::factory('media', $image));
   			 	}
   			 	$page->add($b);
    	    }
       	    
       	    if (isset($post['gallery'])) {
    	    	$gallery = $post['gallery'];
    	    	unset($post['gallery']);
    	    }
    	    
    	    if (isset($gallery) && count($gallery) > 0) {			        	    	
    	    	$page_images = $page->medias;
   			 	$arr = array();
   			 	foreach ($page_images as $img) { 
   			 		$arr[] = $img->id;
   			 		$page->remove($img);	
   			 	}
   			 	
   			 	foreach ($gallery as $image) {
   			 		$page->add(ORM::factory('media', $image));
   			 	}
    	    }
    	        	    
    	    foreach ($post as $key => $val)
			{
				// Set user data
				$page->$key = $val;
			}
			
			print_r($page);
			exit;
   		}
	}

	public function index()
	{
				
		$this->__set_heading("Pages");
	
		$view = new View('zest/tabs');					
		
		$tab2 = $this->new_page_form();
								
		$view->tabs = array(
			"List" => $this->__page_list(),
			"Add Page" => $this->new_page_form(),
		);
		$this->__set_content($view);
	}
	
	private function __page_list() {
		$html = new View('zest/pageTable');
		
		$this->get_children(0);

		$html->pages = $this->page_array;
		
		return $html;
	}
	
	public function changeOrder() {
		
		if (isset($_POST['array'])) {
			// pages[]=page3&pages[]=page1&pages[]=page11
			
			try {
				$arr = str_replace("pages","",$_POST['array']);
				$arr = str_replace("page","",$arr);
				$arr = str_replace("[]=","",$arr);
			
				$arr = explode("&",$arr);		
		
				for($i=0;$i<count($arr);$i++) {
					$page = ORM::factory('page',$arr[$i]);
					$page->display_order = $i+1;
					$page->save();
				}
			}
			catch(Exception $e) {
				echo "Sorry, there has been an error saving the new page order, please try again!".$e->getMessage();
			}
		
		}

		exit;
	
		$this->auto_render = false;
	}
	
	public function add() {
		if ($_POST) {
			$post = new Validation($_POST);
			
			$post->add_rules('title','required');
			$post->add_rules('seoURL','required');
			
			if ($post->validate()) {
				$page = ORM::factory('page');
				foreach ($post as $key => $val)
				{
					// Set user data
					$page->$key = $val;
				}
				if ($page->save())
				{
					$this->index();
					$this->__throw_success("Page \"".$page->title."\" has been created.");
					log::activity($this->user->username." has created a new page ".$page->title, $this->user->username." (".$this->user->email.") has created a new page.");
				}
				else {
					$this->index();
					$this->__throw_error("Sorry, there has been an error, please try again.");

				}	
			
			
			}
			else {
				$this->index();
				$this->__throw_error("Please make sure that both title and SEO URL are filled out correctly");

			}
		}
		else {
			$this->index();
		}
	}
	
	private function new_page_form($array = null) {
		$view = new View('zest/padding');
		if (!$array) {	
		$array = array(
			'title' => '',
			'seoUrl' => '',
			'parent' => '',
		);
		}
	
		$html = "";
		$html .= form::open('admin/pages/add',array('class'=>'valid_form'));
		$html .= form::input(array('title','Page Title'),'','onblur="toUrl(event,\'title\',\'seoURL\')" class="required tooltip fullWidth" title="Keep it simple, this is just for your use"');		
		$html .= form::label('seoURL','URL Slug');
		$html .= form::input('seoURL','','class="required tooltip fullWidth" title="We recommend using the same as the Page Title but instead of spaces, \' \', use the hyphen symbol, \'-\'"');
		$html .= "<hr/>";
		$html .= form::label('parent_id','Parent Page');
		$html .= "<select id='parent_id' name='parent_id' class='fullWidth'>
					<option value='0'>-- NONE --</option>";
					$pages = ORM::factory('page')->find_all();
					foreach ($pages as $p) {
						$title = $p->title;
						if ($p->parent_id != 0) {
							$title = ORM::factory('page',$p->parent_id)->title." - ".$title;
						}
					
						$html .= "<option value='".$p->id."'>".$title."</option>";
					}
				$html .= "</select>	";		
		$html .= "<hr />";
	
		$html .= "<hr />";
	
		$html .= form::submit(null, 'Save','class="submit"');
		$html .= form::close();
		
		$view->content = $html;
		return $view;
	
	}
	
	public function edit($id) {
		
		$page = ORM::factory('page', $id);
				
		
		$this->__set_heading("Edit Page - ".$page->title);

		$this->template->content = new View('zest/pageForm');
	
		$this->template->content->action = url::site()."admin/pages/save/".$page->id;
		
		$this->template->content->id = $page->id;

		$tab1 = "";
		
		$tab1 = form::input(array('title','Title'),$page->title,'class="fullWidth required"');
		$tab1 .= form::textarea(array('name'=>'bodyText',"display" => 'Body Text'),$page->bodyText);		
		
		$tab4 = "<h2>SEO</h2>";
		
		$tab4 .= form::input(array('seoTitle','SEO Title'),$page->seoTitle);
		
	
		
		$tab4 .= form::label('seoURL','URL');
		$tab4 .= "<p>For advanced users only</p><p>Only a-z, 0-9. Instead of spaces, ' ', use '+'</p>";
		$tab4 .= form::input('seoURL',$page->seoURL, 'class="fullWidth required"');
		
		$tab4 .= "<hr />";

	
		
		
		$tab4 = form::label('seoKeywords','Keywords');
		$tab4 .= "<p>Please separate each keyword with a comma, ','.</p>
		<p>We suggest no more than 15 keywords</p>";
		$tab4 .= form::input('seoKeywords',$page->seoKeywords);
	
		$tab4 .= "<hr />";
	
		$tab4 .= form::label('seoDescription','Description');
		$tab4 .= "<p>We suggest no more than 140 characters</p>";
		$tab4 .= form::input('seoDescription',$page->seoDescription);
		
		
		$tab5 = "";
		$tab5 .= form::label('extraJS','Extra Javascript');

		$tab5 .= "<p>Used for analytics tracker codes etc.</p><p>For advanced users only <a onclick='$(\"#extraJS\").show();$(this).hide();return false' href='#'>click here</a></p>";
		
		$tab5 .= form::textarea(array('class' => 'hide', 'name'=>'extraJS'),$page->extraJS);
		
		$tab5 .= "<hr />";
		$tab5 .= form::label('extraCSS','Extra CSS');
		$tab5 .= "<p>For advanced users only <a href='#' onclick='$(\"#extraCSS\").show();$(this).hide();return false'>click here</a></p>";
		$tab5 .= form::textarea(array('class' => 'hide', 'name'=>'extraCSS'),$page->extraCSS);
		$statuses = ORM::factory('status')->find_all();	
		$options = array();
		foreach ($statuses as $status) {
			$options[$status->id] = $status->title;
		}
		$selected = $page->status->id;

		$this->template->content->extras  = form::label('status_id', 'Status: ');
		$this->template->content->extras .= form::dropdown("status_id", $options, $selected,'class="mini"');
		$this->template->content->extras .= html::anchor('admin/pages/delete/'.$page->id, 'Delete Page', 'onclick="return confirm(\'Are you sure?\')"');;

		$tabs = array(
			"Content" => $tab1,
		);		
		$tabs['Meta Data'] = $tab4;
		
		
		$tabs['Extras'] = $tab5;
		
		$this->template->content->tabs = $tabs;
	}
	
	public function save($id) {
		
		$page = ORM::factory('page',$id);
		
		if ($_POST)
		{
         	// Instantiate Validation, use $post, so we don't overwrite $_POST fields with our own things
        	$post = new Validation($_POST);
 	 	
        	// Add some rules, the input field, followed by a list of checks, carried out in order
  
        	// Test to see if things passed the rule checks
        	if ($post->validate())
        	{
        	    // Yes! everything is valid
        	    
        	    
        	    if (isset($post['banner'])) {
	        	    $banner = $post['banner'];
	        	    unset($post['banner']);
        	    }
        	    
        	    if (isset($banner) && count($banner) > 0) {
        	    	$banner_images = $banner;
       			 	
       			 	$page_banners = $page->banners;
       			 	$arr = array();
       			 	
       			 	
       			 	
       			 	
       			 	foreach ($page_banners as $b) { 
       			 		$arr[] = $b;
       			 		$page->remove($b);	
       			 	}
       			 	if (count($arr))
 	      			 	ORM::factory('banner')->delete_all($arr);
       			 	
       			 	$b = ORM::factory('banner');
       			 	$b = new Banner_Model();
       			 	$b->title = $page->title.' - Banner';
       			 	$b->save();
       			 	foreach ($banner_images as $image) {
       			 		$b->add(ORM::factory('media', $image));
       			 	}
       			 	
       			 	$b->save();
       			 	
       			 	
       			 	
       			 	$page->add($b);
       			 	/*
        	    	remove current banners_pages where page_id = $id;
        	    	add new banner
        	    	and new banners_medias where banner_id = new banner and media_id = selected id
        			*/	    
        	    }
           	    
           	    if (isset($post['gallery'])) {
        	    	$gallery = $post['gallery'];
        	    	unset($post['gallery']);
        	    }
        	    
        	    if (isset($gallery) && count($gallery) > 0) {			        	    	
        	    	$page_images = $page->medias;
       			 	$arr = array();
       			 	foreach ($page_images as $img) { 
       			 		$arr[] = $img->id;
       			 		$page->remove($img);	
       			 	}
       			 	
       			 	
       			 	
       			 	foreach ($gallery as $image) {
       			 		$page->add(ORM::factory('media', $image));
       			 	}

        	    }
        	    
        	    
        	    foreach ($post as $key => $val)
				{
					// Set user data
					$page->$key = $val;
				}
					
				if ($page->save())
				{
					$this->index();
					url::redirect('admin/pages');
				}
				else {
					$this->edit($id);
					$this->template->error_message = "Sorry, there has been an error, please try again.";
				}
        	    

        	    // ok, do whatever ...

        	}
        	// No! We have validation errors, we need to show the form again, with the errors
        	else
        	{
        		$this->edit($id);
        		if ($post['title'] == '') {
	        	 	$this->template->error_message = "Sorry, there needs to be a title.";
    			}   	 	   
    	    }
   		}
   		else
   		{
   				$this->edit($id);
        	 	$this->template->error_message = "nothing has been posted!!!!";
   		}
		
	}
		
	public function __call($method, $arguments)
	{
		$this->index();
		//exit;
	
		// Disable auto-rendering
		//$this->auto_render = FALSE;

		// By defining a __call method, all pages routed to this controller
		// that result in 404 errors will be handled by this method, instead of
		// being displayed as "Page Not Found" errors.
		//echo 'This text is generated by __call. If you expected the index page, you need to use: welcome/index/'.substr(Router::$current_uri, 8);
	}

} // End Welcome Controller