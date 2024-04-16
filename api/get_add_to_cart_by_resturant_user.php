<?php
require_once('../database/db.php');
// Check if the required parameter (user_id) is provided
if (isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    // Fetch restaurant names with their corresponding menu items from the cart for the given user_id
    $sql = "SELECT r.restaurant_id, r.name AS restaurant_name, mi.item_id, mi.name, mi.description, c.total, c.quantity
            FROM cart c
            INNER JOIN menuitem mi ON c.item_id = mi.item_id
            INNER JOIN restaurant r ON mi.restaurant_id = r.restaurant_id
            WHERE c.user_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any restaurant names with menu items were found
    if ($result->num_rows > 0) {
        // Initialize an array to store restaurant data organized by restaurant_id
        $restaurantsWithMenuItems = array();

        // Iterate through the results
        while ($row = $result->fetch_assoc()) {
            $restaurantId = $row['restaurant_id'];
            $restaurantName = $row['restaurant_name'];
            $menuItem = array(
                'item_id' => $row['item_id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'total' => $row['total'],
                'quantity' => $row['quantity']
            );

            // Check if the restaurant ID already exists in the array
            if (!array_key_exists($restaurantId, $restaurantsWithMenuItems)) {
                // If not, create a new entry for the restaurant
                $restaurantsWithMenuItems[$restaurantId] = array(
                    'restaurant_id' => $restaurantId,
                    'restaurant_name' => $restaurantName,
                    'menu_items' => array()
                );
            }

            // Add the menu item to the corresponding restaurant
            $restaurantsWithMenuItems[$restaurantId]['menu_items'][] = $menuItem;
        }

        // Return the restaurant data with their menu items as JSON response
        echo json_encode($restaurantsWithMenuItems);
    } else {
        // No restaurant data with menu items found for the user
        echo json_encode(array("message" => "No restaurant data with menu items found in the cart for the user"));
    }
} else {
    // Required parameter not provided
    echo json_encode(array("error" => "Required parameter 'user_id' not provided"));
}


$conn->close();
?>