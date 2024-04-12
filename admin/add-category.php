<?php

include('../config/conn-database.php');

if (isset($_POST['add-category'])) {
    $imagePath = $_FILES["image"]["name"];
    $title_category = $_POST["title_category"];

    $resetAutoIncrementSQL = "ALTER TABLE category AUTO_INCREMENT = 1";
    $conn->query($resetAutoIncrementSQL);

    $sql = "INSERT INTO category (image_path, title_category) VALUES ('$imagePath', '$title_category')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['added-category'] = true;
        header('location: home.php');
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
 
?>


