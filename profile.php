<?php include ("profile0.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>USER PROFILE</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body style="background-color: #fcdf38;">
	<div class="navtop">
		<a href="dashboard.php"><h1>Perak Online Voting</h1></a>
		<a href="logout.php" style="margin-left: 65%;"><i class="fas fa-sign-out-alt"></i>Logout</a>
	</div>
	<div class="header1">
		<h2>PROFILE</h2>
	</div>
	<div class="former1">
		<form action="profile.php" method="post">
			<img src="profile-icon.png" style="height: 150px; border-radius: 50%; margin-left: 38%; margin-bottom: 30px;">
			<div class="input-group1">
				Full Name :&nbsp;<input type="text" name="name" value="<?php echo $name; ?>"><br>
			</div>
			<div class="input-group1" style="width: fit-content;">
				IcNum :&nbsp;<input type="text" name="icnum" value="<?php echo $icnum; ?>"><br>
			</div>
			<div class="input-group1">
				Birth of Date :&nbsp;<input type="text" name="birth" value="<?php echo $birth; ?>"><br>
			</div>
			<div class="input-group1" style="width: 115%;">
				Address :&nbsp;<input type="text" name="address" value="<?php echo $address; ?>"><br>
			</div>
			<div class="input-group1" style="width: fit-content;">
				Area :&nbsp;<input type="text" name="area" value="<?php echo $area; ?>"><br>
			</div>
			<div class="input-group1" style="width: fit-content;">
				Poscode :&nbsp;<input type="text" name="poscode" value="<?php echo $poscode; ?>"><br>
			</div>
			<div class="input-group1" style="width: fit-content;">
				Password :&nbsp;<input type="password" name="password" value="<?php echo $password; ?>"><br>
			</div>
			<script type="text/javascript">
				function showAlert(){
					alert("Successfully Saved");
				}
			</script>
			<div class="input-group1">
				<button type="submit" name="save" class="btn3"onclick="showAlert()">Save</button>
			</div>
		</form>
	</div>
</body>
</html>