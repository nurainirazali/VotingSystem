<?php
include("dbcon.php");

	if(isset($_POST['reset'])) {
		$icnum = ($_POST['icnum']);
		$password = ($_POST['password']);
		$password = md5($password);
		$next ="UPDATE user SET password='$password' WHERE ic='$icnum'";
		mysqli_query($dbcon, $next);
		header('location: userlog.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>RECOVER PASSWORD</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body style="background-image: url('47411.png'); background-size: cover; background-attachment: fixed;
    background-repeat: no-repeat;">
	<div class="header">
		<h2>RESET PASSWORD</h2>
	</div>
	<div class="former">
		<form method="post" action="forgetpass.php">
			<div class="input-group">
				<label>Ic Number</label>
				<input type="text" name="icnum">
			</div>
			<div class="input-group">
				<label>New Password</label>
				<input type="Password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" name="reset" class="btn">Reset</button>
			</div>
		</form>
	</div>
</body>
</html>