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
                $userId = $_POST['userId'];
                $pType = $_POST['pType'];
                $subStartDate = $_POST['sub_Join_Date'];
                $subEndDate = $_POST['sub_Renew_Date'];

                if (!empty($userId) && !empty($pType) && !empty($subStartDate) && !empty($subEndDate)) {
                    $stmt = $conn->prepare("INSERT INTO Subscription (userId, pType, sub_Join_Date, sub_Renew_Date) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $userId, $pType, $subStartDate, $subEndDate);
                    if ($stmt->execute()) {
                        echo "New subscription added successfully!";
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "All fields are required.";
                }
                $conn->close();
            }
            ?>
            <form method="post">
                User ID: <input type="text" name="userId"><br>
                Plan Type (pType): <input type="text" name="pType"><br>
                Subscription Start Date: <input type="date" name="sub_Join_Date"><br>
                Subscription End Date: <input type="date" name="sub_Renew_Date"><br>
                <input type="submit" value="Submit">
            </form>
</body>
</html>