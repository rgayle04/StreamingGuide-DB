<!DOCTYPE html>
<html lang="en">
<head>
		<title>MAds</title>
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
            $result = $conn->query("SELECT adId, mediaId, adCount FROM mad");
            if ($result) {
                echo "<table border='1'><tr><th>Ad ID</th><th>Media ID</th><th>Ad Count</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . htmlspecialchars($row["adId"]) . "</td><td>" . htmlspecialchars($row["mediaId"]) . "</td><td>" . htmlspecialchars($row["adCount"]) . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
            ?>
            </body>
            </html>
