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
		$sqlPlan="SELECT pType, Price, Mem_Amt   FROM plan;" ;
		//Execute query
		$result = $conn->query($sqlPlan) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h1> Plan </h1>";
			echo " <table border='1'> ";
			echo "<tr>
					<th> Plan Type </th>
					<th> Price </th>
					<th> Amount of Members </th>
					
					
				</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>".$row["pType"]. "</td>
					<td>".$row["Price"]. "</td>
					<td>".$row["Mem_Amt"]. "</td>
					

					
				</tr>";

				
			
			}
			echo " </table> ";
		} else {
				echo "0 results";
		}
		
		$conn->close();
		?>
		<br>
		<form action="PlanInsert.php" method="POST">
			Enter the Plan Type Price and Member Amount of the new Plan: <br/> <br>
			Plan Type: <input type='text' name='pType' > <br/> <br>
			Price: <input type='text' name='Price' > <br/> <br>
			Member AMount: <input type='text' name='Mem_Amt' > <br/> <br>
			
			<input type='submit'>
			<input type='reset'>
		</form>


	</body>
</html>
