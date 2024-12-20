<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cast</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$mediaId=$_POST["mediaId"];
		//Create query
		$sqlCast="SELECT mediaId, castId FROM mcast WHERE mediaId = '$mediaId' ;" ;
		//Execute query
		$result = $conn->query($sqlCast) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h2> Cast </h2>";
			echo "<table border='1'> ";
			echo "<tr>
					<th> Media ID </th>
					<th> Cast ID </th>
					
				  </tr>";
			
			while($row = $result->fetch_assoc()) {
			echo "<tr>".
						"<td>".$row["mediaId"]."</td>".
						"<td>". $row["castId"]. "</td>".
						
				 "</tr>";
			}
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
