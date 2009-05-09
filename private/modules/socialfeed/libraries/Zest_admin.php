<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Copyright (c) <2008> Justin Poliey <jdp34@njit.edu>
 * Adapted from http://jdp.github.com/twitterlibphp
 *
 * Version: 0.1.1
 */

class Zest_admin_Core {

	const MEDIA_IMAGE = 1;
	const MEDIA_VIDEO = 2;
	const MEDIA_FILE = 3;

	public function __construct() {
	
	}
	
	public static function get_all_media($type = null) {
		
		if ($type)
			return ORM::factory('media_type',$type)->orderby('category','ASC')->medias;
		else
			return ORM::factory('media')->orderby(array('type_media_id'=>'ASC','category' => 'ASC'))->find_all();
	}
	
	public static function image_selector($name = '', $selected = null, $multi = FALSE, $obligatory = TRUE) {
		return self::media_selector(self::MEDIA_IMAGE, $name, $selected, $multi, $obligatory);
	}
	
	public static function media_selector($type = null, $name = '', $selected = null, $multi = FALSE, $obligatory = TRUE) {
		if (!$obligatory)
			$options = array(0 => '== NONE ===');
		else
			$options = array('== PLEASE SELECT ONE ===' => array());
	
		$medias = self::get_all_media($type);
		
		if (is_array($selected)) {
			$array = array();
			foreach ($selected as $key => $val)  {
				if (is_object($val)) {
					$val = $val->filename;
				}
				else {
					$val = ORM::factory('media',$val)->filename;
				}
				$array[] = $val;
				
			}
			$selected = $array;
		}
		else {
			if (is_object($selected)) {
				$selected = $selected->filename;
			}
			else {
				$selected = ORM::factory('media',$selected)->filename;
			}
		}
		
		
		foreach($medias as $item) {
			if (!$type) {
				if (!isset($options[ucwords($item->type_media->name).' - '.ucwords($item->category)]))
					$options[ucwords($item->type_media->name).' - '.ucwords($item->category)] = array();
				$options[ucwords($item->type_media->name).' - '.ucwords($item->category)][$item->filename] = $item->title;
			}
			else {
				if (!isset($options[ucwords($item->category)]))
					$options[ucwords($item->category)] = array();
				$options[ucwords($item->category)][$item->filename] = $item->title;
			}
		}
		
		if (!$multi) {
			return form::dropdown($name, $options, $selected,'class="fullWidth"');
		}
		else {
			if (!is_array($selected))
				$selected = array($selected);
					
			$html = form::multi_select($name,$options,$selected);
			
			if ($type != self::MEDIA_IMAGE)
				return $html;
			$html .= "<hr />
			<label>Chosen Images</label>
			<div id='thumbs'>";
			foreach ($selected as $image) {
				$html .= "<a class='thickbox' href='".url::site()."assets/uploads/".$image."' >";
				$html .= "<img src='".url::site()."index.php/admin/thumbnail/".$image."' class='square_thumb' />";
				$html .= "</a>";
			}
			if (count($selected) == 0)
				$html .= "<p><b>No images have been selected</b></p>";
			
			$html .= "</div>";
			return $html;
		}
	}

}