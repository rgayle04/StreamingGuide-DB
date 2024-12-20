<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert SPM</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$status=$_POST["availabilityStatus"];
		$Name=$_POST["domainName"];
		$mediaId=$_POST["mediaId"]; 

		//Create query
		$sqlUser="INSERT INTO serverspermedia VALUES('$status', '$Name', '$mediaId') ;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:SPMInsertsDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
