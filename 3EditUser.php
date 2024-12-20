<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit User Plan</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$pType=$_GET["pType"];
		$userID=$_GET["userID"];
		
		//Create query
		$sqlUser="UPDATE subscription SET pType='$pType' WHERE subscription.userID= '$userID' ;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:3UserDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
