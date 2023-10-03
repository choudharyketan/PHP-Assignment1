<!DOCTYPE html>
<html>
<head>
    <title>View Content</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <div class="logo"><img src="53fd4227034133.5635f29c68d4f.png" alt="logo" width="50" height="50"></div>
        <nav>
            <ul>
                <li><a href="add_content.html">Add Content</a></li>
                <li><a href="view_content.php">View Content</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>View Content</h1>
        <div class="content">
            <?php
            // Include database connection configuration
            $db_host = "localhost";
            $db_user = "root";
            $db_password = "Shiv@123";
            $db_name = "system";

            $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

            // Check if the connection was successful
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Query to retrieve content from the database
            $sql = "SELECT title, content FROM inventory";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Check if there are rows in the result set
                if (mysqli_num_rows($result) > 0) {
                    // Output data from each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                        echo "<p>" . htmlspecialchars($row['content']) . "</p>";
                    }
                } else {
                    echo "No content available.";
                }
                
                // Free the result set
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </main>
    <footer>&copy; 2023 Import&Export
        <br>
    All RIGHTS RESERVED!!
    </footer>
</body>
</html>
