<?php
	global $con;
	$con = mysqli_connect('localhost', 'root', '', 'funbook');

	function register_user($email, $username, $password)
	{
		global $con;
		$password = md5($_POST['password']);
		$query = "INSERT INTO users (`email`, `username`, `password`, `status`) VALUES ('$email', '$username', '$password', '0')";
		$users = mysqli_query($con, $query);

		return $users;
	}

	function is_valid_email($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}