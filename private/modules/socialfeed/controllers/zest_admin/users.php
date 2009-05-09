<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Users controller. 
 *
 * @package    Zest
 * @author     Marmalade on Toast
 * @copyright  (c) 2007-2009 Marmalade on Toast
 * @license    http://kohanaphp.com/license.html
 */
class Users_Controller extends Zest_admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{		
		$this->__set_heading("Users");
		$view = new View('zest/tabs');
		
		
		
		$tab2 = $this->__user_form();
		
		$tab1 = $this->__user_rows();
		
		$tab3 = $this->__roles_view();
		
		
		$tab1 = "<p>You CANNOT view yourself here, please edit yourself via 'profile'.</p><hr/>".$tab1;
		$view->tabs = array(
			"Users" => $tab1,
			"Add User" => $tab2,
			"Roles" => $tab3,
		);
		$this->__set_content($view);
	}
	
	public function edit($id) {
				
		$user = ORM::factory('user',$id);
		$this->__set_heading("Edit User - ".$user->username);

		$roles = $user->roles;
		
		$type = "";
		$i = 0;
		foreach ($roles as $role) {
			if ($i > 0)
				$type .= ", ";
			$type .= $role->name;
			$i++;
		}

		
		$form_fields = array
    			(
        			'username'      	=> $user->username,
        			'email'    			=> $user->email,
      				'role'				=> $type,
      				'password'			=> '',
      				'type'				=> 'edit',
      				'id'				=> $id,
    			);	

    	$view = new View('zest/content');
		$content = $this->__user_form($form_fields);
		$content .= "<p><a href='".url::site()."admin/users/delete/".$user->id."' onclick='return confirm(\"Are you sure?\")'>Delete User</a></p>";
		
		$view->content = $content;
		$this->__set_content($view);
	}
	
		
	public function __call($method, $arguments)
	{
		$this->index();
	}
	
	private function __user_form($form_fields = null)
	{
	
		$username = "";
		$email = "";
		
		if (!$form_fields) {
		$form_fields = array
    			(
        			'username'      	=> '',
        			'email'    			=> '',
        			'password' 			=> '',
        			'role'	 			=> '',
        			'type'				=> 'new',

    			);
		}
		
		if (isset($form_fields['id']))
			$id = $form_fields['id'];
		
    	//  copy the form as errors, so the errors will be stored with keys corresponding to the form field names
		
		$form_type = $form_fields['type'];
		
		if ($_POST) {
			$errors = $form_fields;

			$post = new Validation($_POST);
 
         //  Add some filters
       		$post->pre_filter('trim', TRUE);
       		
       		$post->add_rules('username','required');
        	$post->add_rules('email', 'required');
        	
        	if ($form_fields['type'] == 'new')
        		$post->add_rules('password', 'required');
       		
       		$user = ORM::factory('user');
			
			
			if ($post->validate()) {
			
				$array = array();
				$array['email'] = $post->email;
				$array['username'] = $post->username;
				$array['password'] = $post->password;
			
			
				if ($post->password == "") {
					unset($array['password']);
				}
			
				$role = $post->role;
			
				if ($form_fields['type'] == 'edit')
				{
					// Create new user
					$user = ORM::factory('user',$form_fields['id']);
				}
				else {
					$user = ORM::factory('user');
				}
				
				if ( (!$user->username_exists($array['username']) ||
					strtolower($form_fields['username']) == strtolower($array['username']))
				)
				{
					foreach ($array as $key => $val)
					{
						// Set user data
						$user->$key = $val;
					}
					if ($form_fields['type'] == 'new')
					{
					
						if ($user->add(ORM::factory('role', $role)) && $user->save())
						{
							$this->template->success_message = "New user, ".$post->username.", has been created.";
							log::activity($this->user->username." has created a new user ".$post->username, $this->user->username." (".$this->user->email.") has created a new user.");
						}
					}
					
					if ($form_fields['type'] == 'edit')
					{
						$arr = $user->roles;
						foreach ($arr as $role)
							$user->remove(ORM::factory('role',$role));
						
						if ($user->add(ORM::factory('role', $post->role)) AND $user->save() )
						{
							$this->template->success_message = "User ".$post->username." has been updated.";
							url::redirect('admin/users');
						}
					}
				}
				else {
					$form_fields = arr::overwrite($form_fields, $post->as_array());
				    $errors = arr::overwrite($errors, $post->errors('form_error_messages'));
					
					if ($user->username_exists($array['username']) || $form_fields['username'] == $array['username'])
						$this->template->error_message = "That username has been taken! Please try again!";
					
				}

			}
			else {
				
				$form_fields = arr::overwrite($form_fields, $post->as_array());
			    $errors = arr::overwrite($errors, $post->errors('form_error_messages'));

				$this->template->error_message = "There has been an error! Please try again!";

			}
			
		
		}	
		if ($form_type == "new")
			$form = form::open("admin/users/#tab2", array('class'=>'valid_form'));
		if ($form_type == "edit")
			$form = form::open("admin/users/edit/".$id, array('class'=>'valid_form'));
		
		
		$form .= "<label for='username'>Username</label>";
		$form .= (empty ($errors['username'])) ? '' : "<p class='error'>Please make sure you enter a unique username</p>";
		$form .= form::input('username', ($form_fields['username']), 'class="required fullWidth"');
		
		$form .= "<label for='email'>Email</label>";
		$form .= (empty ($errors['email'])) ? '' : "<p class='error'>Please enter a valid email address</p>";

		$form .= form::input('email', ($form_fields['email']), 'class="required email fullWidth"');

		$form .= "<label for='password'>Password</label>";
		$form .= (empty ($errors['password'])) ? '' : "<p class='error'>Please enter a password</p>";

		$form .= form::password('password',($form_fields['password']), 'class="fullWidth required"');
	
		$form .= "<label for='role'>User Type</label>";
					
		$this->session = Session::instance();
		$user = $this->session->get('user');
		$superuser = FALSE;
		$roles = $user->roles;
		
		$arr = array();
		
		foreach ($roles as $role) {
			if ($role->id == 1)
				$superuser = TRUE;
		}
		$roles = ORM::factory('role')->find_all();
		foreach ($roles as $role) {
			if ($role->id == 1 && !$superuser) {
			}
			else {
				$arr[$role->name] = $role->name;
			}
		}
		
				
		$form .= form::dropdown('role',$arr,$form_fields['role'], "class='fullWidth'");
	
		$form .= form::submit('submit', 'Save', "class='submit'");
	
		$form .= form::close();
	
		return $form;
	}
		
	public function roles($method,$id) {
		$role = ORM::factory('role',$id);
		switch ($method) {
			case 'delete' :
				$role->delete();
				url::redirect('admin/users#tab_Roles_3');
				break;
			case 'edit' :
				$this->__set_heading("Edit Role - ".$role->name);
				$view = new View('zest/content');
				$content = form::open('admin/users/roles/save/'.$role->id);
				$content .= form::label('name','Name').form::input('name',$role->name,'class="fullWidth"');
				$content .= "<hr/>";
				$content .= form::label('description','Description').form::textarea('description',$role->description,'class="fullWidth no-editor"');
				$content .= form::submit('submit', 'Save', "class='submit'");
				$content .= form::close();
				$view->content = $content;
				$this->__set_content($view);
				break;
			case 'save' :
				unset($_POST['submit']);
				foreach ($_POST as $key => $val) {
					$role->$key = $val;
				}
				$role->save();
				url::redirect('admin/users#tab_Roles_3');
				break;
			
		}
	
	}
	
	private function __roles_view()
	{
		
		$html = "<ul>";		
		
		$roles = ORM::factory('role')->where('id >=',$this->user->roles[0]->id)->find_all();
		
		foreach ($roles as $role) {
			if ($role->id != $this->user->roles[0]->id) {
				$html .= "<li style='padding-left:45px !important;list-style:none' class='role'><div class='right'>".html::anchor('admin/users/roles/edit/'.$role->id,html::image('zest/images/icon_pencil.png'))."&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/delete/role/'.$role->id,html::image('zest/images/delete.png'),array('class'=>'ajax-button','rel'=>'delete'))."</div><span><span style='display:block;float:left;width:150px'>".$role->title."</span><small>".$role->description."</small></span></li>";
			}
			else {
				$html .= "<li style='padding-left:45px !important;list-style:none' class='role'><div class='right'>&nbsp;".html::anchor('admin/users/roles/edit/'.$role->id,html::image('zest/images/icon_pencil.png'))."</div><span><span style='display:block;float:left;width:150px'>".$role->title."&nbsp;&nbsp;&nbsp;<small>(This is you)</small></span><small>".$role->description."</small></span></li>";
			}
		}
		$html .= "</ul>";
		return $html;
		
	}
	
	private function __user_rows()
	{
		$html = "<ul style='list-style:none'>";
		
		$users = ORM::factory('user')->find_all();
		
		foreach ($users as $user) {
			
			$roles = $user->roles;
			
			$superuser = FALSE;
			
			$type = "";
			$i = 0;
			foreach ($roles as $role) {
				$type .= $role->name;
				if ($i > 0)
					$type .= ", ";
				$i++;
				
				if ($role->id == 1)
					$superuser = TRUE;
			}			
			
			if ($this->user->id == $user->id)
			{
			}
			else if($superuser && !$this->superuser)
			{	
			}
			else
			{
				
				$x = "";
				
				if ($user->roles[0]->id < 3) {
					$x = "&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/users/sudo/'.$user->id,'sudo');
				}		
			
				$html .= "<li style='padding-left:15px !important;' class='user'><div class='right'><span style='width:250px;display:block;float:left;'>".$user->logins." logins&nbsp;&nbsp;&nbsp;&nbsp;<b>last login:</b> ".zest::relative_time(date('Y-m-d H:i:s',$user->last_login))."</span>".$type."$x&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/users/edit/'.$user->id,html::image('zest/images/icon_pencil.png'))."&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/delete/user/'.$user->id,html::image('zest/images/delete.png'),array('class'=>'ajax-button','rel'=>'delete'))."</div>".$user->avatar(32)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>".$user->title."</span></li>";

			
					
			}
		}
		$html .= "</ul>";
		return $html;
	}
	
	public function sudo($id) {
		$user = ORM::factory('user',$id);
		$user->login();
		url::redirect('admin');
	}
	
} // End User Controllers 