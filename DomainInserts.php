<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert Domain</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$name=$_POST["domainName"];
		$url=$_POST["url"];
		$dOwner=$_POST["dOwner"]; 
		$pType=$_POST["pType"];
		//Create query
		$sqlUser="INSERT INTO domain VALUES('$name', '$url', '$dOwner', '$pType') ;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:DomainInsertsDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
