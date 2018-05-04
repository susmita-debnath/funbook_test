<?php
	session_start();
	global $con;
	$con = mysqli_connect('localhost', 'root', '', 'funbook');

	function register_user( $email, $username, $password )
	{
		global $con;
		$password = md5($_POST['password']);
		$query = "INSERT INTO users (`email`, `username`, `password`, `status`) VALUES ('$email', '$username', '$password', '0')";
		$users = mysqli_query($con, $query);

		return $users;
	}

	function is_valid_email( $email )
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}

	function log_in( $username, $password )
	{
		global $con;

		$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
		$res = mysqli_query($con, $query);

		if ( $res->num_rows == 1 ) {
			$_SESSION['username'] = $username;
			header( "Location:profile.php?" );
		}
		else { ?>
			<h3>Try Again!</h3>
		<?php  }
	}

	function is_user_logged_in()
	{
		if ( isset($_SESSION['username']) ) {
			return true;
		}
		
		return false;
	}




