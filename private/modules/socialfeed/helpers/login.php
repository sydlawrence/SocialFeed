<?php defined('SYSPATH') or die('No direct script access.');
 
class login_Core {
	
	public static function check_login() {
		$session = Session::instance();
		return $session->get("user");	
	}
	
	public static function render_form() {
	
		$form = "";
	
		if (isset($_POST['forgotten_email'])) {
			$user = ORM::factory('user',$_POST['forgotten_email']);
			if ($user->id > 0) {
				$user->reset_password();
				$form .= "<span id='login_error' style='color:red'>Your new password has been emailed to you.</span>";
			}
			else {
				$form .= "<span id='login_error' style='color:red'>That email is not registered with us.</span>";
			}
		}
	
		$user = login::attempt_login();
		
		if (is_object($user)) {
			return "hello ".$user->username." <a href='?logout'>logout</a>";
		}
		if (is_string($user)) {
			$form .= "<span id='login_error' style='color:red'>$user</span>";
		}
		
		$form .= '<span id="forgotten_password" class="hide">';
		$form .= '<label for="forgotten_email">Email</label>';
		$form .= '<input type="text" name="forgotten_email" value="email" onfocus="if (this.value=\"email\") this.value=\"\""/>';
		$form .= '<input type="submit" value="login" class="submit" />';
		$form .= form::close();
		
		$form .= '</span>';
		
		$form .= '<span id="login_form" class="hide">';
		$form .= form::open();
		$form .= '<label for="username">Username</label>';
		$form .= '<input type="text" name="username" value="username" onfocus="if (this.value=\"username\") this.value=\"\""/>';
		$form .= '<label for="password">Password</label>';
		$form .= '<input type="password" name="password" value="password" onfocus="if (this.value=\"password\") this.value=\"\""/>';
		$form .= '<input type="submit" value="login" class="submit" />';
		$form .= form::close();
		$form .= '<a href="#" onclick="$(\'#forgotten_password\').show();$(\'#login_form\').hide()">forgotten password?</a>';
		$form .= '</span>';
		
		return $form;
	}

	public static function auto_login($username) {
		$user = ORM::factory('user', $username);
		
		$session = Session::instance();
		$session->set("user",$user);
		// Login successful, redirect
		return $user;
		
	}

	public static function attempt_login() {
	
		if (isset($_POST['username'])) {
			// Load the user
			$user = ORM::factory('user', $_POST['username']);
			
			// If successful login
			if (Auth::instance()->login($user, $_POST['password']))
			{
				$user->login();
				return $user;
			}
			// If unsuccessful login
			else
			{
				return 'Your username or password was incorrect, please try again.';
			}
		
		}

		
		if (isset($_POST['openid_action']) && $_POST['openid_action'] == "login"){ // Get identity from user and redirect browser to OpenID Server 
		    $openid = new SimpleOpenID(); 
		    $openid->SetIdentity($_POST['openid_url']); 
		    $openid->SetTrustRoot('http://' . $_SERVER["HTTP_HOST"]); 
		    $openid->SetRequiredFields(array('email','fullname')); 
		    $openid->SetOptionalFields(array('dob','gender','postcode','country','language','timezone')); 
		    if ($openid->GetOpenIDServer()){ 
		        $openid->SetApprovedURL('http://' . $_SERVER["HTTP_HOST"].url::site().url::current());      // Send Response from OpenID server to this script 
		        $openid->Redirect();     // This will redirect user to OpenID Server 
		    }else{ 
		        $error = $openid->GetError(); 
		        echo "ERROR CODE: " . $error['code'] . "<br>"; 
		        echo "ERROR DESCRIPTION: " . $error['description'] . "<br>";
		    
		    } 
		} 
		else if(isset($_GET['openid_mode']) && $_GET['openid_mode'] == 'id_res'){     // Perform HTTP Request to OpenID server to validate key 
		    
		    
		    $openid = new SimpleOpenID(); 
		    $openid->SetIdentity($_GET['openid_identity']); 
		    
		    
		    $openid_validation_result = $openid->ValidateWithServer(); 
		    if ($openid_validation_result == true){         // OK HERE KEY IS VALID 
		    	$user = ORM::factory('user', $_GET['openid_identity']);
		    	 
		        if ($user->id > 0)
				{
					$session = Session::instance();
					$session->set("user",$user);
					// Login successful, redirect
					return $user;
				}
				// If unsuccessful login
				else
				{
					return 'Your OpenID is not registered with us, please try again.';
				}
		    }else if($openid->IsError() == true){            // ON THE WAY, WE GOT SOME ERROR 
		        $error = $openid->GetError(); 
		        echo "ERROR CODE: " . $error['code'] . "<br>"; 
		        echo "ERROR DESCRIPTION: " . $error['description'] . "<br>"; 
		    }else{                                            // Signature Verification Failed 
		    	return 'Verification failed, please try again.';

		    } 
		}else if (isset($_GET['openid_mode']) && $_GET['openid_mode'] == 'cancel'){ // User Canceled your Request 
				return 'You cancelled the process, please try again.';

		} 
	
	}
}