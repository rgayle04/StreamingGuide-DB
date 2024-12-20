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
		$sqlEmp="SELECT serverID, serverName, capacity, IPAddr FROM servers;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h2> Servers</h2>";
			echo "<table border='1'> ";
			echo "<tr>
					<th> ID </th>
					<th> Name </th>
					<th> Capacity </th>
					<th> IP Address </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["serverID"]. "</td>
					<td>".$row["serverName"]. "</td>
					<td>". $row["capacity"]. "</td>
					<td>".$row["IPAddr"]. "</td>
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
