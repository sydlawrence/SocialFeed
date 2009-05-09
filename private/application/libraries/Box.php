<?php defined('SYSPATH') or die('No direct script access.');
 
class Box_Core {
 
 	protected $template = "box";
 	
 	protected $favicon = "";
 	
 	protected $title = "";
 	
 	protected $html = "";
 	
 	protected $short = "";
 	
 	protected $date_format = "d M Y, h:ia";
 	
 	protected $post;
 	
 	protected $class;
 	
 	public static function factory($post) {
 		$object_name = "Box_".$post->external_feed->get_box_class();
 		if (class_exists($object_name, false)) {
 			return new $object_name($post);
 		}
 		else {
 			return new Box_Core($post);
 		}
 	}
 	
 	public function __construct($post) {
 		$this->post = $post;	
 		$this->set_class($this->generate_class());
 		$this->set_short($post->external_feed->box_short);
 	}
 	
 	public function generate_class() {
 		return str_replace('.','_',$this->post->external_feed->get_box_class());
 	}
 	
 	public function set_short($short) {
 		$this->short = $short;
 	}
 	
 	public function get_class() {
 		return $this->class;
 	}
 	
 	public function set_class($class) {
 		$this->class = $class;
 	}
 	
 	public function get_template() {
 		if (file_exists(DOCROOT.THEME_PATH.$this->template.'.html')) {
 			$template = THEME_PATH.$this->template.'.html';	
 		}
 		else {
 			$template = DEFAULT_THEME_PATH.$this->template.'.html';
 		}
 	
 	 	return zest::template_to_html($template);
 	}
 	 	
 	public function render() {
 		$html = $this->get_template();
     	return $this->replace_values($html);
 	}
 	
 	protected function get_date() {
 		return date($this->date_format,strtotime($this->post->pubDate));
 	}
  	
  	public function render_text() {
  		return strip_tags($this->post->text);
  	}
  	
  	public function replace_values($html) {
  		
  		$html = str_replace('{FAVICON}',$this->post->external_feed->favicon,$html);
 		$html = str_replace('{PERMALINK}',$this->post->permalink(),$html);
 		$html = str_replace('{FEED_PERMALINK}',$this->post->external_feed->permalink(),$html);
 		$html = str_replace('{SHORT}',$this->short,$html);
 		$html = str_replace('{DATE}',$this->get_date(),$html);
 		$html = str_replace('{TEXT}',$this->render_text(),$html);
 		$html = str_replace('{CLASS}',$this->class,$html);
  		$html = str_replace('{TITLE}',$this->post->title,$html);
 	
 		return $html;  	
  	}
	
	

}
?>
