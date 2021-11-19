<?php
include("dbcon.php");
	if(!isset($_SESSION)) { 
		session_start(); 
	}

	$result=mysqli_query($dbcon, "SELECT * FROM candidate");
	if (mysqli_num_rows($result)<1){
	    $result = null;
	}

	$candidunId="";
	$candiname="";
	$candiparti="";

	if(isset($_POST['insertCandy'])) {
		$candidunId = ($_POST['candidunId']);
		$candiname = ($_POST['candiname']);
		$candiparti=($_POST['candiparti']);

		$sql ="INSERT INTO candidate (candidunId,candiname,candiparti) VALUES ('$candidunId','$candiname','$candiparti')";
		mysqli_query($dbcon, $sql);
 		header("Location: candidate.php");
	}
?>
<?php
	if (isset($_GET['candiname']))
	{
	 	$idT = $_GET['candiname'];
	 	$result = mysqli_query($dbcon, "DELETE FROM candidate WHERE candiname='$idT'");
	 	header("Location: candidate.php");
	}
	else
?>
<!DOCTYPE html>
<html>
<head>
	<title>MANAGE CANDIDATE</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<style type="text/css">
	.flex-v-center {
		display: flex;
		align-items: center;
	}
</style>
<body style="background-color: #fcdf38;">
	<div class="navtop">
		<a href="dashboardadmin.php"><h1>Perak Online Voting</h1></a>
		<a href="logoutadmin.php" style="margin-left: 65%;"><i class="fas fa-sign-out-alt"></i>Logout</a>
	</div>
	<div class="header1" style="width: 70%;">
		<h2>MANAGE CANDIDATE</h2>
	</div>
	<div class="frame" style="margin: 0px auto; border-radius: 0px 0px 10px 10px;">
		<form method="post" action="candidate.php" style="text-align: center;">
			<table border="0" align="center">
				<tr>
					<td>
						<label style="display: contents;">Dun ID </label>
					</td>
					<td>
						:
					</td>
					<td>
						<div class="input-group">
							<input type="text" name="candidunId" style="width: auto;">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<label style="display: contents;">Candidate Name </label>
					</td>
					<td>
						:
					</td>
					<td>
						<div class="input-group">
							<input type="text" name="candiname" style="width: auto;">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<label style="display: contents;">Parti </label>
					</td>
					<td>
						:
					</td>
					<td>
						<div class="input-group">
							<input type="text" name="candiparti" style="width: auto;">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="input-group">
							<button type="submit" name="insertCandy" class="btn"  style="width: 30%; margin-left: 70%;">Add</button>	
						</div>	
					</td>
				</tr>
			<table>
			<hr style="height: 4px; color: black; background-color: black; margin-top: 20px;">
		</form>
		<h3 style="text-align: center;">PERAK CANDIDATES LIST</h3>
		<div class="input-group" style="text-align: center";>
			<label style="text-align: center; display: inline;">Search Candidate Name : </label>
			<input type="text" name="searchname" id="searchname" style="margin-bottom: 15px; width: 30%;" placeholder="Search" onkeyup="myFunction()">
		</div>
		<table border="0" width="420" align="center" id="candiList">
			<tr>
				<th>No.</th>
				<th>Dun ID</th>
				<th>Candidate Name</th>
				<th>Parti</th>
				<th> </th>
			</tr>
			<?php
			include("dbcon.php");
			$inc=1;
			while ($row=mysqli_fetch_array($result)){
				echo "<tr>";
				echo '<td style="text-align: center;">'.$inc.'</td>';
				echo '<td style="text-align: center;">' . $row['candidunId'].'</td>';
				echo '<td style="text-align: center;">' . $row['candiname'].'</td>';
				echo '<td style="text-align: center;">' . $row['candiparti'].'</td>';
				echo '<td style="text-align: center;"><a href="candidate.php? candiname=' . $row['candiname'] . '" style="color: black; background-color: transparent;"><i class="fas fa-trash-alt"></a></td>';
				echo "</tr>";
				$inc++;
			}

			mysqli_free_result($result);
			mysqli_close($dbcon);
			?>
		</table>
	</div>
</body>
<script type="text/javascript">
	function myFunction() {
  		// Declare variables
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("searchname");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("candiList");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
		  	td1 = tr[i].getElementsByTagName("td")[1];
		  	td2 = tr[i].getElementsByTagName("td")[2];
		  	if (td1 || td2) {
		  		txtValue1 = td1.textContent || td1.innerText;
		  		txtValue2 = td2.textContent || td2.innerText;
		  		if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
		  			tr[i].style.display = "";
		  		} else {
		  			tr[i].style.display = "none";
		  		}
		  	}
		  }
	}
</script>
</html>