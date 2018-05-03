<?php
	include "lib/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Funbook.com</title>
</head>
<body>
	<form action="update.php" method="post" enctype="multipart/form-data">
		<b>Name</b><br><input type="text" name="name" value="<?php echo $row['name'] ?>"><br>
		<b>Email</b><br><input type="text" name="email" value="<?php echo $row['email'] ?>"><br>
		<b>Username</b><br><input type="text" name="username" value="<? echo $row['username'] ?>">
	</form>
</body>
</html>