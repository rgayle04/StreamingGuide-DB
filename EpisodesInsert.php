<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert Episode</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$mediaId=$_POST["mediaId"];
		$episodes=$_POST["episodes"];
		
		
		//Create query
		$sqlEpisodes="INSERT INTO episodes VALUES('$mediaId', '$episodes') ;" ;
		//Execute query
		$result = $conn->query($sqlEpisodes) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:EpisodesIDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
