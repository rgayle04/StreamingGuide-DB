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
                include ('ConnectStreamingDB.php');
                $result = $conn->query("SELECT userId, pType, sub_Join_Date, sub_Renew_Date FROM Subscription");
                if ($result) {
                    echo "<table border='1'><tr><th>User ID</th><th>Plan Type</th><th>Start Date</th><th>End Date</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . htmlspecialchars($row["userId"]) . "</td><td>" . htmlspecialchars($row["pType"]) . "</td><td>" . htmlspecialchars($row["sub_Join_Date"]) . "</td><td>" . htmlspecialchars($row["sub_Renew_Date"]) . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Error: " . $conn->error;
                }
                $conn->close();
                ?>

            </body>
            </html>