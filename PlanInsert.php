<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert Plan</title>
		<link rel="stylesheet" type="text/css" href="myCss.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$pType=$_POST["pType"];
		$Price=$_POST["Price"];
		$Mem_Amt=$_POST["Mem_Amt"];
		
		
		//Create query
		$sqlPlan="INSERT INTO Plan VALUES('$pType', '$Price', '$Mem_Amt') ;" ;
		//Execute query
		$result = $conn->query($sqlPlan) or die('Could not run query: '.$conn->error);
		echo "Record updated";
		header("Location:PlanDataIn.php");
		exit();
		$conn->close();

		?>
	</body>
</html>
