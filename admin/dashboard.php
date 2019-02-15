<?php include_once('../db/db_setup.php'); 
	$data = array();
	$data_a = array();
	$data_u = array();
	$query = "SELECT * FROM blog order by id desc";
	$query_a = "SELECT * FROM user_info WHERE `email` = '".$_SESSION['email']."'";
	$query_u = "SELECT * FROM blog WHERE `author` = '".$_SESSION['username']."'";
	$sql = mysqli_query($db_conn,$query);
	$sql_a = mysqli_query($db_conn,$query_a);
	$sql_u = mysqli_query($db_conn,$query_u);
	if($sql){
		while($value = mysqli_fetch_assoc($sql)){
			$data[] = $value;
		}
	}else{
		echo "Unable to fetch database data";
	}
	if($sql_a){
		while($value_a = mysqli_fetch_assoc($sql_a)){
			$data_a = $value_a;
		}
	}else{
		echo "Unable to fetch database data";
	}
	if($sql_u){
		while($value_u = mysqli_fetch_assoc($sql_u)){
			$data_u[] = $value_u;
		}
	}else{
		echo "Unable to fetch database data";
	}
//echo"<pre>"; print_r($_SESSION); echo"</pre>";
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once('../site_head.php'); ?>
  </head>
  <body>
    <div class="container">
    	<?php 
			if(!empty($_SESSION['username'])){
				echo"<h2>Welcome, ".$_SESSION['username']."</h2> ";
			}else{
				header('Location:index.php');
			}
    	?>
      <h1>Blog Dashboard</h1> <hr> 
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
	     <?php	echo"</td>";
	     	echo"<td> <br>";
	     		echo "<a href='../index.php'><button type='button' class='btn btn-success'> Home </button></a>"; echo" ";
	     		echo "<a href='new_post.php'><button type='button' class='btn btn-success'> Create A New Post </button></a>";	
			echo"</td>";
	     	echo"<td> <br>";	   
	     		echo "<div class='btn-group' role='group'>";
	     		echo "<button id='btnGroupDrop1' type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Profile </button>";
	     		echo "<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>";
	     		echo "<a class='dropdown-item' href='edit_profile.php?id=".$data_a['id']."&oprn=e_name'> Change Name </a>";
	     		echo "<a class='dropdown-item' href='edit_profile.php?id=".$data_a['id']."&oprn=e_gander'> Change Gander </a>"; 
	     		echo "<a class='dropdown-item' href='edit_profile.php?id=".$data_a['id']."&oprn=e_password'> Change Password </a>"; 
	     		echo "<a class='dropdown-item' href='logout.php?id=".$data_a['id']."'> Logout </a>"; 
	     		echo"</div>";
	     		echo"</div>";   		
	     	echo"</td>";
      	echo"</tr>";
      		echo"<center>";
			      if(!empty($_SESSION['error']['unknown'])){
			      		echo "<font color='red'><b>".$_SESSION['error']['unknown']."</b></font> <br> <br>";
			      		unset($_SESSION['error']['unknown']);
			      }elseif(!empty($_SESSION['success'])){
			      		echo "<font color='green'><b>".$_SESSION['success']."</b></font> <br> <br>";
			      		unset($_SESSION['success']);
			      }elseif(!empty($_SESSION['fail'])){
			     		echo "<font color='red'><b>".$_SESSION['fail']."</b></font> <br> <br>";
			      		unset($_SESSION['fail']);
			      }
			echo"</center>";
      	?>
      </table> 
      
      <table class="table table-striped">
      	<tr>
      		<th><center> Index </center></th>
      		<th><center> Title </center></th>
      		<th><center> Visibility </center></th>
      		<th><center> Option </center></th>
      	</tr>
      	<?php
      	if($data_a['admin_status'] == '1'){
	       for($i=0;$i<count($data);$i++){ 
	      	$index = $i+1;
	      	echo"<tr>";
	      		echo"<td><center>".$index."</center></td>";
	      		echo"<td><center>".$data[$i]['title']."</center></td>";
	      		echo"<td><center>"; 
	      			if($data[$i]['status'] == 1){
	      				echo"<a href='opr_post.php?id=".$data[$i]['id']."&opr=private'><div class='btn btn-primary active'> Private </div></a>";
	      			}else{
	      				echo"<a href='opr_post.php?id=".$data[$i]['id']."&opr=public'><div class='btn btn-primary disabled'> Public </div></a>";
	      			}
	      		echo"</center></td>";
	      		echo"<td><center>"; 
	      			echo"<a href='../post.php?id=".$data[$i]['id']."'><div class='btn btn-outline-secondary'> View </div></a>";
	      			echo" ";
	      			echo"<a href='edit_post.php?id=".$data[$i]['id']."'><div class='btn btn-outline-info'> Edit </div></a>";
	      			echo" ";
	      			echo"<a href='opr_post.php?id=".$data[$i]['id']."&opr=delete'><div class='btn btn-outline-danger'> Delete </div></a>";
	      		echo"</center></td>";
		    echo"</tr>";
	      }
	 	}else{
	  		for($i=0;$i<count($data_u);$i++){ 
	      	$index = $i+1;
	      	echo"<tr>";
	      		echo"<td><center>".$index."</center></td>";
	      		echo"<td><center>".$data_u[$i]['title']."</center></td>";
	      		echo"<td><center>"; 
	      			if($data_u[$i]['status'] == 1){
	      				echo"<a href='opr_post.php?id=".$data_u[$i]['id']."&opr=private'><div class='btn btn-primary active'> Private </div></a>";
	      			}else{
	      				echo"<a href='opr_post.php?id=".$data_u[$i]['id']."&opr=public'><div class='btn btn-primary disabled'> Public </div></a>";
	      			}
	      		echo"</center></td>";
	      		echo"<td><center>"; 
	      			echo"<a href='../post.php?id=".$data_u[$i]['id']."'><div class='btn btn-outline-secondary'> View </div></a>";
	      			echo" ";
	      			echo"<a href='edit_post.php?id=".$data_u[$i]['id']."'><div class='btn btn-outline-info'> Edit </div></a>";
	      			echo" ";
	      			echo"<a href='opr_post.php?id=".$data_u[$i]['id']."&opr=delete'><div class='btn btn-outline-danger'> Delete </div></a>";
	      		echo"</center></td>";
		    echo"</tr>";
	      }
	  }
	  ?>
      </table>
    </div>
   <?php  include_once('../site_script.php'); ?>
  </body>
</html>