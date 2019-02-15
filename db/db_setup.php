<?php
ob_start();			
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "testblog";
$db_conn = mysqli_connect($db_host,$db_user,$db_pass);
$db_select = mysqli_select_db($db_conn,$db_name);


if($db_conn){
	if($db_select){
		//echo"Database connected";
	}
}else{
	echo"Database not connected";
}
//include('db_functions.php');
?>