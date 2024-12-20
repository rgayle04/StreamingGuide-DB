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

		$title=$_GET["media"];
		//Create query
		$sqlEpisodes="SELECT title, episodes FROM media, episodes WHERE media.mediaID = episodes.mediaID And title= '$title' ;" ;
		//Execute query
		$result = $conn->query($sqlEpisodes) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h3> Epsidoes for ".$title."  </h3>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Show Title </th>
					<th> Episodes </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["title"]. "</td>
					<td>". $row["episodes"]. "</td>
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
