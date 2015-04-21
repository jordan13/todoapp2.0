<?php
// why is this important ? why does localhost have to be first ? 
$mysqli = new mysqli('localhost', 'root', 'root', 'tasks');
// if $mysqli its a connect errno ($mysqli->connect_error) then we want it to DIE and have this message
if (mysqli->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno . ')'
		. $mysqli->connect_error);
}
else {
	echo "Connection Made";
}
$mysqli->close();

?>