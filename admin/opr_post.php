<?php include_once('../db/db_setup.php');
if(!empty($_GET['id'])){
	if($_GET['opr']=="private"){
		$query = "UPDATE `blog` SET  `status`='0' WHERE `id`='".$_GET['id']."' limit 1";
		$sql = mysqli_query($db_conn,$query);
		if($sql){
			$_SESSION['success'] = " Post Visibility Changed ";
			header('location:dashboard.php');
		}else{
			$_SESSION['fail'] = " Post Visibility Changed Operation Failed ". $query . "<br>" . mysqli_error($db_conn);
			header('location:dashboard.php');
		}
	}elseif($_GET['opr']=="public"){
		$query = "UPDATE `blog` SET  `status`='1' WHERE `id`='".$_GET['id']."' limit 1";
		$sql = mysqli_query($db_conn,$query);
		if($sql){
			$_SESSION['success'] = " Post Visibility Changed ";
			header('location:dashboard.php');
		}else{
			$_SESSION['fail'] = " Post Visibility Changed Operation Failed ". $query . "<br>" . mysqli_error($db_conn);
			header('location:dashboard.php');
		}
	}elseif($_GET['opr']=="delete"){
		$query = "DELETE FROM `blog` WHERE `id` = '".$_GET['id']."' limit 1";
		$sql = mysqli_query($db_conn,$query);
		if($sql){
			$_SESSION['success'] = " Post Delete Successfully ";
			header('location:dashboard.php');
		}else{
			$_SESSION['fail'] = " Post Delete Operation Failed ". $query . "<br>" . mysqli_error($db_conn);
			header('location:dashboard.php');
		}
	}else{
		$_SESSION['error']['unknown'] = " Unknown Operation Selected ";
		header('location:dashboard.php');
	}	
}else{
	header('location:dashboard.php');
}
?>