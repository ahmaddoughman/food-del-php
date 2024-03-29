<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <div class="container">
        <?php
        include("navbar.php");
        ?>

        <div class="home">

            <h2 class="home-title">Category</h2>

            <div class="add-category">
                <div class="food-content">
                    <a href="update-category.php" id="editBtn"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" id="deleteBtn"><i class="fa-solid fa-circle-xmark"></i></a>

                    <h2>breakfast</h2>
                    <div class="img-container">
                        <img src="../assets/image/service-1.jpg" alt="">
                    </div>
                </div>
                <div class="food-content">
                    <a href="update-product.php" id="editBtn"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" id="deleteBtn"><i class="fa-solid fa-circle-xmark"></i></a>
                    <h2>dinner</h2>
                    <div class="img-container">
                        <img src="../assets/image/service-2.jpg" alt="">
                    </div>
                </div>
                <div class="food-content">
                    <a href="update-product.php" id="editBtn"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" id="deleteBtn"><i class="fa-solid fa-circle-xmark"></i></a>
                    <h2>title </h2>
                    <div class="img-container">
                        <img src="../assets/image/hero-slider-3.jpg" alt="">
                    </div>
                </div>
                <div class="food-content">
                    <a href="update-product.php" id="editBtn"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" id="deleteBtn"><i class="fa-solid fa-circle-xmark"></i></a>
                    <h2>title</h2>
                    <div class="img-container">
                        <img src="../assets/image/hero-slider-1.jpg" alt="">
                    </div>
                </div>
            </div>



            <div class="icon-category">
                <p id="show-add_category"><i class="fa-regular fa-plus"></i></p>
            </div>



            <!-- add Category -->

            <section id="add_Category">
                <div class="main">
                    <span id="closeBtn"><i class="fa-solid fa-circle-xmark"></i></span>
                    <h2>Add Category</h2>
                    <form action="" method="post" id="form">
                        <div>
                            <input type="file" id="fileInput" name="image" required>
                        </div>

                        <div>
                            <input type="text" placeholder="Title" id="title" required>
                        </div>

                        <button type="submit" class="btn-add">Add</button>
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