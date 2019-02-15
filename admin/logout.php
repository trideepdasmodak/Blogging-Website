<?php
ob_start();
session_start();

if(!empty($_SESSION['username'])){
	session_destroy();
	header('Location:../index.php');
}else{
	header('Location:../index.php');
}
?>