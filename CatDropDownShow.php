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

		$cat=$_GET["category"];
		//Create query
		$sqlEpisodes="SELECT category, title FROM category, media WHERE category= '$cat' AND category.mediaId=media.mediaId ;" ;
		//Execute query
		$result = $conn->query($sqlEpisodes) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h3> Shows in ".$cat."  </h3>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Title </th>
					<th> Category </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["title"]. "</td>
					<td>". $row["category"]. "</td>
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
