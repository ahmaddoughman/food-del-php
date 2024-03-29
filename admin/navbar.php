<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header id="header">
        <div class="icons-admin-profile">
            <img src="../assets/image/866781-fotor-bg-remover-2024022795950.png" alt="">
        </div>

        <nav>
            <ul>
                <a href="home.php"><li class="<?php echo basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : ''; ?>">Home</li></a>
                <a href="add-product.php"><li class="<?php echo basename($_SERVER['PHP_SELF']) == 'add-product.php' ? 'active' : ''; ?>">Add Products</li></a>
                <a href="view-products.php"><li class="<?php echo basename($_SERVER['PHP_SELF']) == 'view-products.php' ? 'active' : ''; ?>">View Products</li></a>
                <a href="customers.php"><li class="<?php echo basename($_SERVER['PHP_SELF']) == 'customers.php' ? 'active' : ''; ?>">Customers</li></a>
                <a href="purchase.php"><li class="<?php echo basename($_SERVER['PHP_SELF']) == 'purchase.php' ? 'active' : ''; ?>">Purchase</li></a>
                <a href="setting.php"><li class="<?php echo basename($_SERVER['PHP_SELF']) == 'setting.php' ? 'active' : ''; ?>">Setting</li></a>
            </ul>
        </nav>
              
    </header>


    <script src="assets/js/script.js"></script>
</body>

</html>