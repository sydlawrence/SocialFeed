<div class="content">
	<div class="padding">
		<form method="post" action="">
			<label for='username'>Username</label>
			<input type="text" name="username" class="fullWidth" />
			<label for='full_name'>Full Name</label>
			<input type="text" name="full_name" class="fullWidth" />
			<label for='email'>Email</label>
			<input type="text" name="email" class="fullWidth" />
			<label for='password'>Password</label>
			<input type="password" name="password[]" class="fullWidth" />
			<h2>Password Again</h2>
			<input type="password" name="password[]" class="fullWidth" />
			<label for='user_type'>User Type</label>
			<select name="user_type" class="fullWidth">
				<option>Admin</option>
				<option>Something else</option>
				<option>Bum boy</option>
			</select>
			<input type="submit" class="submit" value="Save" />
		</form>
	</div>
</div>