<?php
include_once('../db/db_setup.php');
//print_r($_POST);
if(!empty($_POST['id'])){
	$location = 'edit_post.php?id='.$_POST['id'];
		if($_POST['title']==""){
			$_SESSION['error']['title'] = "Write Your Post Title";
		}elseif(check_spcl($_POST['title'])==0){
			$_SESSION['error']['title'] = "Sorry! Limited Characters Allows in Title";
		}else{
			$title = mysqli_real_escape_string($db_conn,$_POST['title']);
		}

		if($_POST['short_desc']==""){
			$_SESSION['error']['short_desc'] = "Write Your Post Short Description";
		}else{
			$short_desc = mysqli_real_escape_string($db_conn,$_POST['short_desc']);
		}

		if($_POST['description']==""){
			$_SESSION['error']['description'] = "Write Your Post Full Description";
		}else{
			$description = mysqli_real_escape_string($db_conn,$_POST['description']);
		}

		if($_POST['tags']==""){
			$_SESSION['error']['tags'] = "Write Your Post Tags";
		}elseif(check_spcl($_POST['tags'])==0){
			$_SESSION['error']['tags'] = "Sorry! Limited Characters Allows in Tags";
		}else{
			$tags = mysqli_real_escape_string($db_conn,$_POST['tags']);
		}

		if($_POST['category']==""){
			$_SESSION['error']['category'] = "Write Your Post Category";
		}elseif(check_spcl($_POST['category'])==0){
			$_SESSION['error']['category'] = "Sorry! Limited Characters Allows in Category";
		}else{
			$category = mysqli_real_escape_string($db_conn,$_POST['category']);
		}

		if(empty($_SESSION['error'])){
			$query = "UPDATE `blog` SET `title`='".$title."',`short_desc`='".$short_desc."',`description`='".$description."',`tags`='".$tags."',`category`='".$category."' WHERE `id`='".$_POST['id']."'";

			$sql = mysqli_query($db_conn,$query);
			if($sql){
				$_SESSION['success'] = "Post Successfully Updated";
				header("location:dashboard.php");
			}else{
					$_SESSION['fail'] = "Post Update Failed". $query . "<br>" . mysqli_error($db_conn);
					header("location:dashboard.php");
			}
		}else{
			header("location:$location");
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