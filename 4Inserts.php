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

		$userID=$_POST["userID"];
		$userName=$_POST["userName"];
		$email=$_POST["email"];
		
		//Create query
		$sqlUser="INSERT INTO users VALUES('$userID', '$userName', '$email') ;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:4InsertsDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
