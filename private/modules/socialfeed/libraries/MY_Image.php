<?php defined('SYSPATH') or die('No direct script access.');
 
class Image extends Image_Core {
 
 	const MINIMUM = 7;
 
	public function __construct($image, $config = NULL)
	{
		// don't for get to call the parent constructor!
		parent::__construct($image, $config);
	}
 
 	public function resize($width, $height, $master = NULL) {
 		
 		if ($master == self::MINIMUM) {
 			
 			$iw = $this->__get('width');
			$ih = $this->__get('height');
			
			if ($width != 0 && $height != 0) {
			
			
			$wh = $width / $height;
			$iwh = $iw / $ih;
			if ($iwh < $wh) {	
				$master = self::WIDTH;
			}
			else {
				$master = self::HEIGHT;
			}
			
			}
			else if($width == 0) {
				$master = self::WIDTH;
			}
			else if($height == 0) {
				$master = self::HEIGHT;
			}
 			
 			
 			if ($height > $ih || $width > $iw) {
 				$height = $ih;
 				$width = $iw;
 			}
 				
 			
 		}
 		
 		return parent::resize($width,$height,$master);
 	}
 
}
?>