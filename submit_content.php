<!DOCTYPE html>
<html>
<head>
    <title>Add Content</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <div class="logo"><img src="53fd4227034133.5635f29c68d4f.png" alt="logo" width="50" height="50">
        </div>
        <nav>
            <ul>
                <li><a href="add_content.html">Add Content</a></li>
                <li><a href="view_content.php">View Content</a></li>
            </ul>
        </nav>
    </header>
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

// Function to sanitize user inputs
function sanitize_input($input)
{
    // Implement your input sanitization logic here
    return htmlspecialchars(trim($input));
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form data
    $title = sanitize_input($_POST["title"]);
    $content = sanitize_input($_POST["content"]);

    // Perform additional validation here as needed

    // Construct the SQL query to insert data into the database
    $sql = "INSERT INTO `inventory` (`title`, `content`) VALUES (?, ?)";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ss", $title, $content);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Data was successfully inserted
            echo "Content added successfully!";
        } else {
            // An error occurred while executing the statement
            echo "Error: " . mysqli_error($conn);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // An error occurred while preparing the statement
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<footer>&copy; 2023 Import&Export
    <br>
    All RIGHTS RESERVED!!
</footer>
</body>
</html>
