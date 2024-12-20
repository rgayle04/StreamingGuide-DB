<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get User Data</title>
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
		$sqlUser="SELECT users.userID, userName, pType FROM users, subscription WHERE users.userID = subscription.userID;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Employees </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> ID </th>
					<th> Username </th>
					<th> Plan </th>
					
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["userID"]. "</td>
					<td>".$row["userName"]. "</td>
					<td>". $row["pType"]. "</td>
					
				</tr>";
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
		<br>
		<form action="3UserEditing.php" method="POST">
			Enter the ID of the User whos plan you want to change: 
			<input type='text' name='userID'> <br/> <br>
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
