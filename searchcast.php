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
            $stmt = $conn->prepare("SELECT * FROM Cast WHERE name LIKE ?");
            $search_term = "%" . $search . "%";
            $stmt->bind_param("s", $search_term);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    echo "<table border='1'><tr><th>Cast ID</th><th>Name</th><th>Age</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . htmlspecialchars($row["castId"]) . "</td><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["age"]) . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No results found";
                }
            } else {
                echo "Error searching: " . htmlspecialchars($conn->error);
            }
            $stmt->close();
        }
        $conn->close();
        ?>
        <form method="post">
            Search Cast by Name: <input type="text" name="search">
            <input type="submit" value="Search">
        </form>
    </body>
    </html>