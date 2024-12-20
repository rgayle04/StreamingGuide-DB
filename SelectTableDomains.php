<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Identity</title>
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
		$sqlEmp="SELECT domainName, url, dOwner, pType FROM domain;" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h2> Domains </h2>";
			echo "<table border='1'> ";
			echo "<tr>
					<th> Name </th>
					<th> URL </th>
					<th> Owner </th>
					<th> Plan </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["domainName"]. "</td>
					<td>".$row["url"]. "</td>
					<td>". $row["dOwner"]. "</td>
					<td>".$row["pType"]. "</td>
				</tr>";
			}
			echo "</table>";
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
