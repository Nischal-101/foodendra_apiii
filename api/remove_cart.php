<?php
require_once ('../database/db.php');

// Check if the required parameters are provided
if(isset($_POST['restaurant_id']) && isset($_POST['item_id'])) {
    $restaurantId = $_POST['restaurant_id'];
    $item_id = $_POST['item_id'];

    // Remove items from the cart for the specified user and restaurant
    $stmt = $conn->prepare("DELETE FROM cart WHERE restaurant_id = ? AND item_id = ?");
    $stmt->bind_param("ii", $restaurantId, $item_id);
    $stmt->execute();

    // Check if any rows were affected
    if ($stmt->affected_rows > 0) {
        echo "Items removed from cart";
    } else {
        echo "No items found in the cart for the specified user and restaurant";
    }

    $stmt->close();
} else {
    echo "Required parameters not provided";
}

// Close the database connection
mysqli_close($conn);
?>
