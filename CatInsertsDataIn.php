<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Category</title>
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
		$sqlUser="SELECT category, mediaId FROM category;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Categories </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Category </th>
					<th> Media Id </th>
					
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["category"]. "</td>
					<td>".$row["mediaId"]. "</td>

					
				</tr>";

			
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
		<br>
		<form action="CatInserts.php" method="POST">
			Enter the ID and Category: <br/> <br>
			Category: <input type='text' name='category' > <br/> <br>
			Media ID: <input type='text' name='mediaId' > <br/> <br>
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
