<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Episodes</title>
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
		$sqlEpisodes="SELECT mediaId, episodes  FROM episodes;" ;
		//Execute query
		$result = $conn->query($sqlEpisodes) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Episodes </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> ID </th>
					<th> Episodes </th>
					
					
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["mediaId"]. "</td>
					<td>".$row["episodes"]. "</td>
					

					
				</tr>";

				
			
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
		<br>
		<form action="EpisodesInsert.php" method="POST">
			Enter the ID and Episodes of the new Episode: <br/> <br>
			Media ID: <input type='text' name='mediaId' > <br/> <br>
			Episodes: <input type='text' name='episodes' > <br/> <br>
			
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
