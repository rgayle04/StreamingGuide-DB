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

                        $sql = "SELECT userName FROM users, subscription WHERE users.userId = subscription.userId AND subscription.sub_Join_date LIKE '%2023%'";

                        $result = $conn->query($sql);
                        echo "<h2>User Count by Plan Type</h2>";
                        if ($result->num_rows > 0) {
                            echo "<table border='1'><tr><th>Plan Type</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>{$row['userName']}</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No results found.";
                        }
                        $conn->close();
                    ?>
</body>
</html>