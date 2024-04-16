<?php
require_once('../database/db.php');

// Retrieve restaurant information along with ratings
$stmt = $conn->prepare("
    SELECT 
        r.restaurant_id, 
        r.name, 
        r.description, 
        r.address, 
        r.phone_number, 
        r.restaurant_image, 
        AVG(rt.rating_value) AS average_rating
    FROM 
        restaurant r
    LEFT JOIN 
        rating rt ON r.restaurant_id = rt.restaurant_id
    GROUP BY 
        r.restaurant_id, 
        r.name, 
        r.description, 
        r.address, 
        r.phone_number, 
        r.restaurant_image
");
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if any rows are returned
if ($result->num_rows > 0) {
    $restaurants = [];

    // Fetch restaurant data and store in an array
    while ($row = $result->fetch_assoc()) {
        $restaurants[] = [
            "id" => $row['restaurant_id'],
            "name" => $row['name'],
            "description" => $row['description'],
            "address" => $row['address'],
            "phone_number" => $row['phone_number'],
            "restaurant_image" => $row['restaurant_image'],
            "average_rating" => $row['average_rating'] != null ? floatval($row['average_rating']) : null // Convert average rating to float
        ];
    }

    // Return the restaurant data as JSON response
    header("HTTP/1.1 200 OK");
    header("Content-Type: application/json");
    echo json_encode($restaurants);
} else {
    // No restaurants found
    header("HTTP/1.1 404 Not Found");
    exit();
}
?>
