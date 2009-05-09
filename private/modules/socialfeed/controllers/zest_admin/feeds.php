<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Feeds controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Feeds_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	

	public function index()
	{		
		$this->__set_heading("Feeds");

		$view = new View('zest/tabs');
		
		if ($_POST && !isset($_POST['external_feed'])) {
				
			$feed = ORM::factory('feed');
			$feed->title = $_POST['title'];
			$feed->save();
			$this->__throw_success("New feed ".$feed->title." has been created");
			
		}	
		
		$feeds = ORM::factory('feed')->find_all();
		
		$tabs = array();
		foreach ($feeds as $feed) {
		
			$tab = "<div class='padding'>
				<p>";
			$tab .= $cells[] = '<div style="float:right">'.html::anchor('rss/'.$feed->id, html::image('zest/images/rss.jpg'),array("target" => "blank")).'</div>'.html::anchor('admin/feeds/settings/'.$feed->id, html::image('zest/images/cog.png').' settings',array()); 
				
			$tab.="</p><p>&nbsp;</p> <hr />";
		
			$view2 = "<ul style='list-style:none'>";
			$posts = $feed->orderby('id','desc')->feedposts;	
			foreach ($posts as $post) {
			
				$x = strtolower($post->status->title);
				
				if ($post->status_id == 2)
					$y = "green";
				else
					$y = "red";
			
				$comm = count($post->get_comments());
				
				if ($comm == 0) {
					$comm = 'no comments';
				}
				else if ($comm == 1)
					$comm = '1 comment';
				else
					$comm = $comm.' comments';
			
				$comm = "<a href='".$post->get_url()."#comments' target='_BLANK'>".$comm."</a>";
			
			
				if (!$feed->has_comments())
					$comm = "";
				else {
					$new_comms = $post->get_new_comments($this->user);
					if (count($new_comms) > 0)
						$comm = "<a href='".$post->get_url()."#comments' target='_BLANK'>(".count($new_comms)." new)</a> ".$comm;
				}
					
					
					
				$view2 .= "<li style='padding-left:45px !important;' class='feedpost $x'><div class='right'>$comm&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:$y'>$x</span>&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/feeds/edit/'.$post->id,html::image('zest/images/icon_pencil.png'))."&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/delete/feedpost/'.$post->id,html::image('zest/images/delete.png'),array('class'=> 'ajax-button','rel'=>'delete'))."</div><span>".date('d/m/y',strtotime($post->date))."&nbsp;&nbsp;&nbsp;&nbsp;".$post->title."</span></li>";

			}
			
			$view2 .= "</ul>";
		
			$tab .= $view2;
			$tab .= "<p>&nbsp;</p>";
			$tab .= html::anchor('admin/feeds/add/'.$feed->id, 'Add Post',array("class"=>"button")); 
			$tab .= "</div>";
			$tabs[$feed->title] = $tab;
		}

			
		$tabx = new View('zest/new_feed_form');
		
		$tabs["Add Feed"] = $tabx;
		$tabs["External feeds"] = $this->__external_feeds();
		$view->tabs = $tabs;
		$this->__set_content($view);
	}
	
	public function __external_feeds() {
		if (isset($_GET['update'])) {
			$feeds = ORM::factory('external_feed')->find_all();
			foreach ($feeds as $feed) {
				$feed->update();
			}
		}
	
	
		$view_top = "<a href='/admin/feeds?update=true#tab_External_feeds_3' class='button'>Update Now</a><br/>";
		$view = new View('zest/tabs');
		$tabs = array();
		$feeds = ORM::factory('external_feed')->find_all();
		foreach ($feeds as $feed) {
			$title = "";
			if ($feed->favicon != "") {
				$title .= "<img src='".$feed->favicon."' alt='".$feed->title."' />";
			}
			if (count($feeds) < 6)
				$title .= text::limit_chars($feed->title, 10, "...", false);
			$tabs[$title] = $this->__external_feed_render($feed);
		}
		
		$tabs["Add New"] = $this->__external_feed_form();
		$view->tabs = $tabs;
		return $view_top.$view;
	}
	
	public function delete_external_feedpost($id) {
		$item = ORM::factory('external_feedpost',$id);
		$item->status_id = 1;
		$msg = $item->title." has been deleted";
		$item->save();
		if (!request::is_ajax())
			url::redirect('admin/feeds');
		else {
			$this->template->errors = 0;
			$this->template->error_message = "";
			$this->template->message = $msg;
			
		}
		
	}
	
	public function delete_external_feed($id) {
		$item = ORM::factory('external_feed',$id);
		$item->delete();
	}
	
	public function __external_feed_render($feed) {
		$html = "<p>Last updated: ".zest::relative_time($feed->last_updated)."</p>";
		
		$html .= "<ul style='list-style:none'>";
		foreach ($feed->where('status_id',2)->orderby('pubDate','DESC')->external_feedposts as $post) {
			$html .= "<li  class='feedpost' style='padding-left:45px !important;background-image:url(".$feed->favicon.") !important;'><span class='right'>&nbsp;".html::anchor('admin/delete/external_feedpost/'.$post->id,html::image('zest/images/delete.png'),array('class'=> 'ajax-button','rel'=>'delete'))."</span><span><a href='".$post->permalink."' target='_BLANK'>". text::limit_chars($post->title, 100, "...", true)."</a></span></li>";
		}
		
		$html .= "</ul>";
		
		return $html;
	}
	
	public function __external_feed_form() {
	
		$item = ORM::factory('external_feed');
		
		if (isset($_POST['external_feed'])) {
			if ($_POST['id'] > 0)
				$item = ORM::factory('external_feed',$_POST['id']);
			$post = $_POST;
			unset($post['external_feed']);
			foreach ($post as $key => $value) {
				$item->$key = $value;
			}
			
			$item->save();
			$this->__throw_success("External feed ".$item->title." has been saved");
		}
	
		
	
		$html = "";
		$html .= form::open('admin/feeds#tab_External_feeds_3');
		$html .= form::hidden('id',$item->id);
		$html .= form::hidden('external_feed','true');
		
		$html .= form::input(array('title','Title'),$item->title);
		
		$html .= form::input(array('url','Feed Url'),$item->url);
		
		$html .= form::input(array('favicon','Favicon'),$item->favicon);
		
		$html .= form::label('username','Username<small><i> (optional)</i></small>');
		$html .= form::input('username',$item->username,'class="fullWidth"');
		$html .= "<hr/>";
		
		$html .= form::label('password','Password<small><i> (optional)</i></small>');
		$html .= form::password('password','','class="fullWidth"');
		
		$html .= form::submit(null, 'Save','class="submit"');
		$html .= form::close();
		
		return $html;
	}
	
	
	
	public function delete($id) {
		$item = ORM::factory('feedpost',$id);
		$msg = $item->title." has been deleted";
		$item->delete();
		if (!request::is_ajax())
			url::redirect('admin/feeds');
		else {
			$this->template->errors = 0;
			$this->template->error_message = "";
			$this->template->message = $msg;
			
		}
	}
	
	public function add($id) {
		if ($_POST)
			$this->__form_submit();
		$feed = ORM::factory('feed',$id);
		
		$this->__set_heading("Add a new post to ".$feed->title);
		$view = new View('zest/content');
		
		$array = array(
				"title"			=>	"",
				"url"			=>	"",
				"text"			=>	"",
				"user_id"		=>	$this->user->id,
				"feed_id"		=>	$id,
				"feedpost_id"	=>	"",
				"media_id"		=>	"",
				"status_id"		=>	"",
				"tags"			=>	"",
				"type"			=>	"new",
			);
		
		$view->content = $this->__form($array);
		$this->__set_content($view);
	}
	
	public function edit($id) {
		
		if ($_POST)
			$this->__form_submit();
		
		
		$feedpost = ORM::factory('feedpost',$id);
		
		$tags = $feedpost->tags;
		
		$t = "";
		$i = 0;
		foreach($tags as $tag){
			if ($i != 0)
				$t.= ", ";
			$t .= $tag->title;
			
			$i++;
		}
		
		$array = array(
			"title"			=>	$feedpost->title,
			"url"			=>	$feedpost->url,
			"text"			=>	$feedpost->text,
			"user_id"		=>	$feedpost->user_id,
			"feed_id"		=>	$feedpost->feed_id,
			"feedpost_id"	=>	$feedpost->id,
			"media_id"		=>	$feedpost->media_id,
			"status_id"		=>	$feedpost->status_id,
			"tags"			=>	$t,
			"type"			=>	"edit",
		);
		
		$this->__set_heading("Edit Post - ".$array['title']);
		$view = new View('zest/content');
		$view->content = $this->__form($array);
		$this->__set_content($view);
	}

	public function settings($id) {
		$feed = ORM::factory('feed',$id);

		$view = new View('zest/content');
		if ($_POST) {
			unset($_POST['submit']);
			foreach ($_POST as $key => $val) {
				$feed->$key = $val;
			}	
			$feed->save();
		}
		$content = form::open();
		$content .= form::label('title','Title');
		$content .= form::input('title',$feed->title,'class="fullWidth"');
		
		$content .= form::label('description','Description');
		$content .= form::input('description',$feed->description,'class="fullWidth"');

		$content .= form::label('allow_comments','Allow Comments');
		$options = array('0' => 'No','1' => 'Yes');
		$content .= form::dropdown('allow_comments',$options,$feed->allow_comments,'class="fullWidth"');

		$content .= form::label('tweet_desc','<br/><a href="http://twitter.com/" target="_BLANK">'.html::image('http://www.twitter.com/favicon.ico').'</a>&nbsp;Twitter Description (i.e. "new blog post:")');
		$content .= form::input('tweet_desc',$feed->tweet_desc,'class="fullWidth"');

		$content .= form::label('tweet','<br/><a href="http://twitter.com/" target="_BLANK">'.html::image('http://www.twitter.com/favicon.ico').'</a>&nbsp;Tweet it?');
		$options = array('0' => "No","1"=>"Yes");
		$content .= form::dropdown('tweet',$options,$feed->tweet);
		

		$content .= form::submit('submit', 'Save','class="submit"');
		$content .= form::close();

		$view->content = $content;

		$this->__set_heading("Feed Settings - ".$feed->title);	
		$this->__set_content($view);
	}
	
	private function __form_submit() {
		if (!isset($_POST['type']) || $_POST['type'] == 'error') {
			$this->__throw_error("There has been an error! please try again.");
			return;
		}
		
		
		
		$type = $_POST['type'];
		unset($_POST['type']);
		
		$id = $_POST['feedpost_id'];
		
		if ($id > 0){
			$feedpost = ORM::factory('feedpost',$id);
		}
		else {
			$feedpost = ORM::factory('feedpost');
		}
		
		//tags
		$tags = $feedpost->tags;
		//$feedpost->remove('tags');
		foreach ($tags as $tag) {
			$feedpost->remove(ORM::factory('tag', $tag->title));
		}
		$tag_string = $_POST['tags'];
		$tags = explode(', ',$tag_string);
		foreach ($tags as $t) {
			if (!$tag = ORM::factory('tag',$t)) {
				$tag = ORM::factory('tag');
				$tag->title = $t;
				$tag->save;
			}
			$feedpost->add($tag);
		} 
		
		$feedpost->title = $_POST['title'];

		$_POST['media_id'] = ORM::factory('media',$_POST['media_id']);

		$feedpost->text = $_POST['text'];
		$feedpost->user_id = $_POST['user_id'];
		$feedpost->feed_id = $_POST['feed_id'];
		$feedpost->media_id = $_POST['media_id'];
		$feedpost->status_id = $_POST['status_id'];
		
		
		if ($feedpost->save()) {
			switch ($type) {
				case 'new':
					$this->__throw_success("New post : ".$feedpost->title." has been saved");
					break;
				case 'edit':
					$this->__throw_success($feedpost->title." has been saved");
					break;
				
			};
			url::redirect('admin/feeds');
		}	
	}
	
	private function __form($array = false) {
		if (!$array) {
			$array = array(
				"title"			=>	"",
				"url"			=>	"",
				"text"			=>	"",
				"user_id"		=>	"",
				"feed_id"		=>	"",
				"feedpost_id"	=>	"",
				"media_id"		=>	"",
				"status_id"		=>	"",
				"tags"			=>	"",
				"type"			=>	"error",
			);
		}
		
		$form = "";
		$form .= form::open(null,array('class'=>'valid_form'));
		
		$form .= form::input(array('title','Title'),$array['title'],'class="required fullWidth"');
		
		$form .= form::textarea(array("display" => "Text", "name" => "text"), $array['text']);
		
		
		$form .= form::hidden("user_id",$array['user_id']);
		$form .= form::hidden("feed_id",$array['feed_id']);
		$form .= form::hidden("feedpost_id",$array['feedpost_id']);
		$form .= form::hidden("type",$array['type']);

		$form .= form::label('media_id','Image');
				
		$form .= $this->zest->image_selector('media_id', $array['media_id'],FALSE,FALSE);
		
		$form .= form::input(array('tags','Tags'),$array['tags']);
		
		$form .= form::label('status_id','Status');
		
		$status = ORM::factory('status')->find_all();
		
		$arr = array();
		foreach ($status as $s) {
			$arr[$s->id] = $s->title;
		}
		$form .= form::dropdown(array("class" => "fullWidth", "name" => "status_id"),$arr,$array['status_id']);
		
		$form .= form::submit('submit', 'Save','class="submit"');
		$form .= form::close();
		return $form;	
	}
	
	public function rss($id) {
		$feed = ORM::factory('feed',$id);
		
		$items = $feed->feedposts;
		
		$items = array();
		foreach ($feed->feedposts as $item) {
			$items[] = array(
				"date"	=> $item->date,
				"title" => $item->title,
				"description" => $item->text,
				"item_is_complete" => 1,
#				"link"	=>	"http://www.google.com",
			);
		}
		$channel=array(
			"title"=> ORM::factory('setting','COMPANY_NAME')->value." - ".$feed->title,
			"description"=>"",
			"link"=> "http://".$_SERVER['HTTP_HOST'].url::base(),
			"items" => $items,
     	);
		
		$rss = new RSS_Writer($channel);
		echo $rss->get_feed();
		$this->auto_render = false;
	}
	
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Feeds Controller
