<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert Ad</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$adId=$_POST["adId"];
		$adName=$_POST["adName"];
		$advertiser=$_POST["advertiser"];
		$placement=$_POST["placement"];
		$duration=$_POST["duration"];
		
		//Create query
		$sqlAd="INSERT INTO ad VALUES('$adId', '$adName', '$advertiser', '$placement', '$duration') ;" ;
		//Execute query
		$result = $conn->query($sqlAd) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:AdsDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
