<?php defined('SYSPATH') or die('No direct script access.');
 
class Banner_Core {
	
	protected $config; 	
 	
	public function __construct($options = array()) {	
		$default = array(
			"width" => 900,
			"height" => 150,
			"view" => "includes/banner",
			"images"	=>	array(),
		);
		
		$config = Kohana::config_load('zest');
		$config = arr::overwrite($default,$config['banner']);
		$this->config = arr::overwrite($config,$options);
	
	} // constructor function

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
		return $arr;
	}
	
	public function render() {
		if (!$this->config['height']) {
			throw new Kohana_User_Exception("Banner not implemented correctly", "Height has not been set. Please call <code>&#36;banner->set_height({&#36;height})</code>");
		}
		else if (!$this->config['width']) {
			throw new Kohana_User_Exception("Banner not implemented correctly", "Width has not been set. Please call <code>&#36;banner->set_width({&#36;width})</code>");
		}
		else if (!$this->config['view']) {
			throw new Kohana_User_Exception("Banner not implemented correctly", "View has not been set. Please call <code>&#36;banner->set_view({&#36;view})</code>");
		}
		else {
			$banner = new View($this->config['view']);
			$banner->images = $this->get_formatted_image_array();
			$banner->height = $this->config['height'];
			$banner->width = $this->config['width'];
			return 	$banner;
		}
	}
}
 
?>