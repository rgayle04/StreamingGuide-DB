<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Ad</title>
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

		$adId=$_POST["adId"];
		//Create query
		$sqlPlan="SELECT adId, adName, advertiser, placement, duration from ad where adId = '$adId' ;" ;
		//Execute query
		$result = $conn->query($sqlPlan) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h2> Ads </h2>";
			echo "<table border='1'> ";
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
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
