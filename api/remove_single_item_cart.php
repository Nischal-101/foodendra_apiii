<?php
require_once ('../database/db.php');

// Check if the required parameters are provided
if(isset($_POST['restaurant_id']) && isset($_POST['item_id'])) {
    $restaurantId = $_POST['restaurant_id'];
    $itemId = $_POST['item_id'];

    // Remove the specified item from the cart for the specified restaurant
    $stmt = $conn->prepare("DELETE FROM cart WHERE restaurant_id = ? AND item_id = ?");
    $stmt->bind_param("ii", $restaurantId, $itemId);
    $stmt->execute();

    // Check if any rows were affected
    if ($stmt->affected_rows > 0) {
        echo "Item removed from cart";
    } else {
        echo "No item found in the cart for the specified restaurant and item";
    }

    $stmt->close();
} else {
    echo "Required parameters not provided";
}

// Close the database connection
mysqli_close($conn);
?>