<?php include('../config/conn-database.php') ?>
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

        // 1. Get the ID of selected category
        $id = $_GET['id'];

        // 2. Create SQL Query to Get the Details 
        $sql = "SELECT * FROM product WHERE id=$id";
        // Execute the Query
        $result = mysqli_query($conn, $sql);

        // check whether the query is executed or not 
        if ($result == true) {

            // check whether the data is available or not 
            $count = mysqli_num_rows($result);
            // check whether we have category or not
            if ($count == 1) {
                // Get the Details
                $row = mysqli_fetch_assoc($result);

                $price = $row['price'];
                $description = $row['description'];
            } else {
                // Redirect to home page
                header('location:view-products.php');
            }
        }
        ?>

        <div class="update-products">

            <div class='container_update'>
                <div id='back_arrows'>
                    <a href='view-products.php'><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                <h2 class='h2title'>Update Product</h2>
                <form method='post' action='' enctype="multipart/form-data">

                    <label for="" class="price">Price: </label>
                    <input type='text' name='new_price' value='<?php echo $price; ?>' class="txt-price"><br><br>

                    <label for="" class='description'> Description:</label>
                    <textarea name='new_description' title="" placeholder="" cols="40" rows="8" class="txt-description"><?php echo $description; ?></textarea><br><br>

                    <input type='hidden' name='id' value='<?php echo $id; ?>'>
                    <input type='submit' name='update_product' value='Update'>
                </form>
            </div>

        </div>

    </div>


    <?php
        if (isset($_POST['update_product'])) {
            $id = $_POST['id'];
            $price = $_POST['new_price'];
            $description = $_POST['new_description'];

            // Update category in the database
            $sql = "UPDATE product SET price = '$price', description = '$description' WHERE id='$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<script>
            showSweetAlert1("Update successful", "success");
            setTimeout(function() {
                window.location.href = "view-products.php";
            }, 1000); 
          </script>';
                exit();
            } else {
                echo '<script> showSweetAlert("Error updating product", "error"); </script>';
            }
        }
        ?>
</body>

</html>