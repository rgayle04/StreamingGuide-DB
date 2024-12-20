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
            $result = $conn->query("SELECT castId, name, age FROM Cast");
            if ($result) {
                echo "<table border='1'><tr><th>Cast ID</th><th>Name</th><th>Age</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . htmlspecialchars($row["castId"]) . "</td><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["age"]) . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "Error: " . htmlspecialchars($conn->error);
            }
            $conn->close();
            ?>
            </body>
            </html>