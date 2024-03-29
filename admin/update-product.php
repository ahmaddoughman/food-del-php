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

        <div class="update-products">

            <div class='container_update'>
                <div id='back_arrows'>
                    <a href='view-products.php'><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                <h2 class='h2title'>Update Product</h2>
                <form method='post' action=''>

                    <label for="" class="price">Price: </label>
                    <input type='text' name='new_price' value='$11' class="txt-price"><br><br>

                    <label for="" class='description'> Description:</label>
                    <textarea name='new_description' placeholder="Description" cols="40" rows="8" class="txt-description"></textarea><br><br>

                    <input type='hidden' name='id' value='id'>
                    <input type='hidden' name='category' value='category'>

                    <input type='submit' name='update_product' value='Update'>
                </form>
            </div>

        </div>

    </div>
</body>

</html>