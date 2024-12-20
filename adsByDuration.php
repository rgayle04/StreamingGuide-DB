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

                            $sql= "SELECT adName, duration FROM ad ORDER BY duration DESC";

                            $result = $conn->query($sql);

                            echo "<h2>Ad Duration</h2>";
                            if ($result && $result->num_rows > 0) { 
                                echo "<table border='1'>
                                        <tr>
                                            <th>Ad Name</th>
                                            <th>Duration</th>
                                        </tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$row['adName']}</td>
                                            <td>{$row['duration']}</td>
                                        </tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "<p>No ad records found.</p>";
                            }

                            $conn->close();
                            ?>
                    </body>
                    </html>