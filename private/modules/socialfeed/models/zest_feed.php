<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Feed_Model extends ORM {

	// Relationships
//	protected $has_many = array('banner_pages');
	protected $has_many = array('feedposts');
//	protected $has_and_belongs_to_many = array('pages');
//	protected $has_one = array('media');
//	protected $has_and_belongs_to = array('user','feed');

	public function get_url() {
		return url::site().urlencode(strtolower($this->title));
	}
	
	public static function get_by_url() {
		
		$uri = uri::instance();
		$title = urldecode($uri->segment(1));
		
		$feed = ORM::factory('feed')->where('title',$title)->find();
		if ($feed->id > 0 && $title != "") {
			return $feed;
		}
		$title = str_replace('-',' ',$title);
		$feed = ORM::factory('feed')->where('title',$title)->find();
		
		if ($feed->id > 0 && $title != "")
			return $feed;
		
		if ($p = Page_Model::get_by_url()) {
			$feed = ORM::factory('feed')->where('title',$p->title)->find();
			
			if ($feed->id > 0) {
				return $feed;
			}
		}	
		
		return null;
	}
	
	public function has_comments() {
		if ($this->allow_comments == 1)
			return true;
		return false;
	}

	public function get_rss() {
		return 'http://'.$_SERVER['SERVER_NAME']."/rss/".$this->id;
	}
	
	public function render_rss() {
		return '<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="'.$this->get_rss().'" />';
	}
	
	public function get_posts($count = null,$start = 0) {
		if ($count)
			return ORM::factory('feedpost')->where(array('feed_id' => $this->id,"status_id" => 2))->orderby("id","DESC")->limit($count,$start)->find_all();
		else
			return ORM::factory('feedpost')->where(array('feed_id' => $this->id,"status_id" => 2))->orderby("id","DESC")->find_all();
	}
	
	
	/**
	 * Returns the formatted html
	 *
	 * html example
	 * e.g <h1>{TITLE}</h1><h2>{DATE}</h2><h3>by {AUTHOR}</h3>{IMAGE}{TEXT}<div class="spacer">&nbsp;</div>
	 *
	 * @param   array	$options	Options for the rendering array('count', 'date_format','image' = array($width,$height), 'word_count', 'html')
	 * @return	string	$html		Formatted HTML
	 */
	public function render_summary($options = null, $feedpost_options = null) {
	
		$array = array (
			'per_page' => 5,
			'pagination' => 'classic',
			'template' => 'feed',
			'html'   => '{FEEDPOSTS}{PAGINATION}'
		);
		
		if (!$options){
			$config = Kohana::config_load('zest');
			$options = $config['feed.summary'];
		}
		
		$array = arr::overwrite($array,$options);
		$uri = uri::instance();
		$page = $uri->segment('page',1);
		
		
		$feedposts = "";
		$posts = $this->get_posts($array['per_page'],($page-1)*$array['per_page']);
		foreach($posts as $post) {
			$feedposts .= $post->render_summary($feedpost_options);
		}
		
		$pagination = new Pagination(array(
    		// 'base_url'    => 'welcome/pagination_example/page/', // base_url will default to current uri
    		'uri_segment'    => 'page', // pass a string as uri_segment to trigger former 'label' functionality
    		'total_items'    => count($this->get_posts()), // use db count query here of course
    		'items_per_page' => $array['per_page'], // it may be handy to set defaults for stuff like this in config/pagination.php
    		'style'          => $array['pagination'] // pick one from: classic (default), digg, extended, punbb, or add your own!
		));;
		
		if ($array['template'] != '')
			$html = zest::template_to_html('snippets/'.$array['template']);
		else
			$html = $array['html'];	
		
		
		$html = str_replace("{RSS_LINK}",$this->get_rss(),$html);
		$html = str_replace("{FEEDPOSTS}",$feedposts,$html);
		$html = str_replace("{PAGINATION}",$pagination,$html);
		$html = str_replace("{FEED_LINK}",$this->get_url(),$html);
		
		return $html;
	
	}

} // End Auth User Model