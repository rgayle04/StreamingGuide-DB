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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $roleId = $_POST['castId'];
            $description = $_POST['role'];

            if (!empty($roleId) && !empty($description)) {
                $stmt = $conn->prepare("INSERT INTO Role (castId, role) VALUES (?, ?)");
                $stmt->bind_param("ss", $roleId, $description);
                if ($stmt->execute()) {
                    echo "<p>New role added successfully!</p>";
                } else {
                    echo "<p>Error: " . htmlspecialchars($stmt->error) . "</p>";
                }
                $stmt->close();
            } else {
                echo "<p>Please ensure all fields are filled out.</p>";
            }
            $conn->close();
        }
        ?>
        <form method="post">
            Cast ID: <input type="text" name="castId"><br>
            Role: <input type="text" name="role"><br>
            <input type="submit" value="Submit">
        </form>
    </body>
    </html>
