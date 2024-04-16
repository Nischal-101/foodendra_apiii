<?php
require_once('../database/db.php');


// Define API response array
$response = array();

// Retrieve restaurant data from the database
$sql = "SELECT * FROM restaurant";
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
    // No restaurants found
    echo "No restaurants found";
}

// Close database connection
$conn->close();
?>
