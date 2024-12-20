<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Use Drop Down</title>
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

		$serverName=$_GET["server"];
		//Create query
		$sqlEpisodes="SELECT DISTINCT serverID, serverName, capacity, IPAddr, serverspermedia.availabilityStatus FROM servers INNER JOIN serverspermedia ON servers.availabilitystatus = serverspermedia.availabilitystatus WHERE serverName= '$serverName' ;" ;
		//Execute query
		$result = $conn->query($sqlEpisodes) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h3> Status of ".$serverName."  </h3>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Server Name </th>
					<th> Status </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["serverName"]. "</td>
					<td>". $row["availabilityStatus"]. "</td>
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
