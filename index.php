<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

    <div class="header1">
        <div class="div1">
            <p><i class="fa-solid fa-location-dot"></i> Resturent St,Delicious City,Beirut,Lebanon</p>
            <p><i class="fa-regular fa-clock"></i> Daily 8:00am to 10:00pm</p>
        </div>
        <div class="div1">
            <p><i class="fa-solid fa-phone"></i>+961 71653043</p>
            <p><i class="fa-regular fa-envelope"></i> amd040@live.aul.edu.lb</p>
        </div>
    </div>

    <?php include("navbar.php") ?>

    <div class="contain" id="Home">
        <div class="slider">
            <div class="owl-carousel">
                <div class="item slide1">
                    <div class="caption">
                        <div class="title">For the love of <span><br>delicious food</span></div>
                        <div class="desc">Come with family & feel the joy of mouthwatering food</div>
                        <div class="linkmenu"><a href="#Menu">VIEW OUR MENU</a></div>
                    </div>
                </div>
                <div class="item slide2">
                    <div class="caption">
                        <div class="title">Flavors Inspired<span class="spacer">by the Seasons</span></div>
                        <div class="desc">Come with family & feel the joy of mouthwatering food</div>
                        <div class="linkmenu"><a href="#Menu">VIEW OUR MENU</a></div>
                    </div>
                </div>
                <div class="item slide3">
                    <div class="caption">
                        <div class="title title3">Where every flavor <span class="spacer3">tells a story</span></div>
                        <div class="desc">Come with family & feel the joy of mouthwatering food</div>
                        <div class="linkmenu"><a href="#Menu">VIEW OUR MENU</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="back-top" id="backTop">
        <a href="#Home"><i class="fa-solid fa-chevron-up"></i></a>
    </div>



    <main>
        <article>
            <section id="Menu">
                <div class="container">
                    <div class="title-menu">
                        <h4>FLAVORS FOR ROYALTY</h4>
                        <div><img src="assets/image/separator.png" alt=""></div>
                        <h1>We Offer Top Notch</h1>
                    </div>
                    <div class="category-menu">
                        <div class="content-menu">
                            <div class="img-backgroud">
                                <img src="assets/image/service-2.jpg" alt="">
                            </div>
                            <div class="title">Breakfast</div>
                            <a href="food-menu.php" class="view-menu">VIEW MENU</a>
                        </div>
                        <!-- <div class="content-menu">
                            <div class="img-backgroud">
                                <img src="assets/image/service-3.jpg" alt="">
                            </div>
                            <div class="title">Drinks</div>
                            <a href="food-menu.php" class="view-menu">VIEW MENU</a>
                        </div>
                        <div class="content-menu">
                            <div class="img-backgroud">
                                <img src="assets/image/service-1.jpg" alt="">
                            </div>
                            <div class="title">Appetizers</div>
                            <a href="food-menu.php" class="view-menu">VIEW MENU</a>
                        </div>
                        <div class="content-menu">
                            <div class="img-backgroud">
                                <img src="assets/image/hero-slider-1.jpg" alt="">
                            </div>
                            <div class="title">Breakfast</div>
                            <a href="">VIEW MENU</a>
                        </div>
                        <div class="content-menu">
                            <div class="img-backgroud">
                                <img src="assets/image/service-1.jpg" alt="">
                            </div>
                            <div class="title">Breakfast</div>
                            <a href="">VIEW MENU</a>
                        </div> -->
                    </div>
                </div>

                <div class="container3">
                    <div class="container2">
                        <div class="img-backgroud-food"></div>
                        <div class="container-menu">
                            <div class="title-menu">
                                <h4>SPECIAL SELECTION</h4>
                                <div><img src="assets/image/separator.png" alt=""></div>
                                <h1>Delicious Menu</h1>
                            </div>

                            <div class="menu-list">
                                <ul class="grid-list">

                                    <li>
                                        <div class="menu-card hover:card">

                                            <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                                                <img src="./assets/image/menu-1.png" width="100" height="100" loading="lazy" alt="Greek Salad" class="img-cover">
                                            </figure>

                                            <div>

                                                <div class="title-wrapper">
                                                    <h3 class="title-3">
                                                        <a href="#" class="card-title">Greek Salad</a>
                                                    </h3>

                                                    <span class="badge label-1">Seasonal</span>

                                                    <span class="span title-2">$25.50</span>
                                                </div>

                                                <p class="card-text label-1">
                                                    Tomatoes, green bell pepper, sliced cucumber onion, olives, and feta cheese.
                                                </p>

                                            </div>

                                        </div>
                                    </li>

                                    <li>
                                        <div class="menu-card hover:card">

                                            <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                                                <img src="./assets/image/menu-2.png" width="100" height="100" loading="lazy" alt="Lasagne" class="img-cover">
                                            </figure>

                                            <div>

                                                <div class="title-wrapper">
                                                    <h3 class="title-3">
                                                        <a href="#" class="card-title">Lasagne</a>
                                                    </h3>

                                                    <span class="span title-2">$40.00</span>
                                                </div>

                                                <p class="card-text label-1">
                                                    Vegetables, cheeses, ground meats, tomato sauce, seasonings and spices
                                                </p>

                                            </div>

                                        </div>
                                    </li>

                                    <li>
                                        <div class="menu-card hover:card">

                                            <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                                                <img src="./assets/image/menu-3.png" width="100" height="100" loading="lazy" alt="Butternut Pumpkin" class="img-cover">
                                            </figure>

                                            <div>

                                                <div class="title-wrapper">
                                                    <h3 class="title-3">
                                                        <a href="#" class="card-title">Butternut Pumpkin</a>
                                                    </h3>

                                                    <span class="span title-2">$10.00</span>
                                                </div>

                                                <p class="card-text label-1">
                                                    Typesetting industry lorem Lorem Ipsum is simply dummy text of the priand.
                                                </p>

                                            </div>

                                        </div>
                                    </li>

                                    <li>
                                        <div class="menu-card hover:card">

                                            <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                                                <img src="./assets/image/menu-4.png" width="100" height="100" loading="lazy" alt="Tokusen Wagyu" class="img-cover">
                                            </figure>

                                            <div>

                                                <div class="title-wrapper">
                                                    <h3 class="title-3">
                                                        <a href="#" class="card-title">Tokusen Wagyu</a>
                                                    </h3>

                                                    <span class="badge label-1">New</span>

                                                    <span class="span title-2">$39.00</span>
                                                </div>

                                                <p class="card-text label-1">
                                                    Vegetables, cheeses, ground meats, tomato sauce, seasonings and spices.
                                                </p>

                                            </div>

                                        </div>
                                    </li>

                                    <li>
                                        <div class="menu-card hover:card">

                                            <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                                                <img src="./assets/image/menu-5.png" width="100" height="100" loading="lazy" alt="Olivas Rellenas" class="img-cover">
                                            </figure>

                                            <div>

                                                <div class="title-wrapper">
                                                    <h3 class="title-3">
                                                        <a href="#" class="card-title">Olivas Rellenas</a>
                                                    </h3>

                                                    <span class="span title-2">$25.00</span>
                                                </div>

                                                <p class="card-text label-1">
                                                    Avocados with crab meat, red onion, crab salad stuffed red bell pepper and green bell pepper.
                                                </p>

                                            </div>

                                        </div>
                                    </li>

                                    <li>
                                        <div class="menu-card hover:card">

                                            <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                                                <img src="./assets/image/menu-6.png" width="100" height="100" loading="lazy" alt="Opu Fish" class="img-cover">
                                            </figure>

                                            <div>

                                                <div class="title-wrapper">
                                                    <h3 class="title-3">
                                                        <a href="#" class="card-title">Opu Fish</a>
                                                    </h3>

                                                    <span class="span title-2">$49.00</span>
                                                </div>

                                                <p class="card-text label-1">
                                                    Vegetables, cheeses, ground meats, tomato sauce, seasonings and spices
                                                </p>

                                            </div>

                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </section>


            <section id="About">
                <div class="container">
                    <div class="left">
                        <div class="title-menu">
                            <h4>OUR STORY</h4>
                            <div><img src="assets/image/separator.png" alt=""></div>
                            <h1>Every Fla vor Tells a Story</h1>
                        </div>
                        <div class="history_about">
                            <p>Indulge in a symphony of flavors and tantalize your taste buds with our exquisite array of delicious culinary creations, meticulously crafted to satisfy every craving and ignite a passion for exceptional dining experiences.</p>
                        </div>
                        <div class="read-more linkmenu">
                            <a href="about.php" class="read_about">Read More</a>
                        </div>
                    </div>
                    <div class="right">
                        <div class="img_about1">
                            <img src="assets/image/about-banner.jpg" alt="" loading="lazy">
                        </div>
                        <div class="img_about2">
                            <img src="assets/image/about-abs-image.jpg" alt="" loading="lazy">
                        </div>
                    </div>
                </div>
            </section>



            <section id="Contact">
                <div class="container">
                    <div class="title-contact">
                        <h4>Contact Us</h4>
                        <div><img src="assets/image/separator.png" alt=""></div>
                        <h1><i class="fa-solid fa-headset"></i> Get In <span class="text-primary">Touch</span></h1>
                    </div>
                    <form action="" class="contact-feedback">
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <textarea name="feedback" id="" cols="30" rows="10" placeholder="Message" required></textarea>
                        <button class="btn">Submit</button>
                    </form>
                </div>
            </section>





            <!-- 
        - #FEATURES
      -->

            <section id="features">
                <div class="container">
                    <div class="title-features">
                        <h4>WHY CHOOSE US</h4>
                        <div><img src="assets/image/separator.png" alt=""></div>
                        <h1>Our Strength</h1>
                    </div>
                    <div class="content-features">
                        <div class="feature-category">
                            <div class="card-icon">
                                <img src="assets/image/features-icon-1.png" alt="">
                            </div>
                            <h3>Hygienic Food</h3>
                            <p>Lorem Ipsum is simply dummy <br> printing and typesetting.</p>
                        </div>
                        <div class="feature-category">
                            <div class="card-icon">
                                <img src="assets/image/features-icon-2.png" alt="">
                            </div>
                            <h3>Fresh Environment</h3>
                            <p>Lorem Ipsum is simply dummy <br> printing and typesetting.</p>
                        </div>
                        <div class="feature-category">
                            <div class="card-icon">
                                <img src="assets/image/features-icon-3.png" alt="">
                            </div>
                            <h3>Skilled Chefs</h3>
                            <p>Lorem Ipsum is simply dummy <br> printing and typesetting.</p>
                        </div>
                        <div class="feature-category">
                            <div class="card-icon">
                                <img src="assets/image/features-icon-4.png" alt="">
                            </div>
                            <h3>Event & Party</h3>
                            <p>Lorem Ipsum is simply dummy <br> printing and typesetting.</p>
                        </div>
                    </div>
                </div>
            </section>


        </article>
    </main>



    <footer id="footer">
        <div class="container">
            <div class="grid-list">
                <ul class="footer-list">
                    <li>Home</li>
                    <li>Menu</li>
                    <li>About</li>
                    <li>Contact</li>
                    <li>Login</li>
                </ul>
                <div class="footer-images footer-content">
                    <a href="admin/index.php" target="_blank" style="cursor: auto;"><img src="assets/image/logo.png" alt=""></a>
                    <p>
                        Resturent St, Delicious City, Beirut, Lebanon <br>
                        booking@grilli.com <br>
                        Booking Request : +961 71653043 <br>
                        Open : 08:00 am - 10:00 pm <br>
                    </p>
                </div>
                <ul class="footer-list">
                    <li>Facebook</li>
                    <li>INSTAGRAM</li>
                    <li>TWITTER</li>
                    <li>YOUTUBE</li>
                    <li>GOOGLE MAP</li>
                </ul>
            </div>
            <div class="copyright" >
                <p>© 2024 Grilli. All Rights Reserved | Crafted by <a href="#Home">Ahmad Doughman</a></p>
            </div>
        </div>
    </footer>





    <script type="text/javascript" src="assets/js/script.js"></script>
    <script type="text/javascript" src="assets/js/script1.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>

    <script type="text/javascript">
        $('.slider .owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            items: 1,
            autoplay: true,
            smartSpeed: 5000,
            animateOut: 'fadeOut'
        })
    </script>
</body>

</html>