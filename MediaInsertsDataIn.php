<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Users</title>
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
		$sqlUser="SELECT mediaId, title, duration, viewership, rating FROM media;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Media </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> ID </th>
					<th> Title </th>
					<th> Duration </th>
					<th> Viewership </th>
					<th> Rating </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["mediaId"]. "</td>
					<td>".$row["title"]. "</td>
					<td>". $row["duration"]. "</td>
					<td>".$row["viewership"]. "</td>
					<td>". $row["rating"]. "</td>

					
				</tr>";

				
			
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
		<br>
		<form action="MediaInserts.php" method="POST">
			Enter the ID, Title, Duration. Viewership and Ratings of the new Media: <br/> <br>
			Media Id: <input type='text' name='mediaId' > <br/> <br>
			Title: <input type='text' name='title' > <br/> <br>
			Duration: <input type='text' name='duration' > <br/> <br>
			Viewership: <input type='text' name='viewership' > <br/> <br>
			Ratings: <input type='text' name='rating' > <br/> <br>
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
