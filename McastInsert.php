<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert Cast</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$mediaId=$_POST["mediaId"];
		$castId=$_POST["castId"];
		
		
		//Create query
		$sqlCast="INSERT INTO mcast VALUES('$mediaId', '$castId') ;" ;
		//Execute query
		$result = $conn->query($sqlCast) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:McastDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
