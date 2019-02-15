<?php include_once('../db/db_setup.php'); 

if(!empty($_GET['id'])){
	$data = array();
	$query = "SELECT * FROM user_info WHERE `id` = '".$_GET['id']."' order by id desc limit 1";
	$sql = mysqli_query($db_conn,$query);
	
	if($sql){
		while($value = mysqli_fetch_assoc($sql)){
			$data = $value;
		}
   }else{
  		header('location:dashboard.php');
  }
  }else{
    header('location:dashboard.php');
  }
//print_r($_GET); 
if(!empty($_GET['oprn'])){
  $oprn = $_GET['oprn'];
}else{
  $oprn = $_POST['oprn'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once('../site_head.php'); ?>
  </head>
  <body>
    <div class="container">
      <h1> Edit Your Profile </h1> <hr> 
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
           <?php  echo"</td>";
            echo"<td> <br>";
              echo "<a href='dashboard.php'><button type='button' class='btn btn-success'> Dashboard </button></a>";
            echo"</td>";
            echo"<td><br>";  
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
              	if(!empty($_SESSION['error']['password'])){
              				echo "<font color='red'> <b>".$_SESSION['error']['password']."</b> </font> <br> <br>";
              	}
              	unset($_SESSION['error']);
              }
          echo"</center>";
        //print_r($_GET['opr']);
        ?>
      </table> <hr> 
      <?php
      if($oprn=="e_name"){ ?>
      <form method="post" action="update_uname.php" enctype="multipart/form-data">
	      <label> Edit Your Name </label> <br>    
	      <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <input type="hidden" name="oprn" value="<?php echo "e_name" ?>">
	      <input type="text" class="form-control  input-lg" name="username" value="<?php echo $data['username'] ?>"> <br>
        <input type="submit" class="btn btn-primary" value="Change Name"> <br> <hr>
      </form>
    <?php }elseif($oprn=="e_gander"){ ?>
      <form method="post" action="update_ugender.php" enctype="multipart/form-data">
        <label> Edit Your Gender </label> <br>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <input type="hidden" name="oprn" value="<?php echo "e_gander" ?>">
        <input type="radio"  name="gender" value="male"> Male </input> 
        <input type="radio"  name="gender" value="female"> Female </input> <br> <br>
        <input type="submit" class="btn btn-primary" value="Change Gender"> <br> <hr>
      </form>
    <?php }elseif($oprn=="e_password"){ ?>
      <form method="post" action="update_upassword.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <input type="hidden" name="oprn" value="<?php echo "e_password" ?>">
	      <label> Enter Your Old Password </label> <br>
	      <input type="password" class="form-control input-lg" name="old_password"> <br>
        <label> Enter Your New Password </label> <br>
        <input type="password" class="form-control input-lg" name="new_password"> <br>
	      <input type="submit" class="btn btn-primary" value="Change Password"> <br> <br>
      </form>  
     <?php }?>  
    </div>
   <?php  include_once('../site_script.php'); ?>
  </body>
</html>