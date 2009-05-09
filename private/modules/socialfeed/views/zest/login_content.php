<div id="normal">
<form method="post" action="<?php echo url::site('admin/login')?>">
		
		<label for"username">Username:</label>
		<input type="text" name="username" class="fullWidth" />
		<label for"password">Password:</label>
		<input type="password" name="password" class="fullWidth" />
		<input type="submit" value="Login" class="submit" />	
</form>
	<div style="position:absolute;bottom:10px;right:10px;">
	
	<a onclick="javascript:$('#openid').show();$('#normal').hide();return false;" href="#">Use OpenID <img src="http://www.plaxo.com/images/openid/login-bg.gif" alt="http://openid.net/"/></a><br/>
	<a onclick="javascript:$('#forgot_password').show();$('#normal').hide();return false;" href="#">Forgot password?</a>
	</div>
</div>

<div id="openid" class="hide">
<form method="post" action="<?php echo url::site('admin/login')?>" onsubmit="this.login.disabled=true;">		
		<label for"openid_url">OpenID: <img src="http://www.plaxo.com/images/openid/login-bg.gif" alt="http://openid.net/"/></label>
			<input type="hidden" name="openid_action" value="login" /> 
		<input type="text" name="openid_url" class="fullWidth" />
		<input type="submit" value="Login" name="login" class="submit" />
</form>
	<div style="position:absolute;bottom:10px;right:10px;text-align:right;">
		<a href="http://openid.net/get/" target="_BLANK">Get an OpenID</a><br/>

	<a onclick="javascript:$('#normal').show();$('#openid').hide();return false;" href="#">Use normal login</a>
	</div>
</div>

<div id="forgot_password" class="hide">
<form method="post" action="<?php echo url::site('sessions/reset_password')?>" onsubmit="this.login.disabled=true;">		
		<label for"forgot_password_username">Username:</label>
			<input type="text" name="forgot_password_username" value="" class="fullWidth" /> 
		<input type="submit" value="Request reset" name="login" class="submit" />
</form>
	<div style="position:absolute;bottom:10px;right:10px;text-align:right;">
	<a onclick="javascript:$('#normal').show();$('#forgot_password').hide();return false;" href="#">Attempt login</a>
	</div>
</div>