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

    <div class="products-food">
        <section class="container">
            <div class="prodetails product">
                <a href="food-menu.php" class="back"><i class="fa-solid fa-arrow-left"></i></a>
                <div class="single-pro-image">
                    <div id="selectedImageContainer"></div>
                </div>
                <div class="single-pro-details">
                    <h1>Food Detail's</h1>

                    <div style="display:flex">
                        <div style="font-size: 35px; font-weight:550">Price:</div>
                        <h3 class="product-price" id="selectedPriceContainer"></h3>
                    </div>
                    <select>
                        <option>small</option>
                        <option>medium</option>
                        <option>large</option>
                    </select>

                    <div class="btn-card add-to-cart">
                        <button class='CartBtn'>
                            <span class='IconContainers'>
                                <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 576 512' fill='rgb(17, 17, 17)' class='carts'>
                                    <path d='M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z'></path>
                                </svg>
                            </span>
                            <p class='texts'>Add to Cart</p>
                        </button>
                    </div>
                    <h2>Description</h2>

                    <p class="product-title" id="selectedDescContainer"></p>

                </div>
            </div>
        </section>
    </div>


    <script src="assets/js/script.js"></script>
</body>

</html>