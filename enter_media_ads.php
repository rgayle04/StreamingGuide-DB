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
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $adId = trim($_POST['adId']);
                $mediaId = trim($_POST['mediaId']);
                $adCount = $_POST['adCount'] > 0 ? $_POST['adCount'] :0;

                if (!empty($adId) && !empty($mediaId) &&  is_numeric($adCount) ) {
                    $stmt = $conn->prepare("INSERT INTO mad (adId, mediaId, adCount) VALUES (?, ?, ?)");
                    $stmt->bind_param("ssi", $adId, $mediaId, $adCount);
                    if ($stmt->execute()) {
                        echo "New media ad added successfully!";
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Please ensure all fields are correctly filled and numeric fields contain numbers.";
                }
            }
            $conn->close();
            ?>
            <form method="post">
                Ad ID: <input type="text" name="adId"><br>
                Media ID: <input type="text" name="mediaId"><br>
                Ad Count: <input type="number" name="adCount"><br>
                <input type="submit" value="Submit">
            </form>
    </body>
        </html>