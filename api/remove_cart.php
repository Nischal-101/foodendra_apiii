<?php
require_once ('../database/db.php');

// Check if the required parameter is provided
if(isset($_POST['restaurant_id'])) {
    $restaurantId = $_POST['restaurant_id'];

    // Remove all items from the cart for the specified restaurant
    $stmt = $conn->prepare("DELETE FROM cart WHERE restaurant_id = ?");
    $stmt->bind_param("i", $restaurantId);
    $stmt->execute();

    // Check if any rows were affected
    if ($stmt->affected_rows > 0) {
        echo "Items removed from cart";
    } else {
        echo "No items found in the cart for the specified restaurant";
    }

    $stmt->close();
} else {
    echo "Required parameter not provided";
}

// Close the database connection
mysqli_close($conn);
?>
