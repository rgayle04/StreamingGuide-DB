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

                        $sql = "SELECT DISTINCT title FROM Media, serversPerMedia WHERE Media.mediaId = serversPerMedia.mediaId AND availabilityStatus LIKE '%Inac%'";

                        $result = $conn->query($sql);
                        echo "<h2>Media with inactive Servers</h2>";
                        if ($result->num_rows > 0) {
                            echo "<table border='1'><tr><th>Title</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>{$row['title']}</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No results found.";
                        }
                        $conn->close();
                        ?>
                    </body>
                    </html>