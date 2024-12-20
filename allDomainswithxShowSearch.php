<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User</title>
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

		$mediaId=$_POST["mediaId"];
		$sqlUser="SELECT Domain.domainName FROM Domain JOIN serversPerMedia ON Domain.domainName = serversPerMedia.domainName WHERE serversPerMedia.mediaId = '$mediaId';" ;
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {

			echo "<h2> Domains </h2>";
			echo "<table border='1'> ";
			echo "<tr>
					<th> Name </th>
				</tr>";
			
			while($row = $result->fetch_assoc()) {
			echo "<tr>".
						"<td>".$row["domainName"]."</td>".
				"</tr>";
			}
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
