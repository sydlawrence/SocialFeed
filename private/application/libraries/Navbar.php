<?php defined('SYSPATH') or die('No direct script access.');
 
class Navbar_Core {
 
 	private $links;
 	private $view;
 
 	private $products;
	public function __construct($array)
	{
		if (isset($array['links'])) 
			$this->set_links($array['links']);
		if (isset($array['view']) && $array['view'] && $array['view'] != '') 
			$this->set_view($array['view']);
		if (isset($array['products'])) 
			$this->products = $array['products'];
	}
	
	public function set_links($links) {
		$this->links = $links;
	}
	
	public function set_view($view) {
		$this->view = $view;
	}
 
  
 	public function render() {
		if (!$this->links) {
			throw new Kohana_User_Exception("Navbar not implemented correctly", "Links have not been set. Please call <code>&#36;navbar->set_links({&#36;links})</code>");
		}
		else if ($this->view) {
			return $this->render_to_view($this->view);
		}
		else {
			$html = "";
			$i=0;
	
			foreach($this->links as $link) {
				$class = "";
				if (str_replace("site","",url::current()) == $link->seoURL || url::current() == $link->seoURL || uri::segment(1) == $link->seoURL )
					$class .= "selected";
				if ($i == 0)
					$class .= " first";
				if ($i == (count($this->links) - 1))
					$class .= " last";
					
				$html .= '<li class="'.$class.'" id="menu0'.($i+1).'"><a href="'.url::site().$link->seoURL.'" class="'.$class.'">'.$link->title.'</a></li>';
				$i++;
			}
#			$html .= "</ul>";
			return $html;
		}
	}
	
	
	
	public function render_to_view($view) {
		$navbar = new View($this->view);
		$arr = array();
		foreach($this->links as $link) {
			$arr[$link->title] = $link->seoURL;
		}
		$navbar->products = $this->products;
		$navbar->links = $arr;
		return $navbar;
	}
}
?>
