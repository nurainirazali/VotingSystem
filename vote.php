<?php
include("dbcon.php");
	if(!isset($_SESSION)) { 
		session_start(); 
	}

	$duns=mysqli_query($dbcon, "SELECT * FROM dun");
	
	$id_v = mysqli_query($dbcon, "SELECT userid FROM user WHERE ic = ".$_SESSION['icnum']."");
	$id_rec   = mysqli_fetch_assoc($id_v);
	$id_val = $id_rec['userid'];

	if (isset($_POST['Submit']))
	{
	$dun = addslashes( $_POST['dun'] );
	$result = mysqli_query($dbcon,"SELECT * FROM candidate WHERE candidunId='$dun'");
	}
	else
?>
<!DOCTYPE html>
<html>
<head>
	<title>VOTE</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<script type="text/javascript">
	function getVote(int)
	{
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		if(confirm("Your vote is for "+int))
		{
			var usr_id = document.getElementById('usr_id').value;
			var dun_r = document.getElementById('req_dun').value;

			xmlhttp.open("GET","save0.php?usr_id="+usr_id+"&dun_r="+dun_r+"&candidate="+int,true);
			xmlhttp.send();
			
			xmlhttp.onreadystatechange =function()
			{
				if(xmlhttp.readyState ==4 && xmlhttp.status==200)
				{
					
					document.getElementById("error").innerHTML=xmlhttp.responseText;
				}
			};
					
			var el = document.getElementById('candidates_rec');
			var all = el.getElementsByTagName('input');
			for (var i = 0; i < all.length; i++) {
				all[i].disabled = true;
			}
	  	}
		else
		{
			alert("Choose another candidate ");
		}
	}

	function getDun(String)
	{
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.open("GET","vote.php?dun="+String,true);
		xmlhttp.send();
	}
</script>
<body style="background-color: #fcdf38;">
	<div class="navtop">
		<a href="dashboard.php"><h1>Perak Online Voting</h1></a>
		<a href="logout.php" style="margin-left: 65%;"><i class="fas fa-sign-out-alt"></i>Logout</a>
	</div>
	<div class="frame">
		<form name="fmNames" id="fmNames" method="post" action="vote.php" style="text-align: center; font-size: medium;">
			<tr>
			    <td>Choose Dun : </td>
			    <td><SELECT NAME="dun" id="dun" onclick="getDun(this.value)">
			    <OPTION VALUE="select">SELECT------
			    <?php 

				    while ($row=mysqli_fetch_array($duns)){
				    	echo "<OPTION VALUE=$row[dunid]>$row[dunid] $row[dunname]"; 
			    	}
			    ?>
			    </SELECT></td>
			    <td><input type="hidden" id="usr_id" value="<?php echo $id_val; ?>" /></td>
			    <td><input type="hidden" id="req_dun" value="<?php echo $_REQUEST['dun']; ?>" /></td>
			    <td><input type="submit" name="Submit" value="See Candidates" /></td>
			</tr>
			<tr>
			    <td>&nbsp;</td> 
			    <td>&nbsp;</td>
			</tr>
		</form> 
		<table border="0" align="center" id="candidates_rec">
			<form>
				<tr>
				    <th>Candidates:</th>
				</tr> 
					<?php
						if (isset($_POST['Submit']))
						{
							while ($row=mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td><input type='radio' name='vote' id='vote' value='$row[candiname]' onclick='getVote(this.value)' /></td>";
							echo "<td>" . $row['candiname']."</td>";
							echo "<td style='padding-left: 30px;'>" . $row['candiparti']."</td>";
							echo "</tr>";
							}
							mysqli_free_result($result);
							mysqli_close($dbcon);
						}
						else
					?>
				<tr>
				    <h3 style="text-align: center; color: red;">Attention: Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective dun. This process cannot be undone so think wisely before confirm your vote.</h3>
				    <td>&nbsp;</td>
				</tr>
			</form>
		</table>
		<center><span id="error" value="Error"></span></center>
	</div>
</body>
</html>