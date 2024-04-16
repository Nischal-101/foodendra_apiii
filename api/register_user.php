<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
require_once('../database/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $type = isset($_POST['type']) ? $_POST['type'] : 'restaurant'; // Set default value if type is not provided

    // Check if the email already exists in the database
    $checkEmailSql = "SELECT * FROM user WHERE email = '$email'";
    $emailResult = $conn->query($checkEmailSql);

    if ($emailResult->num_rows > 0) {
        $response = array(
            'status' => 'error',
            'message' => 'Email already exists'
        );
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement to insert the user into the database
        $insertSql = "INSERT INTO User (username, phone_number, email, address, password, type) VALUES ('$name','$phone','$email','$address', '$hashedPassword', '$type')";

        if ($conn->query($insertSql) === TRUE) {
            $response = array(
                'status' => 'success',
                'message' => 'User registered successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error registering user: ' . $conn->error
            );
        }
    }

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
