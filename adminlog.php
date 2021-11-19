<?php
include("dbcon.php");
	if(!isset($_SESSION)) { 
		session_start(); 
	}
	
	$username="";
	$password1="";
	$errors= array();

	if(isset($_POST['login1'])) {
		$username = ($_POST['username']);
		$password1 = ($_POST['password1']);

		if(empty($username)) {
			array_push($errors, "Username is required");
		}
		if(empty($password1)) {
			array_push($errors, "Password is required");
		}

		if(count($errors) ==0) {
			$password1 = md5($password1);
			$query = "SELECT * FROM admin WHERE username='$username' AND password1='$password1'";
			$result=mysqli_query($dbcon, $query);
			if(mysqli_num_rows($result)==1){
				$_SESSION['username']=$username;
				$_SESSION['success']="You are now logged in";
				header('location: dashboardadmin.php');
			}else{
				array_push($errors, "Wrong username / password combination");
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN SIGN IN</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('47411.png'); background-size: cover; background-attachment: fixed;
    background-repeat: no-repeat;">
	<div class="header">
		<h2>ADMIN LOG IN</h2>
	</div>
	<div class="former">
		<form method="post" action="adminlog.php">
			<?php if (count($errors) >0): ?>
				<div class="error">
					<?php foreach ($errors as $error): ?>
						<p><?php echo $error; ?></p>
					<?php endforeach ?>
				</div>
			<?php endif ?>
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="Password" name="password1">
			</div>
			<div class="input-group">
				<button type="submit" name="login1" class="btn">Log In</button>
			</div>
		</form>
	</div>
</body>
</html>