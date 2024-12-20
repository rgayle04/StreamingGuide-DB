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
        $result = $conn->query("SELECT castId, role FROM Role");
        if ($result) {
            echo "<table border='1'><tr><th>Role ID</th><th>Description</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["castId"]) . "</td><td>" . htmlspecialchars($row["role"]) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Error: " . htmlspecialchars($conn->error) . "</p>";
        }
        $conn->close();
        ?>
    </body>
    </html>