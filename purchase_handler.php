<?php
include('config/conn-database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Extract purchaseData from the POST request
    if (isset($_SESSION["user_info"]["id"])) {

        $user_id = $_SESSION["user_info"]["id"];

        $purchaseData = isset($_POST['purchaseData']) ? $_POST['purchaseData'] : [];

        // Insert each item in purchaseData into shopping_cart table
        foreach ($purchaseData as $item) {
            $image_path = $item['image_path'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $description = $item['description'];
            $total_price = $item['total_price'];

            // Insert data into shopping_cart table
            $creation_date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO shopping_cart (user_id, image_path, price, quantity, description, purchaseDate, total_price) VALUES ('$user_id', '$image_path', '$price', '$quantity', '$description', '$creation_date', '$total_price')";

            if ($conn->query($sql) !== TRUE) {
                // Purchase failed for an item
                $response = array("success" => false, "message" => "Purchase failed for an item: " . $conn->error);
                break;
            }
        }

        if (!isset($response)) {
            // All items inserted successfully
            $response = array("success" => true, "message" => "Purchase successful!");
        }

        // Close the database connection
        $conn->close();
    } else {
        // User not logged in
        $response = array("success" => false, "message" => "User not logged in.");
    }
} else {
    // Invalid request method
    $response = array("success" => false, "message" => "Invalid request method.");
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
