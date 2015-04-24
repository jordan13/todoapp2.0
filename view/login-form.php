<?php 
     require_once(__DIR__ . "/../model/config.php");
     // this allows us to access other files form the directory
 ?>

 <h1>Login</h1>

 <form method="post" action="<?php echo $path . "controller/login-user.php"?>">
 <!-- The method is post because that is how we are sending the info via php, so php can store it in the post variable -->
      <div>
         <label for="username">Username: </label>
         <input type="text" name="username" />
      </div>
      
      <div>
        <label for="password">Password: </label>
        <input type="password" name="password" />
        <!-- the reason why the type is not text is to hide the password while typing the password-->
      </div>

      <div> 
        <button type="submit">Submit</button>
      </div>
 </form>