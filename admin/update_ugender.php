<?php
include_once('../db/db_setup.php');
//print_r($_POST);
if(!empty($_POST['id'])){
	if($_POST['oprn']=="e_gander"){
		$location = 'edit_profile.php?id='.$_POST['id']."&oprn=e_gander";
		if($_POST['gender']==""){
			$_SESSION['error']['gender'] = "Select Your Gender";
		}else{
			$gender = mysqli_real_escape_string($db_conn,$_POST['gender']);
		}
		if(empty($_SESSION['error'])){
			$query = "UPDATE `user_info` SET `gender`='".$gender."' WHERE `id`='".$_POST['id']."'";

			$sql = mysqli_query($db_conn,$query);
			if($sql){
				$_SESSION['success'] = "Gender Successfully Updated";
				header("location:dashboard.php");
			}else{
					$_SESSION['fail'] = "Gender Update Failed". $query . "<br>" . mysqli_error($db_conn);
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
?>