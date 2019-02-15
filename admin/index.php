<?php
include_once('../db/db_setup.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once('../site_head.php'); ?>
  </head>
  <body>
    <div class="container">
      <h1>User Login Here</h1> <hr> 
      <table class="table table-condensed">
      <?php 
            echo"<tr>";
          echo"<td> <br>";  ?>    
            <button type="button" class="btn btn-brand btn-facebook">
                 <i class="fa fa-facebook"></i> Facebook </button>
            <button type="button" class="btn btn-brand btn-twitter">
                 <i class="fa fa-twitter"></i> Twitter </button>
                <button type="button" class="btn btn-brand btn-googleplus">
                 <i class="fa fa-google-plus"></i> Google+ </button>
                <button type="button" class="btn btn-brand btn-linkedin">
                 <i class="fa fa-linkedin"></i> Linkedin </button>
          <?php   echo"<td><br>";   
                  echo "<a href='../index.php'><button type='button' class='btn btn-success'> Home </button></a>";
                echo"</td>";
                echo"</tr>";
                echo"<center>";
                  if(!empty($_SESSION['error'])){
                    echo"<p><font color='red'>".$_SESSION['error']."</font></p>";
                    session_destroy();
                  }elseif(!empty($_SESSION['success'])){
                    echo "<font color='green'><b>".$_SESSION['success']."</b></font>";
                    session_destroy();
                  } 
          echo"</center>";
        ?>
      </table> <hr>
      <form method="post" action="check_login.php">
		<label> Email-id :</label> <br>
		<input type="email" class="form-control input-lg" name="email"> <br>
		<label> Password :</label> <br>
		<input type="password" class="form-control input-lg" name="password"> <br>
		<input type="submit" class="btn btn-primary" value="Login"> <br>
		</form> <br>
    <h3> Create New Account ? <a href="signup.php"> Click Here </a> </h3>
    </div>
    
   <?php  include_once('../site_script.php'); ?>
  </body>
</html>

<?php
  //echo $password = md5('admin');
?>