<?php
include("dbcon.php");
	if(!isset($_SESSION)) { 
		session_start(); 
	}
	
	$name="";
	$icnum="";
	$birth="";
	$address="";
	$area="";
	$poscode="";
	$errors= array();

	if(isset($_POST['register'])) {
		$name = ($_POST['name']);
		$icnum = ($_POST['icnum']);
		$birth = ($_POST['birth']);
		$address = ($_POST['address']);
		$area = ($_POST['area']);
		$poscode = ($_POST['poscode']);
		$password_1 = ($_POST['password_1']);
		$password_2 = ($_POST['password_2']);

		//ensure the form fields are filled properly
		if(empty($name)) { 
			array_push($errors, "Fullname is required");
		}
		if(empty($icnum)) {
			array_push($errors, "Ic number is required");
		}
		if(empty($birth)) {
			array_push($errors, "Birth of date is required");
		}
		if(empty($address)) {
			array_push($errors, "Address is required");
		}
		if(empty($area)) {
			array_push($errors, "Area is required");
		}
		if(empty($poscode)) {
			array_push($errors, "Poscode is required");
		}
		if(empty($password_1)) {
			array_push($errors, "Password is required");
		}
		if($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		//if there no errors save user data
		if (count ($errors) ==0) {
			$password = md5($password_1);
			$sql="INSERT INTO user (name, ic, birth, address, area, poscode, password) VALUES ('$name','$icnum','$birth','$address','$area','$poscode','$password')";
			mysqli_query($dbcon, $sql);
			$_SESSION['icnum']=$icnum;
			$_SESSION['success']="You are now logged in";
			header('location: userlog.php');
		}
	}
mysqli_close($dbcon);
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('47411.png'); background-size: cover; background-attachment: fixed;
    background-repeat: no-repeat;">
	<div class="header">
		<h2>SIGN UP</h2>
	</div>
	<div class="former">
		<form method="post" action="register.php">
			<?php if (count($errors) >0): ?>
				<div class="error">
					<?php foreach ($errors as $error): ?>
						<p><?php echo $error; ?></p>
					<?php endforeach ?>
				</div>
			<?php endif ?>
			<div class="input-group">
				<label>Full Name</label>
				<input type="text" name="name">
			</div>
			<div class="input-group">
				<label>Ic Number</label>
				<input type="text" name="icnum">
			</div>
			<div class="input-group">
				<label>Birth of Date</label>
				<input type="Date" name="birth">
			</div>
			<div class="input-group">
				<label>Address</label>
				<input type="text" name="address">
			</div>
			<div class="input-group">
				<label>Area</label>
				<input type="text" name="area">
			</div>
			<div class="input-group">
				<label>Poscode</label>
				<input type="text" name="poscode">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirm Password</label>
				<input type="password" name="password_2">
			</div>
			<div class="input-group">
				<button type="submit" name="register" class="btn">Sign Up</button>
			</div>
			<p>
				Already have an account? <a href="userlog.php">Sign In</a>
			</p>
		</form>
	</div>
</body>
</html>