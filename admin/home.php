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



        if (isset($_SESSION['added-category'])) {

            echo '<script> showSweetAlert1("Added Successfully", "success"); </script>';

            unset($_SESSION['added-category']);
        }
        else if (isset($_SESSION['delete-categoty'])) {

            echo '<script> showSweetAlert1("Delete Successfully", "success"); </script>';

            unset($_SESSION['delete-categoty']);
        }

        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);

        ?>

        <div class="home">

            <h2 class="home-title">Category</h2>

            <div class="add-category">

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='food-content'>";
                            echo "<a href='update-category.php?id=" . $row['id'] . "' id='editBtn'>
                                    <i class='fa-solid fa-pen-to-square'></i>
                                  </a>

                                  <a href='delete-category.php?id=" . $row['id'] . "' id='deleteBtn'>
                                    <i class='fa-solid fa-circle-xmark'></i>
                                  </a>";

                            echo "<h2> " . $row['title_category'] . " </h2>
                                  <div class='img-container'>
                                      <img src='../assets/image/" . $row['image_path'] . "'  alt='img'>
                                  </div>";
                        echo "</div>";
                    }
                } else {
                    echo "No category found";
                }

                $conn->close();
                ?>

            </div>



            <div class="icon-category">
                <p id="show-add_category"><i class="fa-regular fa-plus"></i></p>
            </div>



            <!-- add Category -->

            <section id="add_Category">
                <div class="main">
                    <span id="closeBtn"><i class="fa-solid fa-circle-xmark"></i></span>
                    <h2>Add Category</h2>
                    <form action="add-category.php" method="post" id="form" enctype="multipart/form-data">
                        <div>
                            <input type="file" id="fileInput" name="image" required>
                        </div>

                        <div>
                            <input type="text" placeholder="Title" id="title" name="title_category" required>
                        </div>

                        <button type="submit" name="add-category" class="btn-add">Add</button>
                    </form>
                </div>
            </section>

        </div>
    </div>


    <script>
        var closeBtn = document.getElementById('closeBtn');
        var addCategorySection = document.getElementById('add_Category');

        closeBtn.addEventListener('click', function() {
            addCategorySection.style.display = 'none';
        });

        var showAddCategory = document.getElementById('show-add_category');
        showAddCategory.addEventListener('click', function() {
            addCategorySection.style.display = 'flex';
        });
    </script>

    <script src="assets/js/script.js"></script>

</body>

</html>