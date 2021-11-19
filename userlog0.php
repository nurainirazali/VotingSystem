<?php
include("dbcon.php");
	if(!isset($_SESSION)) { 
		session_start(); 
	}
	
	$icnum="";
	$password="";
	$errors= array();

	if(isset($_POST['login'])) {
		$icnum = ($_POST['icnum']);
		$password = ($_POST['password']);

		if(empty($icnum)) {
			array_push($errors, "Ic number is required");
		}
		if(empty($password)) {
			array_push($errors, "Password is required");
		}

		if(count($errors) ==0) {
			$password = md5($password);
			$query = "SELECT * FROM user WHERE ic='$icnum' AND password='$password'";
			$result=mysqli_query($dbcon, $query);
			if(mysqli_num_rows($result)==1){
				$_SESSION['icnum']=$icnum;
				$_SESSION['success']="You are now logged in";
				header('location: dashboard.php');
			}else{
				array_push($errors, "Wrong username / password combination");
			}
		}
	}
?>