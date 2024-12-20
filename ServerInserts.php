<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert Server</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$serverID=$_POST["serverID"];
		$Name=$_POST["ServerName"];
		$capacity=$_POST["Capacity"]; 
		$ipAddr=$_POST["IPAddr"];
		$status=$_POST["availabilityStatus"];
		//Create query
		$sqlUser="INSERT INTO servers VALUES('$serverID', '$Name', '$capacity', '$ipAddr', '$status') ;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:ServerInsertsDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
