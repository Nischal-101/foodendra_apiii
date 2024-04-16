<?php
require_once('../database/db.php');

// Define API response array
$response = array();

// Retrieve user data from the database based on user_id 4
$sql = "SELECT * FROM user WHERE user_id = 4";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Loop through each row and add it to the response array
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    // Return JSON response
    echo json_encode($response);
} else {
    // No user found with ID 4
    echo "No user found with ID: 4";
}

// Close database connection
$conn->close();
?>
