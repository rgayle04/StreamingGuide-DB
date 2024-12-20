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
            $search = $_POST['search'] ?? '';
            if ($search) {
                $stmt = $conn->prepare("SELECT * FROM mad WHERE adId LIKE ?");
                $search_term = "%" . htmlspecialchars($search) . "%";
                $stmt->bind_param("s", $search_term);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        echo "<table border='1'><tr><th>Ad ID</th><th>Media ID</th><th>Ad Count</th></tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . htmlspecialchars($row["adId"]) . "</td><td>" . htmlspecialchars($row["mediaId"]) . "</td><td>" . htmlspecialchars($row["adCount"]) . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No results found";
                    }
                } else {
                    echo "Error searching.";
                }
                $stmt->close();
            }
            $conn->close();
            ?>
        <form method="post">
            Search Media Ads by Id: <input type="text" name="search">
            <input type="submit" value="Search">
        </form>
        </body>
        </html>
