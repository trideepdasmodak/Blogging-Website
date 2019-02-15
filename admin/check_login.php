<?php
include_once('../db/db_setup.php');

if(empty($_POST['email']) or empty($_POST['password'])){
	$_SESSION['error'] = "Fill both Email and Password";
	//echo$_SESSION['error'];
	header('Location:index.php');
}else{
	$user_pass = md5($_POST['password']);

	$query = "SELECT * FROM user_info WHERE email = '".$_POST['email']."'";
	$sql = mysqli_query($db_conn,$query);

	if($sql){
		$value = mysqli_fetch_assoc($sql);
		$email = $value['email'];
		$password = $value['password'];
		$username = $value['username'];
		if($_POST['email']==$email){
			if($user_pass==$password){
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $email;
				header('Location:dashboard.php');
			}else{
				$_SESSION['error'] = "Wrong Password";
			}
		}else{
			$_SESSION['error'] = "No such user exist";
		}
	}
}
if(!empty($_SESSION['error'])){
	header('Location:index.php');
}
?>