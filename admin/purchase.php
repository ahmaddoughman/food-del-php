<?php include('../config/conn-database.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h3 {
            color: #333;
        }

        .dscrep {
            padding-top: 2px;
            text-transform: capitalize;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            max-width: 190px;
        }
    </style>
</head>

<body>

    <div class="container">

        <?php
        include("navbar.php");
        ?>

        <div class="home">

            <h2 class="home-title"> Purchase order</h2>

            <?php

            $sql = "SELECT shopping_cart.id AS cart_id, shopping_cart.user_id, users.name, users.email,
             users.mobile, shopping_cart.image_path, shopping_cart.price, shopping_cart.quantity,
              shopping_cart.description, shopping_cart.purchaseDate, shopping_cart.total_price
        FROM shopping_cart
        JOIN users ON shopping_cart.user_id = users.id
        ORDER BY users.id";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $currentUserEmail = null;
                $totalPrice = 0;

                while ($row = $result->fetch_assoc()) {
                    // Check if the email has changed
                    if ($row["email"] !== $currentUserEmail) {
                        // If it has, close the previous table (if any) and start a new one
                        if ($currentUserEmail !== null) {
                            echo '<tfoot>';
                            echo '<tr>';
                            echo '<th style="background : #ddd;"><h3 style="color : #000;">Total Price</h3></th>';
                            echo '<td colspan="5">' . $totalPrice . "$</td>"; // Output total price
                            echo '</tr>';
                            echo '</tfoot>';
                        }

                        // Output the header for the new table
                        echo '<table border="1" style="margin-top:10px">';
                        echo '<tr>';
                        echo '<th><h3>User ID: ' . $row["user_id"] . '</h3></th>';
                        echo '<th><h3>name: ' . $row["name"] . '</h3></th>';
                        echo '<th><h3>email: ' . $row["email"] . '</h3></th>';
                        echo '<th colspan="2"><h3>Mobile: ' . $row["mobile"] . '</h3></th>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<th>Image</th>';
                        echo '<th>Price</th>';
                        echo '<th>Description</th>';
                        echo '<th>Quantity</th>';
                        echo '<th>Purchase Date</th>';
                        echo '</tr>';

                        $currentUserEmail = $row["email"];
                        $totalPrice = 0; // Reset total price for the new user
                    }

                    // Output the data for the current row
                    echo '<tr>';
                    echo '<td><img src="../' . $row["image_path"] . '" alt="Product Image" style="width: 50px; height: 50px;"></td>';
                    echo '<td>' . $row["price"] . '$</td>';
                    echo '<td class="dscrep">' . $row["description"] . '</td>';
                    echo '<td>' . $row["quantity"] . '</td>';
                    echo '<td>' . $row["purchaseDate"] . '</td>';
                    echo '</tr>';

                    $totalPrice += $row["price"]; // Update total price for the current user
                }

                // Output the total price for the last user
                echo '<tfoot>';
                echo '<tr>';
                echo '<th style="background : #ddd;"><h3 style="color : #000;">Total Price</h3></th>';
                echo '<td colspan="5">' . $totalPrice . "$</td>"; // Output total price
                echo '</tr>';
                echo '</tfoot>';

                echo '</table>';
            } else {
                echo "Shopping cart is empty.";
            }

            $conn->close();
            ?>



        </div>
    </div>
</body>

<script src="assets/js/script.js"></script>

</html>