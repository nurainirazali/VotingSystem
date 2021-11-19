<?php
include("dbcon.php");
	if(!isset($_SESSION)) { 
		session_start(); 
	}

	$result=mysqli_query($dbcon, "SELECT * FROM dun");
	if (mysqli_num_rows($result)<1){
	    $result = null;
	}

	$dunid="";
	$dunname="";
	$valuesearch="";

	if(isset($_POST['insertDun'])) {
		$dunId = ($_POST['dunid']);
		$dunname = ($_POST['dunname']);

		$sql ="INSERT INTO dun (dunid,dunname) VALUES ('$dunId','$dunname')";
		mysqli_query($dbcon, $sql);
 		header("Location: dun.php");
	}
?>
<?php
	if (isset($_GET['dunid']))
	{
	 	$id = $_GET['dunid'];
	 	$result = mysqli_query($dbcon, "DELETE FROM dun WHERE dunid='$id'");
	 	header("Location: dun.php");
	}
	else
?>
<!DOCTYPE html>
<html>
<head>
	<title>MANAGE DUN</title>
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
		<h2>MANAGE DUN</h2>
	</div>
	<div class="frame" style="margin: 0px auto; border-radius: 0px 0px 10px 10px;">
		<form method="post" action="dun.php" style="text-align: center;">
			<table border="0" align="center">
				<tr>
					<td>
						<label style="display: contents;">No </label>
					</td>
					<td>
						:
					</td>
					<td>
						<div class="input-group">
							<input type="text" name="dunid" style="width: auto;">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<label style="display: contents;">Dun Name </label>
					</td>
					<td>
						:
					</td>
					<td>
						<div class="input-group">
							<input type="text" name="dunname" style="width: auto;">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="input-group">
							<button type="submit" name="insertDun" class="btn"  style="width: 30%; margin-left: 70%;">Add</button>	
						</div>	
					</td>
				</tr>
			</table>
			<hr style="height: 4px; color: black; background-color: black; margin-top: 20px;">
		</form>
		<h3 style="text-align: center;">PERAK DUN LIST</h3>
		<div class="input-group" style="text-align: center";>
			<label style="text-align: center; display: inline;">Search Dun ID : </label>
			<input type="text" name="searchdun" id="searchdun" style="margin-bottom: 15px; width: 30%;" placeholder="Search" onkeyup="myFunction()">
		</div>
		<table border="0" width="420" align="center" id="dunList">
			<tr>
				<th>No.</th>
				<th>Dun ID</th>
				<th>Dun Name</th>
				<th> </th>
			</tr>
			<?php
			include("dbcon.php");
			$inc=1;
			while ($row=mysqli_fetch_array($result)){
				echo "<tr>";
				echo '<td style="text-align: center;">'.$inc.'</td>';
				echo '<td style="text-align: center;">' . $row['dunid'].'</td>';
				echo '<td style="text-align: center;">' . $row['dunname'].'</td>';
				echo '<td style="text-align: center;"><a href="dun.php? dunid=' . $row['dunid'] . '" style="color: black; background-color: transparent;"><i class="fas fa-trash-alt"></a></td>';
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
  input = document.getElementById("searchdun");
  filter = input.value.toUpperCase();
  table = document.getElementById("dunList");
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