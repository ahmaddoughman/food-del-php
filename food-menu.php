<?php include('config/conn-database.php') ?>
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


    <div class="food-category">
        <div class="container">
            <a href="index.php#Menu" class="back"><i class="fa-solid fa-arrow-left"></i></a>
            <h1 class="title-category"></h1>
            <div class='pro'>
                <?php
                // 1. Get the ID of selected category
                $id = $_GET['id'];

                // 2. Create SQL Query to Get the Details 
                $sql = "SELECT * FROM product WHERE category_id=$id";
                // Execute the Query
                $result = mysqli_query($conn, $sql);

                // check whether the query is executed or not 
                if ($result == true) {


                    if ($result->num_rows > 0) {
                        // Get the Details
                        while ($row = $result->fetch_assoc()) {
                            $image_path = $row['image_path'];
                            $price = $row['price'];
                            $description = $row['description'];

                        echo "<div class='product'>
                                <img class='product-img' src='assets/image/$image_path' alt='Product Image'>
                                <div class='des'>
                                    <h5 class='product-title descriptionId'>$description</h5>
                                    <p class='product-price priceId'>$price$</p>
                                    <div class='btn-change'>
                                    <button type='button' onclick='handleButtonClick(this)' class='more-details' data-category-id='$id' >more details</button>

                                        <button class='CartBtn add-to-cart'>
                                            <span class='IconContainers'>
                                                <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 576 512' fill='rgb(17, 17, 17)' class='carts'>
                                                    <path d='M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z'></path>
                                                </svg>
                                            </span>
                                            <p class='texts'>Add to Cart</p>
                                        </button>
                                    </div>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<div style='color: white; font-size:20px'>no products found in this category</div>";
                    }
                } else {
                    // Redirect to home page
                    header('location:index.php');
                }
                ?>
                
            </div>
        </div>
    </div>


    <script src="assets/js/script.js"></script>
</body>

</html>