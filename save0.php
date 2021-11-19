<?php
include("dbcon.php");
	if(!isset($_SESSION)) { 
		session_start(); 
	}
	
	$vote = $_GET['candidate'];
	$userid=$_GET['usr_id'];
	$dun=$_GET['dun_r'];

	$sql=mysqli_query($dbcon, "SELECT dun,voterID FROM vote where dun='$dun' and voterID='$userid'");

	if(mysqli_num_rows($sql))
	{
	    echo "<h3>You have already done your vote for this Dun </h3>";
	}
	else
	{
	    $ins= mysqli_query($dbcon,"INSERT INTO vote (voterID, dun, candidatename) VALUES ('$userid', '$dun', '$vote')");
	    	  mysqli_query($dbcon,"UPDATE candidate SET candivote=candivote+1 WHERE candiname='$vote'");
			  mysqli_close($dbcon);
	 
		echo "<h3 style='color:blue'>Congrates You have submitted your vote for canditate ".$vote."</h3>";
	}
?>