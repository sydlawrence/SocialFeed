<?php defined('SYSPATH') or die('No direct script access.');
 
class Breadcrumbs_Core {
	
	protected $links = array();
	
	protected $splitter;
	
	public static function factory( $links = array(), $splitter = '&gt;' )
	{
		return new Breadcrumbs( $links, $splitter );
	}
	 	
	public function __construct($links = array(), $splitter = "&gt;") {	
		$this->links = $links;
		$this->splitter = $splitter;
	} // constructor function
	
	public function render() {

		$array = array();
		foreach ($this->links as $link) {
			$array[] = "<a href='".$link['url']."'>".$link['title']."</a>";
		}
		
		return implode(" ".$this->splitter." ", $array);
	}
}
 
?>