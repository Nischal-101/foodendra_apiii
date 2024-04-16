<?php
// Database connection
require_once ('../database/db.php');
// Define API response array
$response = array();

// Retrieve recommended restaurants based on average ratings
$sql = "SELECT r.restaurant_id, r.name AS restaurant_name,r.address AS restaurant_address,r.description AS restaurant_description, r.restaurant_image, AVG(rt.rating_value) AS avg_rating
        FROM restaurant r
        LEFT JOIN rating rt ON r.restaurant_id = rt.restaurant_id
        GROUP BY r.restaurant_id
        ORDER BY avg_rating DESC";

$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Loop through each row and add it to the response array
    while ($row = $result->fetch_assoc()) {
        // Convert avg_rating to float
        $avg_rating = number_format(floatval($row['avg_rating']), 1);
        $response[] = array(
            'restaurant_id' => $row['restaurant_id'],
            'restaurant_name' => $row['restaurant_name'],
            'avg_rating' => $avg_rating,
            'restaurant_address' => $row['restaurant_address'],
            'restaurant_description' => $row['restaurant_description'],
            'restaurant_image' => $row['restaurant_image']

        );
    }
} else {
    // No restaurants found
    $response['error'] = 'No recommended restaurants found';
}

// Close database connection
$conn->close();

// Encode the response array to JSON format and return
echo json_encode($response);