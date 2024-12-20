<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Use Drop Down</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$domainName=$_GET["domain"];
		//Create query
		$sqlEpisodes="SELECT domainName, url, dOwner, pType FROM domain WHERE domainName= '$domainName' ;" ;
		//Execute query
		$result = $conn->query($sqlEpisodes) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h3> Info on ".$domainName."  </h3>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Domain Name </th>
					<th> URL </th>
					<th> Owner </th>
					<th> Plan Type </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["domainName"]. "</td>
					<td>". $row["url"]. "</td>
					<td>". $row["dOwner"]. "</td>
					<td>". $row["pType"]. "</td>
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
