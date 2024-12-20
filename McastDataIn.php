<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Cast</title>
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
		$sqlCast="SELECT mediaId, castId  FROM mcast;" ;
		//Execute query
		$result = $conn->query($sqlCast) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Cast </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Media ID </th>
					<th> Cast Id </th>
					
					
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["mediaId"]. "</td>
					<td>".$row["castId"]. "</td>
					

					
				</tr>";

				
			
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
		<br>
		<form action="McastInsert.php" method="POST">
			Enter the Media ID and Cast Id of the new Cast: <br/> <br>
			Media ID: <input type='text' name='mediaId' > <br/> <br>
			Cast Id: <input type='text' name='castId' > <br/> <br>
			
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
