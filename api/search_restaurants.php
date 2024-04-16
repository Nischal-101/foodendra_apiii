<?php
require_once('../database/db.php');

// Check if the search query parameter is set
if (isset($_GET['query'])) {
    // Retrieve the search query
    $query = '%' . $_GET['query'] . '%';

    // Prepare and execute the SQL query to search for restaurants
    $sql = "SELECT * FROM restaurant WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $query);
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        echo "Error: " . $stmt->error;
    } else {
        // Get the result set
        $result = $stmt->get_result();

        // Check if any restaurants were found
        if ($result->num_rows > 0) {
            // Initialize an empty array to store restaurants
            $restaurants = array();

            // Loop through each row in the result set
            while ($row = $result->fetch_assoc()) {
                // Add the current row to the restaurants array
                $restaurant = array(
                    'restaurant_id' => $row['restaurant_id'],
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'address' => $row['address'],
                    'phone_number' => $row['phone_number'],
                    'restaurant_image' => $row['restaurant_image']
                );
                array_push($restaurants, $restaurant);
            }

            // Return the restaurants as JSON
            echo json_encode($restaurants);
        } else {
            // No restaurants found, return an empty array as JSON
            echo json_encode(array());
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

} else {
    // Search query parameter not set, return an error message
    echo "Error: Search query parameter not set";
}
