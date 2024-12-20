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
        $search = $_POST['search'] ?? '';
        if ($search) {
            $stmt = $conn->prepare("SELECT * FROM Role WHERE role LIKE ?");
            $search_term = "%" . htmlspecialchars($search) . "%";
            $stmt->bind_param("s", $search_term);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    echo "<table border='1'><tr><th>Role ID</th><th>Description</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . htmlspecialchars($row["castId"]) . "</td><td>" . htmlspecialchars($row["role"]) . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No results found.</p>";
                }
            } else {
                echo "<p>Error searching: " . htmlspecialchars($conn->error) . "</p>";
            }
            $stmt->close();
        }
        $conn->close();
        ?>
        <form method="post">
            Search Roles by Cast Id: <input type="text" name="search">
            <input type="submit" value="Search">
        </form>
    </body>
    </html>