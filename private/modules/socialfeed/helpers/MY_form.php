<?php defined('SYSPATH') or die('No direct script access.');
 
class form extends form_Core {
 
 	public static $posted = false;
 
	public static function post($post) {
		static $posted = false;
			
		$arr = $post;
		if (isset($post['form_id']))
			unset($post['form_id']);
		
		
		if (isset($post['validate']))
			unset($post['validate']);
		
		$validation_array = unserialize(stripslashes($arr['validate']));
					
		$form = ORM::factory('form',$arr['form_id']);
				
		$validated = $form->validate($arr,$validation_array);
		if ($validated === true) {}
			
		else {
			$errors = "";
			foreach ($validated as $key => $value) {
					$errors .= "<p style='color:red'>$value</p>";					
			}
			return array('errors' => $errors);
		}
			
		$to = $form->to_email;
		
		
		$domain = str_replace('www.','',$_SERVER['HTTP_HOST']);
		$from = "noreply@".$domain;
		
		$subject = "Someone has filled out the ".$form->title." form online";
		$message = "<p>Their entries into the form were as follows:</p><table>";
		foreach ($post as $title => $value) {
			$message .= "<tr><td><b>".str_replace('_',' ',$title)."</b>: </td><td>".$value."</td></tr>";
		}
		$message .= "</table>";

		$submission = ORM::factory('form_submission');
		$submission->form_id = $form->id;
		$submission->post = serialize($post);
		$submission->save();	
		if (!$posted) {
			if (email::send($to, $from, $subject, $message, TRUE)) {
				$to = 'updates@marmaladeontoast.co.uk';
				email::send($to, $from, $subject, $message, TRUE);
			
				$return = $form->success_message;
			}
			else {
				$return = "There has been an error sending the email";
			}
		}
		else 
			return $posted;
		
		$posted = $return;
		return $return;
	}
	
	
	public static function textarea($options = array(),$value = '',$right = null) {
			$html = "";
			if (!is_array($options))
				$options = array('name'=>$options);
			if (isset($options['display'])) {
				$html = self::label($options['name'], $options['display']);
				unset($options['display']);
			}
			if (isset($options['class']))
				$options['class'] = $options['class'].' full-width';
		return $html.parent::textarea($options, $value, $right);
	}
	
	
	public static function input($name = null,$value = '', $right = 'class="fullWidth"') {
		if (is_array($name) && isset($name[0])) {
			$html = self::label($name[0], $name[1]);
			return $html.parent::input($name[0],$value,$right).'<hr/>';
		}
		
		return parent::input($name,$value,$right);
	}
 
 	public static function multi_select($name,$selection,$selected, $extra = "") {
 				
		$html = "";
		
		$html .= "<select multiple='multiple' class='fullWidth multiple' name='".$name."[]' id='".$name."' $extra>";

		foreach($selection as $key => $value) {
			$x = "";
			if (in_array($key,$selected))
				$x = "selected";
			if (is_array($value)) {
				$html .= "<optgroup label='".$key."' $x>";
					foreach ($value as $k => $v) {
						$x = "";
						if (in_array($k,$selected))
							$x = "selected";
						$html .= "<option value='".$k."' ".$x.">".$v."</option>";
					}
				$html .= "</optgroup>";
			
			}
			else
				$html .= "<option value='".$key."' ".$x.">".$value."</option>";
		}
		
		$html .= "</select>";	
			
			
		return $html;
 	}
}
?>