<?php
include_once('../db/db_setup.php');

$data_a = array();
$query_a = "SELECT * FROM user_info order by id desc";
$sql_a = mysqli_query($db_conn,$query_a);
if($sql_a){
		while($value_a = mysqli_fetch_assoc($sql_a)){
			$data_a[] = $value_a;
		}
	}else{
		echo "Unable to fetch database data";
	}



if($_POST['username']==""){
	$_SESSION['error']['username'] = "Please! Enter Your Username";
}elseif(check_spcl($_POST['username'])==0){
	$_SESSION['error']['username'] = "Sorry! Limited Characters Allows in Username";
}else{
	$username = mysqli_real_escape_string($db_conn,$_POST['username']);
}
if($_POST['gender']==""){
	$_SESSION['error']['gender'] = "Please! Select Your Gender";
}else{
	$gender = mysqli_real_escape_string($db_conn,$_POST['gender']);
}
if($_POST['email']==""){
	$_SESSION['error']['email'] = "Please! Enter Your Email Id";
}
if($_POST['re_email']==""){
	$_SESSION['error']['re_email'] = "Please! Re Enter Your Email Id";
}

if($_POST['email']==$_POST['re_email']){
	for($i=0;$i<count($data_a);$i++){
		if($_POST['email']==$data_a[$i]['email']){
			$_SESSION['error']['exist_email'] = "This Email Id is Already Used";
		}else{
			$email = mysqli_real_escape_string($db_conn,$_POST['email']);
		}
	}
}else{
	$_SESSION['error']['unmatch_email'] = "Your Email Id And Re Email Id Not Match";
}
if($_POST['password']==""){
	$_SESSION['error']['password'] = "Please! Write A Password";
}
if($_POST['re_password']==""){
	$_SESSION['error']['re_password'] = "Please! Re Enter Your Password";
}
if($_POST['password']==$_POST['re_password']){
	$pass = mysqli_real_escape_string($db_conn,$_POST['password']);
}else{
	$_SESSION['error']['unmatch_password'] = "Your Password And Re Password Not Match";
}
$password = md5($pass);
$admin_status = 0;
if(empty($_SESSION['error'])){
	$query = "INSERT INTO `user_info`(`username`, `email`, `password`, `gender`, `admin_status`) VALUES ('".$username."','".$email."','".$password."','".$gender."','".$admin_status."')";

	$sql = mysqli_query($db_conn,$query);
	if($sql){
		$_SESSION['success'] = "User Sign Up Successfully";
		header('location:index.php');
	}else{
			$_SESSION['fail'] = "User Sign Up Failed". $query . "<br>" . mysqli_error($db_conn);
			header('location:signup.php');
	}
}else{
	header('location:signup.php');
}

function check_spcl($str){
	//$pattern = '~[^A-Za-z0-9-,\s]~is';
	if(preg_match_all('~[^A-Za-z0-9-,\s]~is',$str,$match)){
		return 0;
	}else{
		return 1;
	}
} 
?>