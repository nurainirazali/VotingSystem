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
<?php if(!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN DASHBOARD</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body style="background-color: #fcdf38;">
	<div class="navtop">
		<h1>Perak Online Voting</h1>
		<a href="logoutadmin.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
	<div class="choose">
		<form action="adminpro.html"  style="display: inline-block; margin-right: 30px;">
			<button class="btn1"><i class="fas fa-users fa-7x"></i><br>Admin</button>
		</form>
		<form action="candidate.php"  style="display: inline-block; margin-right: 30px;">
			<button class="btn1"><i class="fas fa-users fa-7x"></i><br>Manage Candidate</button>
		</form>
		<form action="dun.php"  style="display: inline-block; margin-right: 30px;">
			<button class="btn1"><i class="fas fa-users fa-7x"></i><br>Manage Dun</button>
		</form>
		<form action="votestat.php" style=" display: inline-block; margin-left: 0px;">
			<button class="btn2"><i class="fas fa-poll-h fa-7x"></i><br>Vote Info</button>
		</form>
	</div>
</body>
</html>