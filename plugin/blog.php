<?php
if(!empty($_SESSION['email'])){
$data_a = array();
$query_a = "SELECT * FROM user_info WHERE `email` = '".$_SESSION['email']."'";
$sql_a = mysqli_query($db_conn,$query_a);
if($sql_a){
		while($value_a = mysqli_fetch_assoc($sql_a)){
			$data_a = $value_a;
		}
	}else{
		echo "Unable to fetch database data";
	}
}
?>
<table class="table table-condensed">
	 <?php 
        echo"<tr>";
         echo"<td><br>"; ?>
         		<button type="button" class="btn btn-brand btn-facebook">
              	 <i class="fa fa-facebook"></i> Facebook </button>
	      		<button type="button" class="btn btn-brand btn-twitter">
              	 <i class="fa fa-twitter"></i> Twitter </button>
                <button type="button" class="btn btn-brand btn-googleplus">
              	 <i class="fa fa-google-plus"></i> Google+ </button>
              	<button type="button" class="btn btn-brand btn-linkedin">
              	 <i class="fa fa-linkedin"></i> Linkedin </button>        
    	<?php echo"</td>";
	        if(!empty($_SESSION['username'])){
				 echo"<td><br>";
		         echo "<a href='admin/dashboard.php'><button type='button' class='btn btn-success'> Dashboard </button></a>";
		         echo"</td>";
			}else{
				 echo"<td><br>";
		         echo "<a href='admin/index.php'><button type='button' class='btn btn-success'> Login </button></a>";
		         echo"</td>";
			}
			if(!empty($_SESSION['username'])){
		         echo"<td><br>";       
		         	echo "<div class='btn-group' role='group'>";
		     		echo "<button id='btnGroupDrop1' type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Profile </button>";
		     		echo "<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>";
		     		echo "<a class='dropdown-item' href='admin/edit_profile.php?id=".$data_a['id']."&oprn=e_name'> Change Name </a>";
		     		echo "<a class='dropdown-item' href='admin/edit_profile.php?id=".$data_a['id']."&oprn=e_gander'> Change Gander </a>"; 
		     		echo "<a class='dropdown-item' href='admin/edit_profile.php?id=".$data_a['id']."&oprn=e_password'> Change Password </a>"; 
		     		echo "<a class='dropdown-item' href='admin/logout.php?id=".$data_a['id']."'> Logout </a>"; 
			     		echo"</div>";
			     	 echo"</div>";    
		         echo"</td>";
		    }else{
		    	 echo"<td><br>";  
		    	 	echo "<a href='admin/signup.php'><button type='button' class='btn btn-success'> Signup </button></a>";
		    	 echo"</td>";
		    }
         echo"</tr>";
        ?>
      </table> <hr> 
<?php
	$data = array();
	$query = "SELECT * FROM blog order by id desc";
	$sql = mysqli_query($db_conn,$query);
	
	if($sql){
		while($value = mysqli_fetch_assoc($sql)){
			$data[] = $value;
		}
	}else{
		echo "Unable to fetch database data";
	}
	echo "<h2> Latest Blogs <h2>";
	//echo "<pre>";
	//print_r($data); 
	//echo "</pre>";
?>
<div class="container">
	<?php for($i=0;$i<count($data);$i++){ ?>
		<?php if($data[$i]['status'] == '1'){ ?>
		<div class="row">
			<div class="col-md-3">
				<img src="<?php echo $data[$i]['image']; ?>" class="img img-thumbnail img-square"> <br>
			</div>
			<div class="col-md-8">
				<h3> <a href="post.php?id=<?php echo $data[$i]['id']; ?>"> <?php echo $data[$i]['title']; ?> </a> </h3>
				<p> <font size="4px"> <?php echo $data[$i]['short_desc']; ?> </font></p>
				<p> <font size="4px"> <address>  <?php echo $data[$i]['author']; ?> </address> </font> </p>
			</div> 
		</div> <hr>
		<?php } ?>
	<?php } ?>
</div>
