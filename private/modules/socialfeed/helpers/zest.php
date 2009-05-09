<?php defined('SYSPATH') or die('No direct script access.');
 
class zest_Core {

	public static function check_login() {
		return login::check_login();	
	}
	
	public static function update_status($str) {	
		$bitly = new Url_Shortner(array("login" => ORM::factory('setting','bitly_login')->value,"key" => ORM::factory('setting','bitly_api')->value));
		$str = $bitly->string_shorten($str);
		
		$twitter = Twitter::instance(ORM::factory('setting','twitter_username')->value,ORM::factory('setting','twitter_password')->value);					
		$twitter->update_status($str);
	} 
	
	public static function parse_user_agent($string, $key)
 	{
		// Return the raw string
		if ($key === 'agent')
			return $string;

		// Parse the user agent and extract basic information
		$agents = Kohana::config('user_agents');

		foreach ($agents as $type => $data)
		{
			foreach ($data as $agent => $name)
			{
				if (stripos($string, $agent) !== FALSE)
				{
					if ($type === 'browser' AND preg_match('|'.preg_quote($agent).'[^0-9.]*+([0-9.][0-9.a-z]*)|i', $string, $match))
					{
						// Set the browser version
						$info['version'] = $match[1];
					}

					// Set the agent name
					$info[$type] = $name;
					break;
				}
			}
		}

		if (empty($info[$key]))
		{
			switch ($key)
			{
				case 'is_robot':
				case 'is_browser':
				case 'is_mobile':
					// A boolean result
					$return = ! empty($info[substr($key, 3)]);
				break;
				
				break;
			}

			// Cache the return value
			isset($return) and $info[$key] = $return;
		}

		// Return the key, if set
		return isset($info[$key]) ? $info[$key] : NULL;
	
	}
	
	public static function render_image($media, $options = array()) {
		if (isset($options['width']) && isset($options['height'])) {
			if (isset($options['thickbox']))
				return '<a href="'.url::base().'assets/images/'.$media->filename.'" class="thickbox" title="'.$media->name.'"><img src="'.image_helper::render_crop($media->filename,$options['width'],$options['height']).'" alt="'.$media->name.'" /></a>';
			else
				return '<img src="'.image_helper::render_crop($media->filename,$options['width'],$options['height']).'" alt="'.$media->name.'" />';
			
			
		}
		
		else
			return '<img src="/assets/images/'.$media->filename.'" alt="'.$media->name.'" />';
	}
	
	public static function add_this($url,$title) {
		$url = 'http://'.$_SERVER['HTTP_HOST'].$url;
		return '<div><script type="text/javascript">var addthis_pub="sydlawrence";</script>
<a href="http://www.addthis.com/bookmark.php?v=20" onmouseover="return addthis_open(this, \'\', \''.$url.'\', \''.$title.'\')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><img src="http://s7.addthis.com/static/btn/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/200/addthis_widget.js"></script></div>';
	}
		
	public static function get_page_tree($parent = 0, $level = 0, $active = true) {	
		$array = array();
   		// retrieve all children of $parent
   		
   		if ($active)
	   		$pages = ORM::factory('page')->where(array('parent_id' => $parent,'status_id'=>2))->orderby(array('navbar_id'=>'asc','order'=>'asc'))->find_all();
   		else
	   		$pages = ORM::factory('page')->where('parent_id', $parent)->orderby(array('navbar_id'=>'asc','order'=>'asc'))->find_all();
	   	
   		foreach ($pages as $page) {
       		$array[] = array($page,self::get_page_tree($page->id, $level+1, $active));
   		}
   		return $array;
	}
	
	public static function dir_to_array($directory) {
		$handler = opendir($directory);

	    // keep going until all files in directory have been read
	    $array = array();
	    while ($file = readdir($handler)) {
	        // if $file isn't this directory or its parent, 
	        // add it to the results array
	        if ($file != '.' && $file != '..') {
	        	$array[] = $file;
	        }
	    }
	    closedir($handler);
	    sort($array);
	    return $array;
	}
	
	public static function get_version($with_name = FALSE) {
		$html = "";
		$file_handle = fopen(DOCROOT.'/version.txt', "r");
		while (!feof($file_handle)) {
   			$html .= fgets($file_handle);
		}
		fclose($file_handle);
		if ($with_name)
			return $html;
		else
			return str_replace('Zest CMS','',$html);
	}
	
	public static function template_to_html($filename) {
		if (file_exists(APPPATH.'/views/'.$filename)) {
			$html = '';
			$file_handle = fopen(APPPATH.'/views/'.$filename, "r");
			while (!feof($file_handle)) {
   				$html .= fgets($file_handle);
			}
			fclose($file_handle);
			return $html;
		}
		else if (file_exists(APPPATH.'/views/'.$filename.'.zest')) {
			$html = '';
			$file_handle = fopen(APPPATH.'/views/'.$filename.'.zest', "r");
			while (!feof($file_handle)) {
   				$html .= fgets($file_handle);
			}
			fclose($file_handle);
			return $html;
		}
		else if (file_exists(APPPATH.'/views/'.$filename.'.php')) {
			$html = '';
			$file_handle = fopen(APPPATH.'/views/'.$filename.'.php', "r");
			while (!feof($file_handle)) {
   				$html .= fgets($file_handle);
			}
			fclose($file_handle);
			return $html;
		}
		else if (file_exists(DOCROOT.$filename)) {
			$html = '';
			$file_handle = fopen(DOCROOT.$filename,"r");
			while (!feof($file_handle)) {
   				$html .= fgets($file_handle);
			}
			fclose($file_handle);
			return $html;
		}
		else {
			return $filename." does not exist!";
		}
	}
	
	public static function save_to_file($filename, $content) {
		
		$filename = APPPATH.'views/'.$filename;
		if (file_exists($filename)) {
			$fh = fopen($filename, 'w') or die("can't open file");			
			fwrite($fh, $content);
			fclose($fh);
			return true;
		}
		return false;
	}
	
	public static function get_xml_entries($url) {

		$options = array(
			CURLOPT_RETURNTRANSFER  => TRUE,
			CURLOPT_URL             => $url
		);
		$curl = new Curl($options);
	 	$data = simplexml_load_string($curl->execute());
	 	
	 	$arr = array();
	 	foreach ($data->channel->item as $item) {
	 		$arr[] = $item;
	 	}
	 	
		return $arr;
	}
	
	public static function get_secure_xml_entries($url) {
			
	}
	
	
	public static function ping() {
		$url = "http://".$_SERVER['HTTP_HOST'].'/admin/ping/technorati';
		$options = array(
			CURLOPT_RETURNTRANSFER  => TRUE,
			CURLOPT_URL             => $url
		);
		$curl = new Curl($options);
		$curl->execute();
	}
	
	public static function email($email)
	{
		return (bool) preg_match('/^[-_a-z0-9\'+*$^&%=~!?{}]++(?:\.[-_a-z0-9\'+*$^&%=~!?{}]+)*+@(?:(?![-.])[-a-z0-9.]+(?<![-.])\.[a-z]{2,6}|\d{1,3}(?:\.\d{1,3}){3})(?::\d++)?$/iD', (string) $email);
	}
	
	public static function add_stat($type,$id) {
		if (Kohana::user_agent('is_browser'))
			ORM::factory('statistic')->add_view($type,$id);
		
	}
	
	public static function button($href,$title,$options) {
		$options = arr::merge($options, array('class'=>'button'));	
		return html::anchor($href, $title, $options);
	}
	
	public static function relative_time($date) {
	$diff = time() - strtotime($date);
	if ($diff>0) {
		if ($diff<60)
			return $diff . " " . inflector::plural("second",$diff) . " ago";
		$diff = round($diff/60);
		if ($diff<60)
			return $diff . " " . inflector::plural("minute",$diff) . " ago";
		$diff = round($diff/60);
		if ($diff<24)
			return $diff . " " . inflector::plural("hour",$diff) . " ago";
		$diff = round($diff/24);
		if ($diff<7)
			return $diff . " " . inflector::plural("day",$diff) . " ago";
		$diff = round($diff/7);
		if ($diff<4)
			return $diff . " " . inflector::plural("week",$diff) . " ago";
		return  date("d/m/Y", strtotime($date));
	} else {
		if ($diff>-60)
			return "in " . -$diff . " " . inflector::plural("second",$diff);
		$diff = round($diff/60);
		if ($diff>-60)
			return "in " . -$diff . " " . inflector::plural("minute",$diff);
		$diff = round($diff/60);
		if ($diff>-24)
			return "in " . -$diff . " " . inflector::plural("hour",$diff);
		$diff = round($diff/24);
		if ($diff>-7)
			return "in " . -$diff . " " . inflector::plural("day",$diff);
		$diff = round($diff/7);
		if ($diff>-4)
			return "in " . -$diff . " " . inflector::plural("week",$diff);
		return  date("d/m/Y", strtotime($date));
	}
}

}