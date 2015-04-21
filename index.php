<!DOCTYPE html>
<html>
<head>
	<title>Jordan's To-Do List</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="wrap">
		<div class="task-list">
			<ul>
			  <?php require("includes/connect.php"); ?>
			</ul>
		</div>
	</div>
	<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-tasks" placeholder="Add new item..."/>
</body>
</html>