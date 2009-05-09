<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Administrator controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Administrator_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() 
	{
		$this->__set_heading("Admin");
		$view = new View('zest/tabs');	
			
		$tabs = array(
			"Main"	=> $this->__main(),
			"Social Media" => $this->__social_media(),
		);
		
		$view->tabs = $tabs;
		$this->__set_content($view);
	}

	public function __social_media() {
		$view = new View('zest/tabs');	
			
		$tabs = array(
			html::image('http://www.twitter.com/favicon.ico','twitter').' twitter'	=> $this->__twitter(),
			html::image('http://www.technorati.com/favicon.ico','technorati').' technorati'	=> $this->__technorati(),
			html::image('http://bit.ly/favicon.ico','bit.ly').' bit.ly'	=> $this->__bitly(),
		);
		
		$view->tabs = $tabs;
		return $view;
	}
	
	public function __bitly() {
		$html = "";
		$html .= '<p><a href="http://bit.ly/" target="_BLANK">What is bit.ly?</a></p>';
		$bitly_api = ORM::factory('setting','bitly_api');
		$bitly_login = ORM::factory('setting','bitly_login');
		if (isset($_POST['bitly'])) {
			$bitly_login->variable = 'bitly_login';
			$bitly_login->value = $_POST['bitly_login'];
			$bitly_login->save();
			
			$bitly_api->variable = 'bitly_api';
			$bitly_api->value = $_POST['bitly_api'];
			$bitly_api->save();
		}
		$html .= form::open(NULL);
		$html .= form::hidden('bitly','true');
		
		$html .= form::label('bitly_login','Login');
		$html .= form::input('bitly_login',$bitly_login->value,'class="fullWidth"');
		
		$html .= form::label('bitly_api','API key');
		$html .= form::input('bitly_api',$bitly_api->value,'class="fullWidth"');
		
		$html .= form::submit('submit', 'Save', 'class="submit"').'';
		$html .= form::close();
		return $html;
	}
	
	public function __technorati() {
		$html = "";
		$html .= '<p><a href="http://technorati.com/" target="_BLANK">What is technorati?</a></p>';
		
		if (isset($_POST['technorati'])) {
			$technorati_ping = ORM::factory('setting','technorati_ping');
			$technorati_ping->variable = 'technorati_ping';
			$technorati_ping->value = $_POST['technorati_ping'];
			$technorati_ping->save();
		}
		if (isset($_POST['technorati_ping_now'])) {
			zest::ping();
		}
		$html .= form::open(NULL);
		$html .= form::hidden('technorati','true');
		$html .= form::label('technorati_ping','Ping Technorati on feed update?');
		$options = array('yes' => 'yes','no' => 'no');
	
		$html .= form::dropdown('technorati_ping',$options,ORM::factory('setting','technorati_ping')->value,'class="fullWidth"');
		
		$html .= form::submit('submit', 'Save', 'class="submit"').'';
		$html .= form::close();
		
		$html .= form::open(NULL);
		$html .= form::hidden('technorati_ping_now','true');		
		$html .= form::submit('submit', 'Ping Now', 'class="button"');
		$html .= form::close();
		
		
		return $html;
	}	
	
	public function __twitter() {
		$twitter_username = ORM::factory('setting','twitter_username');
		$twitter_password = ORM::factory('setting','twitter_password');	
		if (isset($_POST['twitter'])) {
			$twitter_username->value = $_POST['twitter_username'];
			$twitter_username->save();

			$twitter_password->value = $_POST['twitter_password'];
			$twitter_password->save();
		}	
			
		if (isset($_POST['tweet']) && $_POST['tweet'] != '') {
			$twitter = Twitter::instance(ORM::factory('setting','twitter_username')->value,ORM::factory('setting','twitter_password')->value);					
			$twitter->update_status($_POST['tweet']);
			$this->__throw_success('Just tweeted!');
		}			
		$html = form::open(NULL);
		$html .= '<p><a href="http://twitter.com/" target="_BLANK">What is twitter?</a></p>';
		$html .= form::hidden('twitter','true');
		$html .= form::label('twitter_username','Username');
		$html .= form::input('twitter_username',ORM::factory('setting','twitter_username')->value,'class="fullWidth"');

		$html .= form::label('twitter_password','Password');
		$html .= form::password('twitter_password',ORM::factory('setting','twitter_password')->value,'class="fullWidth"');		
		$html .= form::submit('submit', 'Save', 'class="submit"').'<p>&nbsp;</p><p>&nbsp;</p>';
		$html .= form::close();
		
		$twitter = Twitter::instance(ORM::factory('setting','twitter_username')->value,ORM::factory('setting','twitter_password')->value);
		
		if (IS_ONLINE && $twitter->account_valid()) {
		
		$html .= form::open(NULL);
		$html .= form::label('tweet','Post a tweet');
		$html .= form::textarea(array('name' => 'tweet', 'class' => 'fullWidth  no-editor', 'style' => 'height:50px;'));
		
		$html .= form::submit('submit', 'Tweet', 'class="submit"').'<p>&nbsp;</p><p>&nbsp;</p>';
		
		$html .= form::close();
		
		
		$html .= '<h2>Recent Tweets</h2>';
		
		$recent_tweets = json_decode($twitter->user_timeline(null, 5));
		
		foreach ($recent_tweets as $tweet) {
			$html .= '<p>'.date('d-m-y',strtotime($tweet->created_at)).' '.text::auto_link($tweet->text).'</p>';
		}
		
		$html .= '<h2>Recent Replies</h2>';
		
		$recent_tweets = json_decode($twitter->replies());
		
		$count = 0;
		foreach ($recent_tweets as $tweet) {
			if ($count == 5)
				break;
			$html .= '<p>'.date('d-m-y',strtotime($tweet->created_at)).' '.text::auto_link($tweet->text).'</p>';
			$count++;
		}

		}
		
		return $html;
	}

	public function __main()
	{
				
		$ANALYTICS_CODE = ORM::factory('setting','ANALYTICS_CODE');
		$EXTRA_HEAD = ORM::factory('setting','EXTRA_HEAD');
			

		$view = new View('zest/content');
				
		if (isset($_POST['main'])) {
			$ANALYTICS_CODE->value = strip_tags($_POST['ANALYTICS_CODE']);
			$ANALYTICS_CODE->save();
			$EXTRA_HEAD->value = strip_tags($_POST['EXTRA_HEAD']);
			$EXTRA_HEAD->save();			
		}	
		
		$view->content = $this->__form();
		return $view;
	}
	
	public function __form() {
		$ANALYTICS_CODE = ORM::factory('setting','ANALYTICS_CODE');
		$EXTRA_HEAD = ORM::factory('setting','EXTRA_HEAD');

		$html = form::open(NULL);
		$html .= form::hidden('main','true');
			

		$html .= form::label('ANALYTICS_CODE','Analytics Code');
		$html .= "<p>For advanced users only</p>";
		
		$html .= form::textarea(array('name' => 'ANALYTICS_CODE', 'value' => $ANALYTICS_CODE->value, 'class' => 'fullWidth  no-editor'));
		
		$html .= form::label('EXTRA_HEAD','Header Extras');
		$html .= "<p>For advanced users only (Often used for Google Webmaster Tools</p>";
		
		$html .= form::input(array('name' => 'EXTRA_HEAD', 'value' => $EXTRA_HEAD->value, 'class' => 'fullWidth'));
		
		
		
		$html .= form::submit('submit', 'Save', 'class="submit"').'<p>&nbsp;</p><p>&nbsp;</p>';
		
		
		$html .= form::close();
		
		
		return $html;
	}
		
	public function __call($method, $arguments)
	{
		$this->index();
	}

} // End Administrator Controller
