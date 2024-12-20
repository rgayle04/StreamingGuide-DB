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
            $result = $conn->query("SELECT adId, adName FROM Ad");
            if ($result) {
                echo "<select name='ad'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['adId'] . "'>" . htmlspecialchars($row['adName']) . "</option>";
                }
                echo "</select>";
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
            ?>
    </body>
    </html>