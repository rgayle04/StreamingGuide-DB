<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Domains</title>
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
		$sqlUser="SELECT domainName, url, dOwner, plan.pType FROM domain, plan WHERE domain.pType = plan.pType;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Domain </h1>";
			echo " <table border='1'> ";
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
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
        //Close connection to the database
		$conn->close();
		?>
		<br>
		<form action="DomainInserts.php" method="POST">
			Enter the Name, URL, Owner and Plan of the new Domain: <br/> <br>
			Name: <input type='text' name='domainName' > <br/> <br>
			URL: <input type='text' name='url' > <br/> <br>
			Owner: <input type='text' name='dOwner' > <br/> <br>
			Plan: <input type="text" name="pType"> <br/> <br>
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
