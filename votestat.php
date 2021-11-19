<?php
include("dbcon.php");
	if(!isset($_SESSION)) { 
		session_start(); 
    }
    
    $result_dun=mysqli_query($dbcon, "SELECT * FROM dun");

	?>
<!DOCTYPE html>
<html>
<head>
	<title>MANAGE DUN</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
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
		<h2>VOTE RESULT</h2>
	</div>
	<div class="frame" style="margin: 0px auto; border-radius: 0px 0px 10px 10px;">
		<table id="voteList" class="display" cellspacing="0" width="100%" border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Dun ID & Name</th>
                    <th>Candidate Name</th>
                    <th>Candidate Total Vote</th>
                </tr>
            </thead>
            <tbody>
                <?php $inc = 1; ?>
			    <?php while ($row=mysqli_fetch_array($result_dun)){ ?>
                <tr rowspan ="4">
                    <td style="text-align: center;"><?php echo $inc++; ?></td>
                    <td style="text-align: center;"><?php echo $row['dunid']; ?><br><?php echo $row['dunname']; ?></td>
                    <td> 
                        <?php if($row['dunid'] !==  null){ 
                            $result_candidate=mysqli_query($dbcon, "SELECT candivote,candiname FROM candidate WHERE candidunid ='".$row['dunid']."' ORDER BY candivote DESC");
                            $color = true;
                            $previous = '';
                            while ($row_candidate=mysqli_fetch_array($result_candidate)){ ?>
                         
                            <div <?php if ( ($row_candidate['candivote'] > $previous) || ($row_candidate['candivote'] === $previous)) { ?> style="background-color: aqua;" 
                            <?php $previous = $row_candidate['candivote'];} ?>
                                ><?php echo $row_candidate['candiname']; ?>
                            </div>
                                
                        <?php } } ?>
                    </td>
                    <td style="text-align: center;">
                        <?php if($row['dunid'] !==  null){ 
                            $result_candidate=mysqli_query($dbcon, "SELECT candivote FROM candidate WHERE candidunid ='".$row['dunid']."' ORDER BY candivote DESC");
                            $first = true;
                            while ($row_candidate=mysqli_fetch_array($result_candidate)){ ?>
                         
                         <div <?php if ( ($row_candidate['candivote'] > $previous) || ($row_candidate['candivote'] === $previous)) { ?> style="background-color: aqua;" 
                            <?php $previous = $row_candidate['candivote'];} ?>><?php echo $row_candidate['candivote']; ?></div>
                                
                        <?php } } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
		</table>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
        $('#voteList').DataTable();
    } );
</script>
</html>