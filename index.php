<!DOCTYPE html>
<html>
<head>
	<title>Jordan's To-Do List</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/javascript" href="js/bootstrap.min.js">
   <meta name="viewport" content="width=device-width">
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<style>
div#load_screen{
	background: #000;
	opacity: 1;
	position: fixed;
    z-index:10;
	top: 0px;
	width: 100%;
	height: 1600px;
}
div#load_screen > div#loading{
	color:#FFF;
	width:120px;
	height:24px;
	margin: 300px auto;
}
</style>
<script>
window.addEventListener("load", function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
});
</script>
</head>
<body>
<div id="load_screen"><div id="loading">LOADING</div></div>
<!-- Your normal document content lives here -->

	
	<button class="hello"> <a class="btn btn-primary" href="login.php">Login</a> </button>
	<div class="text-right small-4 medium-2 columns"> 
	<button class="hello"> <a class="btn btn-primary" href="controller/logout-user.php">Logout</a> </button>
	<button class="hello"> <a class="btn btn-primary" href="register.php">Register</a> </button>

	<div class="wrap">
		<div class="task-list">
			<ul>
			  <?php require("includes/connect.php");
			  $mysqli = new mysqli('localhost', 'root', 'root', 'todo');
			  $query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
			  if ($result = $mysqli->query($query)) {
			  	$numrows = $result->num_rows;
			  	if ($numrows>0) {
			  		while($row = $result->fetch_assoc()){
			  			$task_id = $row['id'];
			  			$task_name = $row['task'];
			  			
			  			echo '<li>
			  			<span>'.$task_name.'</span>
			  			<img id="'.$task_id.'" class="delete-button" width="10px" src="images/close.svg"/> 
			  			</li>';
			  	  }
			  	}
			  }
			  ?> 

			
			</ul>
	</div>
	<form class="add-new-task" autocomplete="off">
		<p> <input type="text" name="new-task" placeholder="Add new item..."/> </p>
</form>
</div>
</body>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task();  // calling the add task function

	function add_task(){
		$('.add-new-task').submit(function() {
			var new_task = $('.add-new-task input[name=new-task').val();

			if (new_task != '') {
				$.post('includes/add-task.php', {task: new_task}, function(data){
					$('add-new-task input[name=new-task]').val();
						$(data).appendTo('.task-list ul').hide().fadeIn();
			 });
		  }
		  return false;
	   });
    }

    $('.delete-button').click(function(){
    	var current_element = $(this);
    	var task_id = $(this).attr('id');

    	$.post('includes/delete-task.php', {id: task_id}, function(){
    	current_element.parent().fadeOut("fast", function(){	
    		$(this).remove();
    	});
    });
 });  

</script>
	
</html>                                                                               
