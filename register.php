<?php
	require_once 'core/init.php';

	if (Input::exists()) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username'	=> array(
				'fieldName'	=> 'Username',
				'required' 	=> true,
				'min'		=> 2,
				'max'		=> 20,
				'unique'	=> 'users'
			),
			'password'	=> array(
				'fieldName'	=> 'Password',
				'required' 	=> true,
				'min'		=> 6
			),
			'password_again' => array(
				'fieldName'	=> 'Password Repeat',
				'required' 	=> true,
				'min'		=> 6,
				'matches'	=> 'password'
			),
			'name'	=> array(
				'fieldName'	=> 'Your Name',
				'required' 	=> true,
				'min'		=> 2,
				'max'		=> 50
			)
		));

		if ($validation->passed()) {
			echo "passed";
		} else {
			foreach ($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
?>

<form action="" method="post">
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"/>
	</div>
	<div class="field">
		<label for="password">Password</label>
		<input type="password" name="password" id="password"/>
	</div>
	<div class="field">
		<label for="password_again">Enter your password again</label>
		<input type="password" name="password_again" id="password_again"/>
	</div>
	<div class="field">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>"/>
	</div>
	<input type="submit" value="Register"/>
</form>