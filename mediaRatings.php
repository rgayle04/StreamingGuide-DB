<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Get Episodes</title>
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
                        include("ConnectStreamingDB.php");

                        $sql = "SELECT title, rating FROM Media WHERE rating > (SELECT AVG(rating) FROM Media)";

                        $result = $conn->query($sql);
                        echo "<h2> Above Average Ratings</h2>";
                        if ($result->num_rows > 0) {
                            echo "<table border='1'><tr><th>Title</th><th>Rating</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>{$row['title']}</td><td>{$row['rating']}</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No results found.";
                        }
                        $conn->close();
                    ?>
    </body>
    </html>