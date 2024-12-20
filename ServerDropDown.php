<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Show Drop Down Menu</title>
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
		<h2> Select Server to See Status </h2>
		<?php

		include ("ConnectStreamingDB.php");

		//Execute query
		$sqlMedia="SELECT serverName FROM servers;" ;
		$result = $conn->query($sqlMedia) or die('Could not run query: '.$conn->error);

		//incorporate into drop down list
		echo ' <form action="ServerDropDownShow.php" method="get"> ';
		echo ' <p>Choose Server:  ';

		echo " <select name='server'> ";
		while ( $row = mysqli_fetch_array ($result) ) {
				echo '<option value="'.$row["serverName"].'">'.$row["serverName"].'</option>';
		}
		echo '</select>    </br>';
		echo '<input type="submit" name="Submit" value="Submit"> ';
		echo '</p>';

		//Close conection
		$conn->close();

		?>
		</body>
</html>
