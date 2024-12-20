<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit User Plan</title>
		<link rel="stylesheet" type="text/css" href="321AStyle.css">
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		include ("ConnectStreamingDB.php");

		$userID=$_POST["userID"];
		//Create query
		$sqlUser="SELECT users.userID, userName, pType FROM users, subscription WHERE users.userID= '$userID' AND users.userID = subscription.userID ;" ;
		//Execute query
		$result = $conn->query($sqlUser) or die('Could not run query: '.$conn->error);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<h3> User </h3>";
			while($row = $result->fetch_assoc()) {
				echo "<form action='3EditUser.php'>";
				echo "ID <input type='text' name=userID value=".$userID." readonly > <br>";
				echo "Username <input type='text' name=userName value=".$row["userName"]. " readonly > <br>";
				echo "Plan Type <input type='text' name=pType value=".$row["pType"]. " > <br>"; 
				echo "<input type='submit'>";
				echo "<input type='reset'>";
			    echo "</form>";
			}
		} else {
				echo "0 results";
		}
		$conn->close();

		?>
	</body>
</html>
