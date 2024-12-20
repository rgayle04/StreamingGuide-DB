<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Ad</title>
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
		$sqlAd="SELECT adId, adName, advertiser, placement, duration  FROM ad;" ;
		//Execute query
		$result = $conn->query($sqlAd) or die('Could not run query: '.$conn->error);

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
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
		<br>
		<form action="AdsInsert.php" method="POST">
			Enter the ID Name Advertiser Placement and Duration of the new Ad: <br/> <br>
			Ad ID: <input type='text' name='adId' > <br/> <br>
			Ad Name: <input type='text' name='adName' > <br/> <br>
			Advertiser: <input type='text' name='advertiser' > <br/> <br>
			Placement: <input type='text' name='placement' > <br/> <br>
			Duration: <input type='text' name='duration' > <br/> <br>
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
