<!DOCTYPE html>
<html lang="en">
<head>
		<title>Media</title>
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

		$mediaId=$_POST["mediaId"];

		//Create query
		$sqlEmp="SELECT category, Media.mediaId, title, duration, viewership, rating FROM Category, Media WHERE media.mediaId = '$mediaId' AND Category.mediaId = Media.mediaId;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h2> Media </h2>";
			echo "<table border='1'> ";
			echo "<tr>
					
					<th> MediaId </th>
					<th> Title </th>
                    <th> Category </th>
                    <th> Duration </th>
					<th> Viewership</th>
                    <th> Rating </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>".
                            "<td>". $row["mediaId"]. "</td>".
                            "<td>". $row["title"]. "</td>".
                            "<td>".$row["category"]."</td>".
                            "<td>". $row["duration"]. "</td>".
                            "<td>". $row["viewership"]. "</td>".
                            "<td>".$row["rating"]."</td>".
							
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