<?php 
//this page is not working...
//include_once('db_setup.php');
//echo $db_name;

if($db_conn){
	if($db_select){
		//echo"Database connected";
	}
}else{
	echo"Database not connected";
}

<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
  </ul>
</div>

/*function test(){
	if($db_link){
	if($db_select){
		echo"Database connected";
	}
}else{
	echo"Database not connected";
}
}

function get_all_data_from_db($table_name){
	$data = array();
	
	$query = "SELECT * FROM '".$table_name."' order by id desc";
	$sql = mysqli_query($db_link,$query);
	
	if($sql){
		while($value = mysqli_fetch_assoc($sql)){
			$data[] = $value;
		}
	}else{
		echo "Unable to fetch database data";
	}
	return $data;
} */

?>

<?php 
     // echo "<a href='new_post.php'><div class='btn btn-outline-success'> Create A New Post </div></a><br><br>";
      if(!empty($_SESSION['error']['unknown'])){
      			echo "<font color='red'> <b>".$_SESSION['error']['unknown']."</b> </font> <br>";
      			session_destroy();
      }elseif(!empty($_SESSION['success'])){
      			echo "<font color='green'> <b>".$_SESSION['success']."</b> </font> <br>";
      			session_destroy();
      }elseif(!empty($_SESSION['fail'])){
      			echo "<font color='red'> <b>".$_SESSION['fail']."</b> </font> <br>";
      			session_destroy();
      }
      ?> 

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

echo "<div class='btn-group' role='group'>";
	     		echo "<button id='btnGroupDrop1' type='button' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Profile </button>";
	     		echo "<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>";
	     		echo "<a class='dropdown-item' href='edit_profile.php?id=".$data_a['id']."'> Edit Profile </a>"; 
	     		echo "<a class='dropdown-item' href='logout.php?id=".$data_a['id']."'> Logout </a>"; 
	     		echo"</div>";
	     		echo"</div>";      