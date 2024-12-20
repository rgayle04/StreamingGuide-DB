<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get SPM</title>
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
		$sqlUser="SELECT availabilityStatus, domain.domainName, media.mediaId, title FROM domain, media, serverspermedia WHERE serverspermedia.domainName = domain.domainName AND serverspermedia.mediaId = media.mediaId" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Servers For Media </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Status </th>
					<th> Domain Name </th>
					<th> Media ID </th>
					<th> Title </th>
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["availabilityStatus"]. "</td>
					<td>".$row["domainName"]. "</td>
					<td>". $row["mediaId"]. "</td>
					<td>". $row["title"]. "</td>
				</tr>";
			
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
		<br>
		<form action="SPMInserts.php" method="POST">
			Enter the Status, Domain Name and Media ID for the Media's Server: <br/> <br>
			Status: <input type='radio' name='availabilityStatus' id="Actv" value="Actv">
			<label for="Actv">Actv</label>
			<input type='radio' name='availabilityStatus' id="Inac" value="Inac">
			<label for="Inac">Inac</label>  <br/> <br>
			Name: <input type='text' name='domainName' > <br/> <br>
			Media ID: <input type='text' name='mediaId' > <br/> <br>
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
