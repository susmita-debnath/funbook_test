<?php
	include "lib/library.php";

	if (isset($_POST['register'])) {
		$msg = array();
		$valid = true;
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$retype = $_POST['retype'];


		if( ! is_valid_email( $email ) ) {
			$valid = false;
			$msg[] = 'Email is invalid!';
		}

		if (strlen($password) < 6) {
			$valid = false;
			$msg[] = 'Enter minimum 6 characters in password!';
		}

		if ($password != $retype) {
			$valid = false;
			$msg[] = 'Your password didn\'t match';
		}

		if ($valid == true) {
			register_user($email, $username, $password);
		}		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Funbook.com</title>
	<link rel="stylesheet" type="text/css" href="css/design.css">
</head>
<body>
	<div id="wrapper">
		<h1>Welcome to Funbook.com Hello</h1><br>
		<div id="register" width="50%">
			<h2>Register</h2><br>

				<?php if ( ! $valid ) { ?>
					<div class="error">
						<ul>
							<?php foreach ($msg as $value) { ?> 
								<li><?php echo $value; ?></li>  
							<?php } ?>
						</ul>
					</div>
				<?php } ?>

				<form method="post">
					<b>Email</b><br><input type="text" name="email"><br>
					<b>Username</b><br><input type="text" name="username"><br>
					<b>Password</b><br><input type="password" name="password"><br>
					<b>Retype Password</b><br><input type="password" name="retype"><br><br>
					<input type="submit" name="register" value="Register">
				</form>
		</div>
		<div id="login" width="50%">
			<h2>Log in</h2><br>
				<form method="post">
					<b>Username</b><br><input type="text" name="username"><br>
					<b>Password</b><br><input type="password" name="password"><br><br>
					<input type="submit" name="login" value="Log in">
				</form>
		</div>
	</div>	
</body>
</html>