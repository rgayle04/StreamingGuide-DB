<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Show Drop Down Menu</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<h2> Select Category to See Shows </h2>
		<?php

		include ("ConnectStreamingDB.php");

		//Execute query
		$sqlMedia="SELECT category FROM category;" ;
		$result = $conn->query($sqlMedia) or die('Could not run query: '.$conn->error);

		//incorporate into drop down list
		echo ' <form action="CatDropDownShow.php" method="get"> ';
		echo ' <p>Choose Category:  ';

		echo " <select name='category'> ";
		while ( $row = mysqli_fetch_array ($result) ) {
				echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';
		}
		echo '</select>    </br>';
		echo '<input type="submit" name="Submit" value="Submit"> ';
		echo '</p>';

		//Close conection
		$conn->close();

		?>
		</body>
</html>
