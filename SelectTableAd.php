<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Identity</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<header>
				<h1>Welcome to Our Streaming Guide!</h1>
				<nav>
					<ul class="navbar">
						<li><a href="HomePage.html">Home</a></li>
					</ul>
				</nav>
			</header>
	
	<?php

		include ("ConnectStreamingDB.php");

		//Create query
		$sqlEmp="SELECT adId, adName, advertiser, placement, duration  FROM ad;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Ads </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> ID </th>
					<th> Name </th>
					<th> Advertiser </th>
					<th> Placement </th>
					<th> Duration </th>
					
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
                <td>".$row["adId"]. "</td>
                <td>".$row["adName"]. "</td>
                <td>".$row["advertiser"]. "</td>
                <td>".$row["placement"]. "</td>
                <td>".$row["duration"]. "</td>
					</tr>";
			}
			echo "</table>";
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
