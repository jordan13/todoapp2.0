<!DOCTYPE html>
<html>
<head>
<input type="button" value="TO DO LIST" onclick="window.location.href='http://localhost/todoapp2.0/index.php'" />
  <title></title>
</head>
<body>

</body>
</html>
<?php 
	require_once(__DIR__ . "/../model/config.php");
  
	// in createpost we sanitize by string, but here we sanitize for the email to sanitize the email
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    $salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";

    $hashedPassword = crypt($password, $salt);


    $query = $_SESSION["connection"]->query("INSERT INTO users SET "
    	 . "username = '$username',"
    	 . "password = '$hashedPassword',"
    	 . "salt = '$salt'");

  if($query){
     echo "Succesfully created user: $username";
  }
  else {
  	echo"<p>" . $_SESSION["connection"]->error . "</p>";
  }
    // we are telling the crypt function to use the password and salt together
    // we are telling it to use huge random numbers to create unique id's
    // uniqid creates unique ids for us and makes it random 
    // the minimum we should use is 5000 rounds
    // we are going to split this up because php reads the $'s as variables'
   