<?php
require_once('../database/db.php');

// Check if the search query parameter is set
if (isset($_GET['query'])) {
    // Retrieve the search query
    $query = '%' . $_GET['query'] . '%';

    // Prepare and execute the SQL query to search for menu items
    $sql = "SELECT menuitem.*, restaurant.name AS restaurant_name 
            FROM menuitem 
            INNER JOIN restaurant ON menuitem.restaurant_id = restaurant.restaurant_id
            WHERE menuitem.name LIKE ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $query); // Change "ss" to "s"
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        echo "Error: " . $stmt->error;
    } else {
        // Get the result set
        $result = $stmt->get_result();

        // Check if any menu items were found
        if ($result->num_rows > 0) {
            // Initialize an empty array to store menu items
            $menuItems = array();

            // Loop through each row in the result set
            while ($row = $result->fetch_assoc()) {
                // Add the current row to the menu items array
                $menuItem = array(
                    'item_id' => $row['item_id'],
                    'restaurant_id' => $row['restaurant_id'],
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'price' => $row['price'],
                    'restaurant_name' => $row['restaurant_name'],
                    'food_image' => $row['food_image'] // Add food image path
                );
                array_push($menuItems, $menuItem);
            }

            // Return the menu items as JSON
            echo json_encode($menuItems);
        } else {
            // No menu items found, return an empty array as JSON
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
?>
