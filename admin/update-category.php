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

        <div class="update-category">

            <div class='container_update'>
                <div id='back_arrows'>
                    <a href='home.php'><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                <h2 class='h2title'>Update Category</h2>
                <form method='post' action=''>

                    <input type="file" id="fileInput" name="image">

                    <label for="" class="title">Title: </label>
                    <input type='text' name='new_title' value='dinner' class="txt-title"><br><br>

                    <input type='hidden' name='id' value='id'>
                    <input type='hidden' name='category' value='category'>

                    <input type='submit' name='update_product' value='Update'>
                </form>
            </div>

        </div>

    </div>
</body>

</html>