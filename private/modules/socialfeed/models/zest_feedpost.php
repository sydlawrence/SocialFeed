<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Feedpost_Model extends ORM {

	// Relationships
	protected $has_one = array('media','status','feed','user');
	protected $has_and_belongs_to = array('user','feed');
	protected $has_and_belongs_to_many = array('tags');
	protected $has_many = array('comments');
	
	/**
	 * Returns the absolute path for the url of this feedpost
	 *
	 * @return	string	$url	The actual url
	 */
	public function get_url() {
		return $this->feed->get_url()."/".$this->id."/".urlencode(strtolower($this->title));
	}
	
	public function get_new_comments($user, $only_active = true) {
		if($only_active) {
			return ORM::factory('comment')->where(array('feedpost_id'=>$this->id,'status_id' => 2,'date >' => date('Y-m-d H:i:s',$user->last_login)))->find_all();
		}
		else
			return $this->comments;
	}
	
	public function get_comments($only_active = true) {
		if($only_active) {
			return ORM::factory('comment')->where(array('feedpost_id'=>$this->id,'status_id' => 2))->find_all();
		}
		else
			return $this->comments;
	}
	
	/**
	 * Returns a feedpost from the current url
	 *
	 * $param	bool	$unpublished	Return unpublished posts too?
	 * @return	object|bool	$post		The feedpost generated by the url, or null if no feedpost found
	 */
	public static function get_by_url($unpublished = false) {
		$uri = uri::instance();
		
		$feed = Feed_Model::get_by_url();
		if ($feed && $feed->id > 0) {
			$post_id = $uri->segment(2);
			$post = ORM::factory('feedpost',$post_id);
			
			if (!$unpublished) {
				if ($post->status_id == 2) {
					return $post;
				}
			}
			else
				return $post;
		}		
		return null;
	}
	
	public function unique_key($id)
	{
		if ( ! empty($id) AND is_string($id) AND ! ctype_digit($id))
		{
			return 'title';
		}

		return parent::unique_key($id);
	}

	public function __set($key, $value)
	{
		if ($key === 'status_id')
		{
			if ($value == 2) {
				$this->tweet();
				$this->ping_technorati();
			}
		}

		parent::__set($key, $value);
	}
	
	public function ping_technorati() {
		if (ORM::factory('setting','technorati_ping')->value == 'yes')
		return technorati::ping($this->title, 'http://'.$_SERVER['HTTP_HOST'].$this->get_url() );
	}
	
	/**
	 * Tweet the new feedpost
	 *
	 */
	public function tweet() {
		if ($this->feed->tweet != 1 || $this->tweeted == 1) {
			return;
		}
		$this->save();
		$url = 'http://'.$_SERVER['HTTP_HOST'].$this->get_url();	
		$tweet = text::limit_chars($this->feed->tweet_desc.' '.$this->title,118,'...',TRUE).' '.$url;
		zest::update_status($tweet);
		$this->tweeted = 1;
		$this->save();
	}
	
	/**
	 * Returns a formatted date string
	 *
	 *
	 * @param   string	$s		date format string
	 * @return	string	$date	formatted date string
	 */
	public function get_date($s) {
		return date($s,strtotime($this->date));
	}
	
	/**
	 * Returns the formatted html
	 *
	 * html example
	 * e.g <h2>{TITLE}</h2><h3>{DATE}</h3>{IMAGE}<p>{TEXT}</p><a href="{LINK}" title="{TITLE}">read more</a><div class="spacer">&nbsp;</div>
	 *
	 * @param   array	$options	Options for the rendering array('date_format','image' = array($width,$height), 'word_count', 'html', 'template')
	 * @return	string	$html		Formatted HTML
	 */
	public function render_summary($options = null) {
		
		
		if (!$options){
			$config = Kohana::config_load('zest');
			$options = $config['feedpost.summary'];
		}
		
		
		$array = array(
			"date_format" => 'D jS M Y',
			"image" => array(102,76),
			"image_class" => "",
			"word_limit" => 25,
			"html" => '<h2>{TITLE}</h2><h3>{DATE}</h3>{IMAGE}<p>{TEXT}</p><a href="{LINK}" title="{TITLE}">read more</a><div class="spacer">&nbsp;</div>',
			"template" => 'feedpost_summary',
		);
	
		$options = arr::overwrite($array,$options);
	
		
		return $this->render($options);
	}
	
	/**
	 * Returns the formatted html
	 *
	 * html example
	 * e.g <h1>{TITLE}</h1><h2>{DATE}</h2><h3>by {AUTHOR}</h3>{IMAGE}{TEXT}<div class="spacer">&nbsp;</div>
	 *
	 * @param   array	$options	Options for the rendering array('date_format','image' = array($width,$height), 'word_count', 'html', 'template')
	 * @return	string	$html		Formatted HTML
	 */
	public function get_banner() {
		$banner = new Banner();
		$banner->set_images(array($this->media));
		return $banner->render();
	}
	 
	public function render($options = null) {
		
		
		if (!$options){
			$config = Kohana::config_load('zest');
			$options = $config['feedpost.full'];
		}
		$array = array(
			"date_format" => 'D jS M Y',
			"image" => array(250,250),
			"image_class" => "",
			"html" => '<h1>{TITLE}</h1><h2>{DATE}</h2><h3>by {AUTHOR}</h3>{IMAGE}{TEXT}<div class="spacer">&nbsp;</div>',
			"template" => '',
			"word_limit" => 0,
		);
		$array = arr::overwrite($array,$options);
		if (isset($array['template']) && $array['template'] != "") {
			$html = zest::template_to_html('snippets/'.$array['template']);
		}
		else
			$html = $array['html'];
		$html = str_replace('{TITLE}',$this->title,$html);	
		$html = str_replace('{DATE}',date($array['date_format'], strtotime($this->date)),$html);
		if ($this->media_id > 0) {
			$html = str_replace('{IMAGE}',$this->media->render_cropped($array['image'][0],$array['image'][1],$array['image_class']),$html);
		}
		else {
			$html = str_replace('{IMAGE}','',$html);
		}
		
		if (isset($array['word_limit']) && $array['word_limit'] > 0) {
			$html = str_replace('{TEXT}',text::limit_words(strip_tags($this->text),$array['word_limit']),$html);
		}
		else {
			$html = str_replace('{TEXT}',$this->text,$html);
			$html = str_replace('{ADD_THIS}',zest::add_this($this->get_url(),$this->title),$html);	
		}
		$html = str_replace('{LINK}',$this->get_url(),$html);	
		$html = str_replace('{FEED_LINK}',$this->feed->get_url(),$html);	
		$html = str_replace('{FEED_TITLE}',$this->feed->title,$html);	
		$html = str_replace('{AUTHOR}',$this->user->username,$html);
		
		
		if ($this->feed->has_comments()) {
			$html = str_replace('{COMMENT_FORM}',$this->comment_form(),$html);
			
			$comments = $this->get_comments();
			$comments_html = "<a name='comments'></a>";		
			foreach ($comments as $c) {
				$comments_html .= $c->render();
			}
			if ($comments_html == "")
				$comments_html = "<p>No comments have yet been posted. Be the first!</p>";
	
			$html = str_replace('{COMMENTS}',$comments_html,$html);
			
			$com_count = count($comments);
			switch ($com_count) {
				case 0 :
					$str = '0 comments';
					break;
				case 1 :
					$str = '1 comment';
					break;
				default :
					$str = $com_count.' comments';
					break;
			}
			$html = str_replace('{COMMENT_COUNT}',$str,$html);
		}
		else {
			$html = str_replace('{COMMENT_FORM}','',$html);
			$html = str_replace('{COMMENTS}','',$html);
			$html = str_replace('{COMMENT_COUNT}','',$html);
		}
		
		
		
		
		
		
		
		
			
		return $html;
	}

	public function comment_form() {
		$array = array(
			"title" => "",
			"display_name" => "",
			"email" => "",
		);
		$user = zest::check_login();
		if ($user) {
			$array = array(
				"title" => "",
				"display_name" => $user->username,
				"email" => $user->email,
			);
		
		}
		$comments_form = "";
	
		if (isset($_POST['post_comment'])) {
			$comment = ORM::factory('comment');
			unset($_POST['post_comment']);
			
			$post = $comment->validate($_POST);
			
			if (count($post['errors']) == 0) {
				foreach ($_POST as $key => $value) {
					$comment->$key = $value;
				}
				$comment->feedpost_id = $this->id;
				if (!$user) {
					$comment->status_id = 1;
					$comment->save();
					
					$to = $comment->email;
					$from = 'no-reply@'.str_replace('www.','',$_SERVER['HTTP_HOST']);
					$subject = "Please confirm your email address";
					$message = "Please click on the link below to confirm your email address and make your comment active\n\n".$comment->activate_url();
					email::send($to, $from, $subject, $message, FALSE);
					
					return "<p>You have been sent an email. You must confirm your email before your comment will become active.</p>";
				}
				else {
					$comment->user_id = $user->id;
					$comment->status_id = 2;
					$comment->email = $user->email;
					$comment->save();
					url::redirect($this->get_url().'#comments');
					return "<p>Thank you for your comment.</p>";
					
				}
								
			}
			else {
				$comments_form .= "<p style='color:red'>";
				foreach ($post['errors'] as $key => $value) {
					$comments_form .= $value."<br/>";
				}
				$comments_form .= "</p>";
				$array = arr::overwrite($array,$post);
			}
		}
	
	
		
		$comments_form .= form::open();
		$comments_form .= form::hidden('post_comment','true');
		$comments_form .= '<div class="user_auth">';
		$comments_form .= form::label('display_name','Display Name');
		$comments_form .= form::input('display_name',$array['display_name']).'<br/>';
		$comments_form .= form::label('email','Email');
		$comments_form .= form::input('email',$array['email']).'<br/>';
		$comments_form .= '<fb:login-button onlogin="update_user_box()"></fb:login-button>';
		$comments_form .= '</div>';
		$comments_form .= '
		<script type="text\javascript">
		function update_user_box() {
			var user_box =  document.getElementById("user_auth");
			user_box.innerHTML 
		}
		</script>
		';
		$comments_form .= form::textarea('title',$array['title'],'style="width:100%;"');
		$comments_form .= form::label('','&nbsp;');
		$comments_form .= form::submit('','Submit','class="submit"');
		$comments_form .= form::close();
		return $comments_form;
	}
	
} // End Auth User Model