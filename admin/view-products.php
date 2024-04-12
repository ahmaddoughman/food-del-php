<?php
include('../config/conn-database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["category_id"])) {
    $category_id = $_POST["category_id"];
    $sql = "SELECT * FROM product";
    if (!empty($category_id)) {
        $sql .= " WHERE category_id = $category_id";
    }
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product'>";
            // Your product display code here
            echo "<a href='update-product.php?id=" . $row['id'] . "' id='editBtn'>
                    <i class='fa-solid fa-pen-to-square'></i>
                </a>

                <a href='#?id=" . $row['id'] . "' id='deleteBtn'>
                    <i class='fa-solid fa-circle-xmark'></i>
                </a>";

            echo "<img class='product-img' src='../assets/image/" . $row['image_path'] . "' alt='Product Image'>
                <div class='des'>
                    <h5>" . $row['description'] . " </h5>
                    <p>" . $row['price'] . "</p>
                </div>";
            echo "</div>";
        }
    } else {
        echo "No products found for the selected category";
    }
    mysqli_close($conn);
    exit; // Stop further execution after sending AJAX response
}
?>

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

        if (isset($_SESSION['delete-product'])) {

            echo '<script> showSweetAlert1("Delete Successfully", "success"); </script>';

            unset($_SESSION['delete-product']);
        }
        ?>

        <div class="view-products">

            <h2 class="product-title">Products</h2>

            <label for="" class="label-category"> Select Category</label>
            <select name="category_id" id="categorySelect" class="select_category">
                <option value="">All</option>
                <?php
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $category_id = $row['id'];
                        $category_title = $row['title_category'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                } else {
                    echo "<option>No categories found</option>";
                }
                mysqli_free_result($result);
                ?>
            </select>

            <div class='pro' id="productContainer">
                <!-- Product list will be dynamically updated here -->
                <?php

                $sql1 = "SELECT * FROM product";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<a href='update-product.php?id=" . $row['id'] . "' id='editBtn'>
                                 <i class='fa-solid fa-pen-to-square'></i>
                              </a>

                            <a href='delete-product.php?id=" . $row['id'] . "' id='deleteBtn'>
                                <i class='fa-solid fa-circle-xmark'></i>
                            </a>";

                        echo "<img class='product-img' src='../assets/image/" . $row['image_path'] . "' alt='Product Image'>
                                <div class='des'>
                                    <h5>" . $row['description'] . " </h5>
                                    <p>" . $row['price'] . '$'. "</p>
                                </div>";
                        echo "</div>";
                    }
                } else {
                    echo "No products found for the selected category";
                }
                ?>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('categorySelect').addEventListener('change', function() {
            var categoryId = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('productContainer').innerHTML = xhr.responseText;
                }
            };
            xhr.send('category_id=' + categoryId);
        });
    </script>

</body>

</html>