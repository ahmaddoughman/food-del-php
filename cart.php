<?php include('config/conn-database.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body style="background: grey;">

    <div>
        <?php
        include("navbar.php");
        ?>
    </div>

    <div class="containers">
        <div class="cart-products">
            <div class="content-card">
                <h2>Cart</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="cartItems">

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"><strong>Total:</strong></td>
                            <td id="totalPrice">$0.00</td>
                            <td><button class="Clear-Cart" id="clearCartButton">Clear Cart</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align: right;">
                                <form method="post" action="your_purchase_handler.php" id="purchaseForm">
                                    <input type="hidden" name="user_id" value="<?php echo isset($_SESSION["user_info"]["id"]) ? $_SESSION["user_info"]["id"] : ''; ?>">
                                    <button id="purchaseButton" onclick="submitPurchaseForm()" type="button">Purchase</button>
                                </form>

                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <?php

    $loggedIn = (isset($_SESSION["login-user"]) && $_SESSION["login-user"] === true) ||
        (isset($_SESSION["sign-up-user"]) && $_SESSION["sign-up-user"] === true);
    ?>

    <script>
        function submitPurchaseForm() {
            // Assign the PHP boolean value to a JavaScript variable
            var loggedIn = <?php echo $loggedIn ? 'true' : 'false'; ?>;

            if (loggedIn) {

                const cartItems = JSON.parse(localStorage.getItem('cart1')) || [];

                const totalPriceElement = document.getElementById('totalPrice');
                const totalPrice = parseFloat(totalPriceElement.innerText.replace(/\$/g, ''));

                const purchaseData = cartItems.map(item => ({
                    image_path: item.image,
                    quantity: item.quantity || 1,
                    price: parseFloat(item.price.replace(/\$/g, '') * (item.quantity || 1)),
                    description: item.title,
                    total_price: totalPrice.toFixed(2) 
                }));

                const user_id = <?php echo isset($_SESSION["user_info"]["id"]) ? $_SESSION["user_info"]["id"] : 'null'; ?>;
                purchaseData.forEach(item => item.user_id = user_id);

                $.ajax({
                    type: "POST",
                    url: "purchase_handler.php",
                    data: {
                        purchaseData: purchaseData
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {

                            alert("Purchase successful");
                            clearCart()
                        } else {
                            alert("Purchase failed. " + response.message);
                        }
                    },
                    error: function() {
                        alert("Error processing the purchase request");
                    }
                });


            } else {
                var confirmPurchase = confirm("You are not logged in. Do you want to log in and proceed with the purchase?");
                if (confirmPurchase) {
                    // Redirect to the login page
                    window.location.href = "login.php";
                }
            }
        }
    </script>


    <script>
        function displayCartItems() {
            const cartItems = JSON.parse(localStorage.getItem('cart1')) || [];
            const cartItemsElement = document.getElementById('cartItems');
            cartItemsElement.innerHTML = '';

            let totalPrice = 0;

            cartItems.forEach(item => {
                const cartRow = document.createElement('tr');
                const quantity = item.quantity || 1; // Initial quantity

                const price = parseFloat(item.price.replace(/\$/g, ''));

                cartRow.innerHTML = `
            <td id="selectedImageCart"><img src="${item.image}" alt="${item.title}" style="width: 50px; height: 50px;"></td>
            <td class= "product-title selectedTitleCart">${item.title}</td>
            <td class=""selectedPriceCart>$${price.toFixed(2)}</td>
            <td>
                <button class="btttt btnplus" onclick="decrementQuantity(this)">-</button>
                <input type="number" value="${quantity}" min="1" onchange="updateTotalPriceForRow(this)">
                <button class="btttt btnplus" onclick="incrementQuantity(this)">+</button>
            </td>
            <td class="total-price" id="total_price">$${(price * quantity).toFixed(2)}</td>
            <td>
            <button class="bin-button btnRemoveRow" onclick="removeRow(this)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 39 7" class="bin-top">
                    <line stroke-width="4" stroke="white" y2="5" x2="39" y1="5"></line>
                    <line stroke-width="3" stroke="white" y2="1.5" x2="26.0357" y1="1.5" x1="12"></line>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 33 39" class="bin-bottom">
                    <mask fill="white" id="path-1-inside-1_8_19">
                        <path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"></path>
                    </mask>
                    <path mask="url(#path-1-inside-1_8_19)" fill="white" d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"></path>
                    <path stroke-width="4" stroke="white" d="M12 6L12 29"></path>
                    <path stroke-width="4" stroke="white" d="M21 6V29"></path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 89 80" class="garbage">
                    <path fill="white" d="M20.5 10.5L37.5 15.5L42.5 11.5L51.5 12.5L68.75 0L72 11.5L79.5 12.5H88.5L87 22L68.75 31.5L75.5066 25L86 26L87 35.5L77.5 48L70.5 49.5L80 50L77.5 71.5L63.5 58.5L53.5 68.5L65.5 70.5L45.5 73L35.5 79.5L28 67L16 63L12 51.5L0 48L16 25L22.5 17L20.5 10.5Z"></path>
                </svg>
            </button>
            </td>
        `;
                cartItemsElement.appendChild(cartRow);

                totalPrice += price * quantity;
            });

            const totalPriceElement = document.getElementById('totalPrice');
            totalPriceElement.innerText = `$${totalPrice.toFixed(2)}`;

        }

        function clearCart() {
            const cartItemsElement = document.getElementById('cartItems');
            cartItemsElement.innerHTML = ''; // Clear the table contents

            const totalPriceElement = document.getElementById('totalPrice');
            totalPriceElement.innerText = '$0.00'; // Reset the total price

            localStorage.removeItem('cart1'); // Remove 'cart' from localStorage
        }

        // Add a button or trigger that will call clearCart function
        const clearCartButton = document.getElementById('clearCartButton'); // Replace 'clearCartButton' with your button's ID
        clearCartButton.addEventListener('click', clearCart);

        function updateQuantityInLocalStorage(title, quantity) {
            const cartItems = JSON.parse(localStorage.getItem('cart1')) || [];
            const updatedCart = cartItems.map(item => {
                if (item.title === title) {
                    item.quantity = quantity;
                }
                return item;
            });

            localStorage.setItem('cart1', JSON.stringify(updatedCart));
        }

        function incrementQuantity(button) {
            const input = button.parentElement.querySelector('input');
            input.value = parseInt(input.value) + 1;
            updateTotalPriceForRow(input);
            updateTotalPrice();
            updateQuantityInLocalStorage(input.closest('tr').cells[1].innerText, parseInt(input.value));
        }

        function decrementQuantity(button) {
            const input = button.parentElement.querySelector('input');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateTotalPriceForRow(input);
                updateTotalPrice();
                updateQuantityInLocalStorage(input.closest('tr').cells[1].innerText, parseInt(input.value));
            }
        }

        function updateTotalPriceForRow(input) {
            const quantity = parseInt(input.value);
            const row = input.closest('tr');
            const price = parseFloat(row.cells[2].innerText.replace(/\$/g, ''));
            const totalCell = row.cells[4];
            const totalPrice = price * quantity;
            totalCell.innerText = `$${totalPrice.toFixed(2)}`;
        }

        function updateTotalPrice() {
            let totalPrice = 0;
            const cartItems = document.querySelectorAll('#cartItems tr');

            cartItems.forEach(row => {
                const price = parseFloat(row.cells[2].innerText.replace(/\$/g, ''));
                const quantity = parseInt(row.cells[3].querySelector('input').value);
                totalPrice += price * quantity;
            });

            const totalPriceElement = document.getElementById('totalPrice');
            totalPriceElement.innerText = `$${totalPrice.toFixed(2)}`;
        }

        function removeRow(button) {
            const row = button.closest('tr');
            const title = row.cells[1].innerText;
            const price = parseFloat(row.cells[2].innerText.replace(/\$/g, '')); // Parse the price to a number

            row.remove();
            updateTotalPrice();
            updateLocalStorage(title, price);
        }

        function updateLocalStorage(title, price) {
            const cartItems = JSON.parse(localStorage.getItem('cart1')) || [];
            const updatedCart = cartItems.filter(item => !(item.title === title && parseFloat(item.price.replace(/\$/g, '')) === price)); // Compare parsed prices

            localStorage.setItem('cart1', JSON.stringify(updatedCart));
        }


        displayCartItems(); // Initially display items on page load
    </script>
    <script src="assets/js/script.js"></script>
</body>

</html>