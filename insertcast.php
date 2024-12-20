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
            $castId = $_POST['castId'];
            $name = $_POST['name'];
            $age = $_POST['age'];

            $stmt = $conn->prepare("INSERT INTO Cast (castId, name, age) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $castId, $name, $age);
            if ($stmt->execute()) {
                echo "New cast member added successfully!";
            } else {
                echo "Error: " . htmlspecialchars($stmt->error);
            }
            $stmt->close();
        }
        $conn->close();
        ?>
        <form method="post">
            Cast ID: <input type="text" name="castId"><br>
            Name: <input type="text" name="name"><br>
            Age: <input type="number" name="age"><br>
            <input type="submit" value="Submit">
        </form>
        
    </body>
    </html>