<?php
include('config/conn-database.php');


$user_info = $_SESSION["user_info"];
$user_id = $user_info['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $field = $_POST["field"];
    $value = $_POST["value"];

    $sql = "UPDATE users SET $field = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $value, $user_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Update successful"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error updating record: " . $conn->error]);
    }

    $stmt->close();
}

$conn->close();
?>
