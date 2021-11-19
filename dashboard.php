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
<?php if(!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
	<title>USER DASHBOARD</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body style="background-color: #fcdf38;">
	<div class="navtop">
		<h1>Perak Online Voting</h1>
		<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
	</div>
	<?php if (isset($_SESSION['success'])): ?>
		<div class="error success">
			<h3>
				<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>
	<div class="choose1">
		<form action="profile.php"  style="display: inline-block; margin-right: 70px;">
			<button class="btn1"><i class="fas fa-address-card fa-7x"></i><br>Profile</button>
		</form>
		<form action="vote.php" style=" display: inline-block; margin-left: 100px;">
			<button class="btn1"><i class="fas fa-vote-yea fa-7x"></i><br>Vote</button>
		</form>
	</div>
</body>
</html>