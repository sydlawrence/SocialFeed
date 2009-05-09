<?php defined('SYSPATH') or die('No direct script access.');
 
class Navbar_Core {
 
 	private $links;
 	private $view;
 
 	public $template = "<li class='{CLASS}'><a href='{URL}' class='{CLASS}'>{TITLE}</a></li>";
 
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
				if ($link->get_parent_id() == Page_Model::get_by_url()->id)
					$class .= "selected";
				if ($i == 0)
					$class .= " first";
				if ($i == (count($this->links) - 1))
					$class .= " last";
					
				$x = $this->template;
				$x = str_replace('{CLASS}',$class,$x);
				$x = str_replace('{TITLE}',$link->get_definition()->title,$x);
				$x = str_replace('{URL}',$link->get_url(),$x);
				
				$html .= $x;
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
			$arr[$link->get_definition()->title] = $link->seoURL;
		}
		$navbar->products = $this->products;
		$navbar->links = $arr;
		return $navbar;
	}
}
?>
