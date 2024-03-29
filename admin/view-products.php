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

        <div class="view-products">

            <h2 class="product-title">Products</h2>

            <form action="" >
                <label for="" class="label-category"> Select Category</label>
                <select name="" id="" class="select_category">
                    <option value="">All</option>
                    <option value="">breakfast</option>
                    <option value="">dinner</option>
                </select>
            </form>

            <div class='pro'>
                <div class='product'>

                    <a href="update-product.php" id="editBtn"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" id="deleteBtn"><i class="fa-solid fa-circle-xmark"></i></a>

                    <img class='product-img' src="../assets/image/hero-slider-2.jpg" alt='Product Image'>
                    <div class='des'>
                        <h5>burger </h5>
                        <p >$15</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>