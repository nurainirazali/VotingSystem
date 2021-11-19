<?php
/* php& mysqldb connection file */
$user = "root"; //mysqlusername
$pass = ""; //mysqlpassword
$host = "localhost"; //server name or ipaddress
$dbname= "perakvoting"; //your db name

$dbcon= mysqli_connect($host, $user, $pass);
	if(isset($dbcon)) {
		mysqli_select_db($dbcon, $dbname) or 
		die("<center>Error: " . mysql_error($dbcon) . "</center>");
	}
	else {
		echo "<center>Error: Could not connect to the database.</center>";
	}
?>