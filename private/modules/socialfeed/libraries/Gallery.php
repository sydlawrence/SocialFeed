<?php defined('SYSPATH') or die('No direct script access.');
 
class Gallery_Core {
 	
 	protected $config;
 	
	public function __construct($options = array()) {	
		$default = array(
			"width"		=>	"100",
			"height"	=>	"100",
			"images"	=>	array(),
			"class"	=>	"square_thumb",
			"view" => null,
			"thickbox"	=>	true,
		);
		
		$config = Kohana::config_load('zest');
		$config = arr::overwrite($default,$config['gallery']);
		$this->config = arr::overwrite($config,$options);
	} // constructor function

	public function set_thickbox($var) {
		$this->config['thickbox'] = $var;
	}

	public function set_class($class) {
		$this->config['class'] = $class;
	}

	public function set_view($view) {
		return $this->config['view'] = $view;
	}
	
	public function set_height($height) {
		return $this->config['height'] = $height;
	}
	
	public function set_width($width) {
		return $this->config['width'] = $width;
	}
	
	public function set_images($images) {
		return $this->config['images'] = $images;
	}
	
	public function get_formatted_image_array() {
		$arr = array();
		foreach ($this->config['images'] as $image) {
			$arr[$image->name] = $image->filename;
		}
		if (count($arr) == 0) {
		}		
		return $arr;
	}
	
	public function render() {
		if (!$this->config['height']) {
			throw new Kohana_User_Exception("Gallery not implemented correctly", "Height has not been set. Please call <code>&#36;banner->set_height({&#36;height})</code>");
		}
		else if (!$this->config['width']) {
			throw new Kohana_User_Exception("Gallery not implemented correctly", "Width has not been set. Please call <code>&#36;banner->set_width({&#36;width})</code>");
		}
		else if ($this->config['view']) {
			return $this->render_to_view($this->config['view']);
		}
		else {
			$html = "";
			if ($this->config['thickbox'])
				$x = "thickbox";
			$images = $this->get_formatted_image_array();
			foreach ($images as $name => $filename) {
				$html .= html::file_anchor('assets/images/'.$filename, html::image('index.php/image/crop/'.$this->config['width']."/".$this->config['height']."/".$filename,array('alt' => $name,'class' => $this->config['class'])), array('class' => $x, 'title' => $name));
			}
			return $html;
		}
	}
	
	public function render_to_view($view) {		
		
		$arr = array();
		$images = $this->get_formatted_image_array();;
		$i = 0;
		if ($images) {
			$gallery = new View($view);
			
			foreach ($images as $image) {
				$arr[$image->name] = $image->filename;
				$i++;
			}
			$gallery->images = $arr;
			$gallery->height = $this->config['height'];
			$gallery->width = $this->config['width'];
			$gallery->class_name = $this->config['class'];
			$gallery->thickbox = $this->config['thickbox'];
			return 	$gallery;
		}	
		return null;
	}
}
 
?>