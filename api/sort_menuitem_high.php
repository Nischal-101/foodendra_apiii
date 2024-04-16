<?php
// Include the database connection file
require_once('../database/db.php');

// Retrieve menu item data from the database ordered by price (descending) along with restaurant names
$sql = "SELECT menuitem.*, restaurant.name AS restaurant_name 
        FROM menuitem 
        INNER JOIN restaurant ON menuitem.restaurant_id = restaurant.restaurant_id 
        ORDER BY menuitem.price DESC";
$result = $conn->query($sql);

// Initialize an array to store menu items
$menuItems = array();

// Check if there are any results
if ($result->num_rows > 0) {
    // Loop through each row and add it to the menu items array
    while ($row = $result->fetch_assoc()) {
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
}

// Close database connection
$conn->close();

// Return menu items as JSON response
header('Content-Type: application/json');
echo json_encode($menuItems);
?>
