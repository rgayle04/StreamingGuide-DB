<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Show Drop Down Menu</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<h2> Select Domain to See Info </h2>
		<?php

		include ("ConnectStreamingDB.php");

		//Execute query
		$sqlMedia="SELECT domainName FROM domain;" ;
		$result = $conn->query($sqlMedia) or die('Could not run query: '.$conn->error);

		//incorporate into drop down list
		echo ' <form action="DomainDropDownShow.php" method="get"> ';
		echo ' <p>Choose Domain:  ';

		echo " <select name='domain'> ";
		while ( $row = mysqli_fetch_array ($result) ) {
				echo '<option value="'.$row["domainName"].'">'.$row["domainName"].'</option>';
		}
		echo '</select>    </br>';
		echo '<input type="submit" name="Submit" value="Submit"> ';
		echo '</p>';

		//Close conection
		$conn->close();

		?>
		</body>
</html>
