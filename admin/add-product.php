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
                        <select class="Categorsss" required>
                            <optgroup>
                                <option>T-shirts</option>
                                <option>Jeans</option>
                                <option>Shoes</option>
                                <option>Suits</option>
                            </optgroup>
                        </select>
                    </div>
                    <button type="submit" class="btn-add">Add</button>
                </form>

            </div>
        </div>
    </div>


    <script src="assets/js/script.js"></script>
</body>

</html>