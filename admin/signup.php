<?php include_once('../db/db_setup.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once('../site_head.php'); ?>
  </head>
  <body>
    <div class="container">
      <h1>User Signup Here</h1> <hr>
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
			      	if(!empty($_SESSION['error']['username'])){
			      				echo "<font color='red'> <b>".$_SESSION['error']['username']."</b> </font> <br> <br>";
			      	}
			      	if(!empty($_SESSION['error']['gender'])){
			      				echo "<font color='red'> <b>".$_SESSION['error']['gender']."</b> </font> <br> <br>";
			      	}
			      	if(!empty($_SESSION['error']['email'])){
			      				echo "<font color='red'> <b>".$_SESSION['error']['email']."</b> </font> <br> <br>";
			      	}
			      	if(!empty($_SESSION['error']['exist_email'])){
			      				echo "<font color='red'> <b>".$_SESSION['error']['exist_email']."</b> </font> <br> <br>";
			      	}
			      	if(!empty($_SESSION['error']['re_email'])){
			      				echo "<font color='red'> <b>".$_SESSION['error']['re_email']."</b> </font> <br> <br>";
			      	}
			      	if(!empty($_SESSION['error']['unmatch_email'])){
			      				echo "<font color='red'> <b>".$_SESSION['error']['unmatch_email']."</b> </font> <br> <br>";
			      	}
			      	if(!empty($_SESSION['error']['password'])){
			      				echo "<font color='red'> <b>".$_SESSION['error']['password']."</b> </font> <br> <br>";
			      	}
			      	if(!empty($_SESSION['error']['re_password'])){
			      				echo "<font color='red'> <b>".$_SESSION['error']['re_password']."</b> </font> <br> <br>";
			      	}
			      	if(!empty($_SESSION['error']['unmatch_password'])){
			      				echo "<font color='red'> <b>".$_SESSION['error']['unmatch_password']."</b> </font> <br> <br>";
			      	}
			      	session_destroy();
				}elseif(!empty($_SESSION['fail'])){
		      		echo "<font color='red'> <b>".$_SESSION['fail']."</b> </font> <br> <br>";
		      		session_destroy();
		      	}
		echo"</center>";
      	?>
      </table> <hr>
      <form method="post" action="check_signup.php">
      	<label> Enter Your Name </label>
		<input type="text" class="form-control input-lg" name="username"> </input> <br> 
		<label> Select Your Gender </label> <br>
		<input type="radio"  name="gender" value="male"> Male </input> 
		<input type="radio"  name="gender" value="female"> Female </input> <br> <br>
		<label> Enter Your Email Id </label> <br>
		<input type="email" class="form-control input-lg" name="email"> <br>
		<label> Re Enter Your Email Id </label> <br>
		<input type="email" class="form-control input-lg" name="re_email"> <br>
		<label> Enter A Password </label> <br>
		<input type="password" class="form-control input-lg" name="password"> <br>
		<label> Re Enter Your Password </label> <br>
		<input type="password" class="form-control input-lg" name="re_password"> <br>
		<input type="submit" class="btn btn-primary" value="Signup"> <br> <br>
		</form>     
		<h3> Already Have An Account ? <a href="index.php"> Click Here </a> </h3> <br>
    </div>   
   <?php  include_once('../site_script.php'); ?>
  </body>
</html>