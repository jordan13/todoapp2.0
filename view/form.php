 <?php 
     require_once(__DIR__ . "/../model/config.php");
     require_once(__DIR__ . "/../controller/login-verify.php");

     if(!authenticateUser()) {
      header("Location: " . $path . "index.php");
      // this only lets logged in users to post
      die();
     }
      // we now have have acces to the path variable
      echo date('l \t\h\e jS');

  ?>

 <center>
 <h1> The Bloganator </h1>
 <img src="images/form.png" class="term" align: ; width: "10px" height: "9px">
 <link rel="stylesheet" type="text/css" href="css/reset.css">
 <form method="post" action="<?php echo $path . "controller/create-post.php"; ?>">
 <!-- method is telling to send or recieve info -->
     <div>
       <label for="title"> <h1> Title: </h1></label>
       <input type="text" name="title" />
     </div>

     <div>
     <label for="post"> <h1> Post:  </h1> </label>
     <textarea name="post"></textarea>
     </div>

     <div>
     <button type="submit"> Submit </button>
     </div>
 </form>
 </center>
 <!-- we are creating a form -->
 <!--  we need sections for people to post things -->
 <!--  we are trying to align the names -->
 <!-- text area allows us to type more, almost no limit -->
 <!-- text area lets us expand the post box -->
 