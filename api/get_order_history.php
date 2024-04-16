<?php
require_once('../database/db.php');

// $user_id = $_GET['user_id'];

// // Query to fetch order history for the user
// $query = "SELECT oi.order_item_id, mi.name AS item_name, oi.quantity, oi.quantity * mi.price AS total_price, o.order_date
//           FROM order_items oi
//           JOIN menuitem mi ON oi.item_id = mi.item_id
//           JOIN orders o ON oi.order_id = o.order_id
//           WHERE o.user_id = $user_id
//           ORDER BY o.order_date DESC";

// $result = $conn->query($query);

// $response = array();

// if ($result) {
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             $response[] = array(
//                 "order_item_id" => $row["order_item_id"],
//                 "item_name" => $row["item_name"],
//                 "quantity" => $row["quantity"],
//                 "total_price" => $row["total_price"],
//                 "order_date" => $row["order_date"]
//             );
//         }
//     } else {
//         $response["message"] = "No orders found for this user.";
//     }
// } else {
//     $response["error"] = mysqli_error($conn);
// }

// // Convert the response array to JSON format
// echo json_encode($response);

require_once('../database/db.php');

// Check if 'user_id' is set
if(isset($_GET['user_id'])) {
    // Sanitize input
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    // Query to fetch order history for the user
    $query = "SELECT oi.order_item_id, mi.name AS item_name, oi.quantity, oi.quantity * mi.price AS total_price, o.order_date
              FROM order_items oi
              JOIN menuitem mi ON oi.item_id = mi.item_id
              JOIN orders o ON oi.order_id = o.order_id
              WHERE o.user_id = $user_id
              ORDER BY o.order_date DESC";

    $result = $conn->query($query);

    $response = array();

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $response[] = array(
                    "order_item_id" => $row["order_item_id"],
                    "item_name" => $row["item_name"],
                    "quantity" => $row["quantity"],
                    "total_price" => $row["total_price"],
                    "order_date" => $row["order_date"]
                );
            }
        } else {
            $response["message"] = "No orders found for this user.";
        }
    } else {
        $response["error"] = mysqli_error($conn);
    }

    // Convert the response array to JSON format
    echo json_encode($response);
} else {
    // Handle case where 'user_id' is not set
    $response["error"] = "user_id parameter is missing";
    echo json_encode($response);
}


