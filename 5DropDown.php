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
		<h2> Select Media to See Episodes </h2>
		<?php

		include ("ConnectStreamingDB.php");

		//Execute query
		$sqlMedia="SELECT title FROM media;" ;
		$result = $conn->query($sqlMedia) or die('Could not run query: '.$conn->error);

		//incorporate into drop down list
		echo ' <form action="5DropDownShow.php" method="get"> ';
		echo ' <p>Choose Show:  ';

		echo " <select name='media'> ";
		while ( $row = mysqli_fetch_array ($result) ) {
				echo '<option value="'.$row["title"].'">'.$row["title"].'</option>';
		}
		echo '</select>    </br>';
		echo '<input type="submit" name="Submit" value="Submit"> ';
		echo '</p>';

		//Close conection
		$conn->close();

		?>
		</body>
</html>
