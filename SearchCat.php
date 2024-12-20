<!DOCTYPE html>
<html lang="en">
<head>
		<title>Category</title>
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

		$category=$_POST["category"];

		//Create query
		$sqlEmp="SELECT category, Media.mediaId, title FROM Category, Media WHERE Category.category = '$category' AND Category.mediaId = Media.mediaId;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h2> Categories </h2>";
			echo "<table border='1'> ";
			echo "<tr>
					<th> category </th>
					<th> mediaId </th>
					<th> title </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>".
							"<td>".$row["category"]."</td>".
							"<td>". $row["mediaId"]. "</td>".
							"<td>". $row["title"]. "</td>".
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