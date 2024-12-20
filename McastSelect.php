<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Cast</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		//Create query
		$sqlCast="SELECT mediaId, castId FROM mcast;" ;
		//Execute query
		$result = $conn->query($sqlCast) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h2> Cast </h2>";
			echo "<table border='1'> ";
			echo "<tr>
					<th> Media ID </th>
					<th> Cast Id </th>
					
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>".
							"<td>".$row["mediaId"]."</td>".
							"<td>". $row["castId"]. "</td>".
							
				     "</tr>";
			}
			echo "</table>";
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
