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

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		log_in( $username, $password );
	}

	if (is_user_logged_in()) {
		header( "Location:profile.php" );
	}
?>

<?php if (isset($_REQUEST['msg'])) { ?>
	<h4><?php echo $_REQUEST['msg'] ?></h4>
<?php } ?>

<!DOCTYPE html>
<html>
<head>
	<title>Funbook.com</title>
	<link rel="stylesheet" type="text/css" href="css/design.css?ver=<?php echo time() ?>">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
</head>
<body>
	<div id="wrapper">
		<div id="blue_box">
			<div id="funbook">
				<div id="writing">
					funbook
				</div>
				<div id="box">
					<form method="post">
						<div id="email">
							<label for="email">Email</label>
							<input type="text" name="email"><br>
						</div>
						<div id="space">
							
						</div>
						<div id="password">
							<label for="password">Password</label>
							<input type="password" name="password"><br>
						</div>
						<div id="button">
							<input type="submit" id="login_btn" name="login" value="Log In">							
						</div>
						<div class="clr"></div>
					</form>
				</div>
				<div class="clr"></div>
			</div>
		</div>

		<div id="full">
			<div id="information">
				<div id="none">
					<h2>Funbook helps you connect and share with the people in your life.</h2>
				</div>
				<div id="register">
					<h2>Create a new account</h2><br>
					<h4>It's free and always will be.</h4><br>

					<?php if ( isset( $valid ) && ! $valid ) { ?>
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
						<input type="submit" name="register" value="Sign Up">
					</form>
				</div>
				<div class="clr"></div>
			</div>
		</div>
		

		<div id="admit">
			<div id="register" width="50%">
			<h2>Register</h2><br>

				<?php if ( isset( $valid ) && ! $valid ) { ?>
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





































		<div id="register" width="50%">
			<h2>Register</h2><br>

				<?php if ( isset( $valid ) && ! $valid ) { ?>
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