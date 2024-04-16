<?php

require_once('../database/db.php');

// Check if the required parameters are set
if (isset($_POST['user_id'], $_POST['username'], $_POST['email'], $_POST['address'], $_POST['phone_number'])) {
    // Sanitize input data
    $user_id = intval($_POST['user_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

    // Update user information in the database
    $query = "UPDATE user SET username='$username', email='$email', address='$address', phone_number='$phone_number' WHERE user_id=$user_id";

    if (mysqli_query($conn, $query)) {
        echo json_encode(array('status' => 'success', 'message' => 'User information updated successfully'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to update user information'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Required parameters are missing'));
}
