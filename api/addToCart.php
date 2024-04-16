<?php
require_once ('../database/db.php');

// Check if the required parameters are provided
if(isset($_POST['user_id']) && isset($_POST['restaurant_id']) && isset($_POST['item_id']) && isset($_POST['quantity']) && isset($_POST['total'])) {
    $userId = $_POST['user_id'];
    $restaurantId = $_POST['restaurant_id'];
    $itemId = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];

    // Add item to the cart
    $stmt = $conn->prepare("INSERT INTO cart (user_id, restaurant_id, item_id, quantity, total) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiidd", $userId, $restaurantId, $itemId, $quantity, $total);
    $stmt->execute();
    $stmt->close();
    
    echo "Item added to cart";
} else {
    echo "Required parameters not provided";
}
