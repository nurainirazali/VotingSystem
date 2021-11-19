<?php
include("dbcon.php");
include("userlog0.php");
	if(!isset($_SESSION)) { 
		session_start(); 
	}
	$icnum=$_SESSION['icnum'];
	$sql = "SELECT name, ic, birth, address, area, poscode, password FROM user WHERE ic='$icnum'";
	$result = $dbcon->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$name = $row['name'];
			$icnum = $row['ic'];
		 	$birth = $row['birth'];
		 	$address = $row['address'];
		 	$area = $row['area'];
		 	$poscode = $row['poscode'];
		 	$password = $row['password'];
		}
	} else {
	  	echo "0 results";
	}
?>
<?php 
	if (isset($_POST['save'])){
		$myname = addslashes($_POST['name']);
		$myicnum = $_POST['icnum'];
		$mybirth = ( $_POST['birth'] );
		$myaddress = addslashes($_POST['address']);
		$myarea = $_POST['area'];
		$myposcode = $_POST['poscode'];
		$mypassword = $_POST['password'];

		$sqll ="UPDATE user SET name='$myname', ic='$myicnum', birth='$mybirth', address='$myaddress', area='$myarea', poscode='$myposcode', password='$mypassword'  WHERE ic='$icnum'";

		if(mysqli_query($dbcon,$sqll)) 
		{
			header("Location: profile.php");
		}
	}
?>