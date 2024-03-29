// page navbar.php start

window.addEventListener('scroll', function() {
    var header = document.getElementById('header');
    if (window.scrollY > 20) {
        header.classList.add('fixed');
    } else {
        header.classList.remove('fixed');
    }
});

let listItems = document.querySelectorAll("li");
listItems.forEach((item) => {
    item.onclick = function () {
        listItems.forEach((otherItem) => {
        if (otherItem !== item) {
            otherItem.classList.remove("active");
            otherItem.style.color = "";
        }
        });
        item.classList.add("active");
        item.style.color = "#FCB53B";
    };
});



// back to top

var backTopBtn = document.getElementById("backTop");
window.addEventListener("scroll", function() {
    if (window.scrollY > 300) { // Adjust the value as needed
        backTopBtn.style.display = "block";
    } else {
        backTopBtn.style.display = "none";
    }
});



// page navbar.php end




// page food-menu.php start

function handleButtonClick(button) {
    var productDiv = button.closest('.product'); 
    var priceText = productDiv.querySelector('.priceId').textContent;
    var descriptionText = productDiv.querySelector('.descriptionId').textContent;
    var imageSource = productDiv.querySelector('img').src;

    selectImageAndPrice(imageSource, priceText, descriptionText);
    moveToPage2();
}

function selectImageAndPrice(imageSource, price, desc) {
    sessionStorage.setItem('selectedImage', imageSource);
    sessionStorage.setItem('selectedPrice', price);
    sessionStorage.setItem('selectedDesc', desc);
}

function moveToPage2() {
    window.location.href = 'product.php';
}

// page food-menu.php end



// page product.php start

window.onload = function () {
    // Check if the current page is product.php
    if (window.location.pathname.endsWith('product.php')) {
        var selectedImage = sessionStorage.getItem('selectedImage');
        var selectedPrice = sessionStorage.getItem('selectedPrice');
        var selectedDesc = sessionStorage.getItem('selectedDesc');
        
        if (selectedImage && selectedPrice && selectedDesc) {
            var imageElement = document.createElement('img');
            imageElement.src = selectedImage;
            imageElement.alt = 'Selected Image';
            document.getElementById('selectedImageContainer').appendChild(imageElement);

            var priceElement = document.createElement('h3');
            priceElement.textContent = '' + selectedPrice;
            document.getElementById('selectedPriceContainer').appendChild(priceElement);

            var DescElement = document.createElement('p');
            DescElement.textContent = '' + selectedDesc;
            document.getElementById('selectedDescContainer').appendChild(DescElement);
        } else {
            document.getElementById('selectedImageContainer').textContent = 'No image selected.';
            document.getElementById('selectedPriceContainer').textContent = 'No price available.';
            document.getElementById('selectedDescContainer').textContent = 'No description available.';
        }
    }

    // page food-menu.php start
    if (window.location.pathname.endsWith('food-menu.php')) {

        const storedTitle = sessionStorage.getItem('categoryTitle');
        const categoryTitleElement = document.querySelector('.title-category');
        categoryTitleElement.textContent = storedTitle;

    }
    // page food-menu.php end



    /*
    page cart.php start
    */

    // to get food from local 
    document.addEventListener("DOMContentLoaded", function() {
        // Your code here
        if (window.location.pathname.endsWith('cart.php')) {
            var cartItem = JSON.parse(localStorage.getItem('cart1')) || [];
            if (cartItem.length > 0) {
                var selectedProduct = cartItem[0]; // Access the first item in the cartItem array
    
                document.getElementById('selectedImageCart').innerHTML = `<img src="${selectedProduct.image}" style="width: 50px; height: 50px;" alt="Selected Image">`;
                document.querySelector('.selectedTitleCart').innerText = selectedProduct.title;
                document.querySelector('.selectedPriceCart').innerText = selectedProduct.price;
            }
        }
    });
    /*
    page cart.php end
    */  


};

// page product.php end


/*

 page index.php start

*/
// To get title menu

var viewMenus = document.querySelectorAll('.view-menu');

viewMenus.forEach(function(viewMenu) {
    viewMenu.addEventListener('click', function(event) {
        event.preventDefault();

        var title = this.closest('.content-menu').querySelector('.title').textContent;

        sessionStorage.setItem("categoryTitle", title);

        window.location.href = event.target.href;
    });
});

// page index.php end



/*

page food-menu.php start

*/
//to save food in cart
var addToCartButtons = document.querySelectorAll('.add-to-cart');

let cartItems = JSON.parse(localStorage.getItem('cart1')) || [];

function addToCart(event) {
    const button = event.target;
    const product = button.closest('.product'); 
    const imageSrc = product.querySelector('img').getAttribute('src');
    const title = product.querySelector('.product-title').innerText;
    const price = product.querySelector('.product-price').innerText;

    const productDetails = {
        image: imageSrc,
        title,
        price
    };

    cartItems.push(productDetails); // Add the new product to the cartItems array
    localStorage.setItem('cart1', JSON.stringify(cartItems));    

    alert('Product added to cart!');
}

addToCartButtons.forEach(button => {
    button.addEventListener('click', addToCart);
});

/*

page food-menu.php end

*/


