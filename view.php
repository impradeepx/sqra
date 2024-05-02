<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-info">
            <?php
            // Include database connection
            include 'session-file.php';
            
            // Check if user_id is provided in URL
            if (isset($_GET['username'])) {
                // Fetch user profile information from the database
                $username = $_GET['username'];
                $query = "SELECT * FROM users WHERE username = $username";
                $result = mysqli_query($con, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<p><strong>Name:</strong> " . $row['first_name'] . "</p>";
                    echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
                    // Add more profile fields as needed
                } else {
                    echo "User not found.";
                }
            } else {
                echo "User ID not provided.";
            }
            ?>
        </div>
    </div>
</body>
</html>
