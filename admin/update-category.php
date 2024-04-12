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

    <style>
        /* Style the file input field to look like a text input field */
        .file-input {
            display: inline-block;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #fff;
        }

        .file-input input[type="file"] {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        include("navbar.php");

        // 1. Get the ID of selected category
        $id = $_GET['id'];

        // 2. Create SQL Query to Get the Details 
        $sql = "SELECT * FROM category WHERE id=$id";
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

                $imagePath = $row['image_path'];
                $imageName = basename($imagePath); // Get the filename from the image path
                $title_category = $row['title_category'];
            } else {
                // Redirect to home page
                header('location:home.php');
            }
        }
        ?>

        <div class="update-category">

            <div class='container_update'>
                <div id='back_arrows'>
                    <a href='home.php'><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                <h2 class='h2title'>Update Category</h2>
                <form method='post' action='' enctype="multipart/form-data">

                    <label for="fileInput" class="file-input">
                        <span id="fileName"><?php echo $imageName; ?></span>
                        <input type="file" id="fileInput" name="image" style="display: none;" onchange="updateFileName()">
                    </label>

                    <label for="" class="title">Title: </label>
                    <input type='text' name='new_title' value='<?php echo $title_category; ?>' class="txt-title"><br><br>

                    <input type='hidden' name='id' value='<?php echo $id ?>'>
                    <input type='submit' name='update_product' value='Update'>
                </form>
            </div>

        </div>

        <?php
        if (isset($_POST['update_product'])) {
            $id = $_POST['id'];
            $new_title = $_POST['new_title'];
            $image = $imageName; // Default to the existing image path

            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES["image"]["name"];
                $imagePath = $_FILES["image"]["tmp_name"];

                // Specify the destination directory
                $upload_directory = "../assets/image/";

                // Move the uploaded image to the desired location
                if (move_uploaded_file($imagePath, $upload_directory . $image)) {
                    // Update image path in the database
                    $image_path_update = $image; // Only store the file name, not the full path
                } else {
                    echo '<script> showSweetAlert("Error uploading image", "error"); </script>';
                    exit();
                }
            } else {
                // If no new image is uploaded, retain the existing image file name
                $image_path_update =  $image;
            }

            // Update category in the database
            $sql = "UPDATE category SET image_path = '$image_path_update', title_category = '$new_title' WHERE id='$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<script>
            showSweetAlert1("Update successful", "success");
            setTimeout(function() {
                window.location.href = "home.php";
            }, 1000); 
          </script>';
                exit();
            } else {
                echo '<script> showSweetAlert("Error updating category", "error"); </script>';
            }
        }
        ?>


    </div>

    <script>
        function updateFileName() {
            var fileInput = document.getElementById('fileInput');
            var fileNameSpan = document.getElementById('fileName');
            if (fileInput.files.length > 0) {
                fileNameSpan.textContent = fileInput.files[0].name;
            } else {
                fileNameSpan.textContent = '<?php echo $imageName; ?>'; // Restore original filename if no file is selected
            }
        }
    </script>
</body>

</html>