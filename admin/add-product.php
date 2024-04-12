<?php include('../config/conn-database.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSweetAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
            });
        }

        function showSweetAlert1(message, icon) {
            Swal.fire({
                icon: icon,
                title: 'Notification',
                text: message,
            });
        }
    </script>
</head>

<body>

    <div class="container">
        <?php
        include("navbar.php");
        ?>

        <div class="add_products">
            <div class="main">

                <h1>Add Products</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="file_image">
                        <input type="file" id="fileInput" name="image" required>
                    </div>
                    <input type="text" name="price" id="price" placeholder="Price" required>
                    <textarea class="textarea" placeholder="Description" name="description" id="description" cols="30" rows="10" required></textarea>
                    <div>
                        <select name="category_id" class="Categorsss" required>
                            <optgroup label="Select Category">
                                <?php
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    // Check if there are rows returned
                                    if (mysqli_num_rows($result) > 0) {
                                        // Loop through each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $category_id = $row['id'];
                                            $category_title = $row['title_category'];
                                            // Output an option for each category
                                            echo "<option value='$category_id'>$category_title</option>";
                                        }
                                    } else {
                                        echo "<option>No categories found</option>";
                                    }
                                    // Free the result set
                                    mysqli_free_result($result);
                                } else {
                                    echo "<option>Error executing query: " . mysqli_error($conn) . "</option>";
                                }
                                ?>
                            </optgroup>
                        </select>

                    </div>
                    <button type="submit" name="add-products" class="btn-add">Add</button>
                </form>

            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['add-products'])) {
        $imagePath = $_FILES["image"]["name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $category_id = $_POST["category_id"];

        $resetAutoIncrementSQL = "ALTER TABLE product AUTO_INCREMENT = 1";
        $conn->query($resetAutoIncrementSQL);

        $sql = "INSERT INTO product (image_path, price, description, category_id) VALUES ('$imagePath', '$price', '$description', '$category_id')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script> showSweetAlert1("Add Product Successfully", "success")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    // Close the connection 
    $conn->close();
    ?>


    <script src="assets/js/script.js"></script>
</body>

</html>