<!DOCTYPE html>
<html>
<head>
<form>
<input type="button" value="Login" onclick="window.location.href='http://localhost/todoapp2.0/login.php'" />
</form>
	<title></title>
</head>
<body>

</body>
</html>
<?php
	require_once(__DIR__ . "/../model/config.php");
	// this gives us access to our data base
	$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
	// we put input post because our method is from post
	$password = filter_input (INPUT_POST, "password", FILTER_SANITIZE_STRING);

	$query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username'");

	// we are selecting our salt and our password from our users table where our username is the username that was sent in via the post
	if($query->num_rows == 1) {
		//num rows checks wether or not the rows are equal to 1	
		$row = $query->fetch_array();
		// we have to fetch the array stored in the quary var

		if($row["password"] === crypt ($password, $row["salt"])) {
      		$_SESSION["authenticated"] = true;
      		echo "<p>Login Successful </p>";
      		header("Location: http://localhost/todoapp2.0/index.php");
die();
		}
		else {
			echo "<p>Invalid username and password</p>";
		}
	}
	else {
		echo "<p> Invalid username and password</p>";
	}
