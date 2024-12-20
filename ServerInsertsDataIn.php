<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Servers</title>
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
		$sqlUser="SELECT DISTINCT serverID, serverName, capacity, IPAddr, serverspermedia.availabilityStatus FROM servers INNER JOIN serverspermedia ON servers.availabilitystatus = serverspermedia.availabilitystatus;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Servers </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> ID </th>
					<th> Name </th>
					<th> Capacity </th>
					<th> IP Address </th>
					<th> Status </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["serverID"]. "</td>
					<td>".$row["serverName"]. "</td>
					<td>". $row["capacity"]. "</td>
					<td>".$row["IPAddr"]. "</td>
					<td>". $row["availabilityStatus"]. "</td>
				</tr>";
			
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
		<br>
		<form action="ServerInserts.php" method="POST">
			Enter the ID, Name, Capacity, IP Address and Status of the new Server: <br/> <br>
			ID: <input type='text' name='serverID' > <br/> <br>
			Name: <input type='text' name='ServerName' > <br/> <br>
			Capacity: <input type='text' name='Capacity' > <br/> <br>
			IPAddr: <input type='text' name='IPAddr' > <br/> <br>
			Status: <input type='radio' name='availabilityStatus' id="Actv" value="Actv">
			<label for="Actv">Actv</label>
			<input type='radio' name='availabilityStatus' id="Inac" value="Inac">
			<label for="Inac">Inac</label>  <br/> <br>
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
