<?php

include('../config/conn-database.php');

$id = $_GET['id'];



$sql = "DELETE FROM category WHERE id = $id";

$result = mysqli_query($conn, $sql);

if ($result == true) {

    // Update IDs using MySQL variables for the specific table
    $update_ids_query = "SET @counter = 0";
    if ($conn->query($update_ids_query) === TRUE) {
        $update_ids_query = "UPDATE category SET id = @counter := @counter + 1";
        if ($conn->query($update_ids_query) === TRUE) {
            echo "IDs updated successfully";
        } else {
            echo "Error updating IDs: " . $conn->error;
        }
    } else {
        echo "Error resetting counter: " . $conn->error;
    }

    $_SESSION['delete-categoty'] = true;
    header('location: home.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
