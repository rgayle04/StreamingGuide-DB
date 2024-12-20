<!DOCTYPE html>
<html lang="en">
<head>
		<title>Servers</title>
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

		$domainName=$_POST["domainName"];
		$mediaId=$_POST["mediaId"];

		//Create query
		$sqlEmp="SELECT availabilityStatus, domain.domainName, media.mediaId, title FROM domain, media, serverspermedia WHERE domain.domainName = '$domainName' AND media.mediaId = '$mediaId' AND serverspermedia.domainName = domain.domainName AND serverspermedia.mediaId = media.mediaId" ;
		//Execute query
		$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h2> SPM </h2>";
			echo "<table border='1'> ";
			echo "<tr>
					
					<th> Status </th>
					<th> Domain ID </th>
                    <th> Media ID </th>
					<th> Title </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>".
							"<td>". $row["availabilityStatus"]. "</td>".
                            "<td>". $row["domainName"]. "</td>".
                            "<td>". $row["mediaId"]. "</td>".
							"<td>". $row["title"]."</td>".
							
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