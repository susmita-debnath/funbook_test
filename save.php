<?php
	include "lib/library.php";

	if (isset($_POST['register'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$retype = $_POST['retype'];

		$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
		$res = mysqli_query($con, $query);

		if ( res->num_rows == 1 ) {
			$_SESSION['username'] = $username;
		}

		header("Location:index.php?msg=User info saved!");
	}
?>