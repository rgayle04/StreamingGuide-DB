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

                        
                        $sql = "SELECT COUNT(*) AS userCount, subscription.pType 
                                FROM subscription 
                                GROUP BY subscription.pType";

                        $result = $conn->query($sql);

                        echo "<h2>User Count by Plan Type</h2>";
                        if ($result && $result->num_rows > 0) { 
                            echo "<table border='1'><tr><th>Plan Type</th><th>User Count</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>{$row['pType']}</td><td>{$row['userCount']}</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<p>No results found.</p>";
                        }

                        
                        $conn->close();
                        ?>

                    </body>
</html>