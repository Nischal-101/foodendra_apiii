<?php
// Include the database connection file
require_once('../database/db.php');

// Define API response array
$response = array();

// Retrieve order item data from the database with food names
$sql = "SELECT oi.food_item_id, mi.name AS food_name, oi.quantity, oi.subtotal 
        FROM orderitem oi 
        LEFT JOIN menuitem mi ON oi.food_item_id = mi.item_id";
$result = $conn->query($sql);

// Start HTML table
echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>Food Item ID</th>";
echo "<th>Food Name</th>";
echo "<th>Quantity</th>";
echo "<th>Subtotal</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Check if there are any results
if ($result->num_rows > 0) {
    // Loop through each row and add it to the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['food_item_id']}</td>";
        echo "<td>{$row['food_name']}</td>";
        echo "<td>{$row['quantity']}</td>";
        echo "<td>{$row['subtotal']}</td>";
        echo "</tr>";
    }
} else {
    // No order items found
    echo "<tr><td colspan='4'>No order items found</td></tr>";
}

// Close HTML table
echo "</tbody>";
echo "</table>";

// Close database connection
$conn->close();
?>
