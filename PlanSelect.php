<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Plan</title>
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
		$sqlPlan="SELECT pType, Price, Mem_Amt FROM plan;" ;
		//Execute query
		$result = $conn->query($sqlPlan) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h2> Plan </h2>";
			echo "<table border='1'> ";
			echo "<tr>
					<th> Plan Type </th>
					<th> Price </th>
					<th> Member AMmount </th>
				  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>".
							"<td>".$row["pType"]."</td>".
							"<td>". $row["Price"]. "</td>".
							"<td>" . $row["Mem_Amt"]."</td>".
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
