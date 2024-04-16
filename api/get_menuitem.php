<?php
require_once ('../database/db.php');

// Retrieve menu item data along with restaurant names and image paths from the database
$sql = "SELECT menuitem.*, restaurant.name AS restaurant_name, menuitem.food_image FROM menuitem INNER JOIN restaurant ON menuitem.restaurant_id = restaurant.restaurant_id";
$result = $conn->query($sql);

$menuItems = array();

// Check if there are any results
if ($result->num_rows > 0) {
    // Loop through each row and add it to the menuItems array
    while ($row = $result->fetch_assoc()) {
        $menuItem = array(
            'item_id' => $row['item_id'],
            'restaurant_id' => $row['restaurant_id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'restaurant_name' => $row['restaurant_name'],
            'food_image' => $row['food_image'] // Include food image path
        );
        array_push($menuItems, $menuItem);
    }
}

// Close database connection
$conn->close();

// Encode menuItems array into JSON format and return it
echo json_encode($menuItems);
?>
