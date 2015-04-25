     <?php
          require_once(__DIR__ . "/../model/config.php");

          // usually when we create a connection,, we run querries on it.
          //all of these parameters are found within data base.php
	        // my sqli is the connection to the data base
	        // the whole purpose of filter_input is to filter the input, to make sure there is no malicious things occuring with the input.
          $title =  filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
          $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
          $date = new DateTime('today');
          $time= new DateTime('America/Los_Angeles');
          $query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title' , post = '$post'");
         
          if($query){
             echo "<p> Succesfully inserted post: $title </p>";
             echo "Posted on " . $date->format("m/d/y") . " at " . $time->format("g:i");
             // we are trying to indicate that the title has been inserted
          }
          else{
             echo "<p>" . $_SESSION["connection"]->error . "</p>";
          }

          // we have now created a query
          // an sql usually starts of with an action
          // basically we have to create a query that is ready to insert information
          // post is filtering the post section
          echo "<p>Title: $title</p>";
          echo "<p>Post: $post</p>"; 

	       // input post means that we are sending info.
	       // we are telling that line where too link and filter the posts
	       // this alone is not 100% secure
	       // we have created a controller that is going to recieve our input and store it.
	       // we are now echoing them out
	       // we do not need this anymore ->>> $connection->close();
	       // right now we are closing the connection
	       // we are just creating a new connection