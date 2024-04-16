<?php
require_once('../database/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required parameters are provided
    if (isset($_POST['user_id']) && isset($_POST['restaurant_id']) && isset($_POST['total_amount']) && isset($_POST['delivery_address']) && isset($_POST['menu_items'])) {
        $userId = $_POST['user_id'];
        $restaurantId = $_POST['restaurant_id'];
        $totalAmount = $_POST['total_amount'];
        $deliveryAddress = $_POST['delivery_address'];
        $menuItems = json_decode($_POST['menu_items'], true); // Decode JSON string into associative array

        // Insert into orders table
        $stmt = $conn->prepare("INSERT INTO orders (user_id, restaurant_id, total_amount, delivery_address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiis", $userId, $restaurantId, $totalAmount, $deliveryAddress);

        if ($stmt->execute()) {
            // Get the order_id of the inserted order
            $orderId = $stmt->insert_id;

            // Prepare and execute insert statements for order_items
            $orderItemsStmt = $conn->prepare("INSERT INTO order_items (order_id, item_id, quantity) VALUES (?, ?, ?)");

            foreach ($menuItems as $menuItem) {
                $itemId = $menuItem['item_id'];
                $quantity = $menuItem['quantity'];
                
                $orderItemsStmt->bind_param("iii", $orderId, $itemId, $quantity);
                $orderItemsStmt->execute();
            }

            // Close the order items statement
            $orderItemsStmt->close();

            echo json_encode(array("message" => "Order placed successfully"));
        } else {
            echo json_encode(array("message" => "Failed to place order"));
        }

        $stmt->close();
    } else {
        echo json_encode(array("message" => "Required parameters are missing"));
    }
} else {
    echo json_encode(array("message" => "Invalid request method"));
}
?>
