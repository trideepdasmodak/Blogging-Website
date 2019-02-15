<?php
include_once('../db/db_setup.php');
//print_r($_POST);
if(!empty($_POST['id'])){
	if($_POST['oprn']=="e_name"){
		$location = 'edit_profile.php?id='.$_POST['id']."&oprn=e_name";
		if($_POST['username']==""){
			$_SESSION['error']['username'] = "Write Your Name";
		}elseif(check_spcl($_POST['username'])==0){
			$_SESSION['error']['username'] = "Sorry! Limited Characters Allows in Name";
		}else{
			$username = mysqli_real_escape_string($db_conn,$_POST['username']);
		}
		if(empty($_SESSION['error'])){
			$query = "UPDATE `user_info` SET `username`='".$username."' WHERE `id`='".$_POST['id']."'";

			$sql = mysqli_query($db_conn,$query);
			if($sql){
				$_SESSION['success'] = "Name Successfully Updated. It Will Display On Your Next Login";
				header("location:dashboard.php");
			}else{
					$_SESSION['fail'] = "Name Update Failed". $query . "<br>" . mysqli_error($db_conn);
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
function check_spcl($str){
	//$pattern = '~[^A-Za-z0-9-,\s]~is';
	if(preg_match_all('~[^A-Za-z0-9-,\s]~is',$str,$match)){
		return 0;
	}else{
		return 1;
	}
} 
?>