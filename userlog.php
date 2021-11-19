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
<!DOCTYPE html>
<html>
<head>
	<title>SIGN IN</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('47411.png'); background-size: cover; background-attachment: fixed;
    background-repeat: no-repeat;">
	<div class="header">
		<h2>SIGN IN</h2>
	</div>
	<div class="former">
		<form method="post" action="userlog.php">
			<?php if (count($errors) >0): ?>
				<div class="error">
					<?php foreach ($errors as $error): ?>
						<p><?php echo $error; ?></p>
					<?php endforeach ?>
				</div>
			<?php endif ?>
			<div class="input-group">
				<label>Ic Number</label>
				<input type="text" name="icnum" placeholder="Ic Number">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="Password" name="password" placeholder="Password">
			</div>
			<div class="input-group">
				<button type="submit" name="login" class="btn">Log In</button>
			</div>
			<p style="margin-left: 10px; margin-top: auto; margin-bottom: auto">Not Register?<a href="register.php">Sign Up</a></p>
			<p style="margin-left: 10px; margin-top: auto; margin-bottom: auto">Forget Password?<a href="forgetpass.php">Here</a></p>
		</form>
	</div>
</body>
</html>