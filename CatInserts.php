<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert User</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$category=$_POST["category"];
		$mediaId=$_POST["mediaId"];
		
		//Create query
		$sqlUser="INSERT INTO category VALUES('$category', '$mediaId') ;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:CatInsertsDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
