<?php
include_once('../db/db_setup.php');
	$data = array();
	$query = "SELECT * FROM user_info WHERE `id` = '".$_POST['id']."' order by id desc limit 1";
	$sql = mysqli_query($db_conn,$query);
	
	if($sql){
		while($value = mysqli_fetch_assoc($sql)){
			$data = $value;
		}
  }else{
  		header('location:dashboard.php');
  }
  print_r($_POST);
  print_r($data);
 $old_pass = md5($_POST['old_password']);
if(!empty($_POST['id'])){
	if($_POST['oprn']=="e_password"){
		$location = 'edit_profile.php?id='.$_POST['id']."&oprn=e_password";
		if($_POST['old_password']==""){
			$_SESSION['error']['password'] = "Write Your Old Password";
		}elseif($_POST['new_password']==""){
			$_SESSION['error']['password'] = "Write Your New Password";
		}elseif($old_pass==$data['password']){
			$passw = mysqli_real_escape_string($db_conn,$_POST['new_password']);
			$password = md5($passw);
		}else{
			$_SESSION['error']['password'] = "Wrong Old Password";
		}

		if(empty($_SESSION['error'])){
			$query_n = "UPDATE `user_info` SET `password`='".$password."' WHERE `id`='".$_POST['id']."'";

			$sql_n = mysqli_query($db_conn,$query_n);
			if($sql_n){
				$_SESSION['success'] = "Password Successfully Updated";
				header("location:dashboard.php");
			}else{
					$_SESSION['fail'] = "Password Update Failed". $query . "<br>" . mysqli_error($db_conn);
					header("location:dashboard.php");
			}
		}else{
			header("location:$location");
		}
	}else{
		$_SESSION['error']['unknown'] = " Unknown Operation Selected ";
		header('location:dashboard.php');
	}	
}else{
  header('location:dashboard.php');
}

//$new_pass = md5($_POST['new_password']);
//if(!empty($_POST)){
	//$location = 'edit_profile.php?id='.$_POST['id'];
		
		//$password = md5($pass);
		
//}else{
//	header('location:dashboard.php');
//} 
?>