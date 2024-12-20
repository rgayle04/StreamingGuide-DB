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

		$mediaId=$_POST["mediaId"];
		$title=$_POST["title"];
		$duration=$_POST["duration"];
		$viewership=$_POST["viewership"];
		$rating=$_POST["rating"];
		//Create query
		$sqlUser="INSERT INTO Media VALUES('$mediaId', '$title', '$duration', '$viewership', '$rating') ;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:MediaInsertsDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
