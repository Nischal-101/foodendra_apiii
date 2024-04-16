<?php
// for admin
// Include the database connection file
require_once('../database/db.php');

// Define API response array
$response = array();

// Retrieve orders details from the database
$sql = "SELECT o.order_id, u.username AS user_name, r.name AS restaurant_name, 
               o.order_date, o.delivery_address AS address, o.status
        FROM orders o
        INNER JOIN user u ON o.user_id = u.user_id
        INNER JOIN restaurant r ON o.restaurant_id = r.restaurant_id";

$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Loop through each row and add it to the response array
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
} else {
    // No orders found
    $response['message'] = "No orders found";
}

// Close database connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
