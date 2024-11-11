<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driftwood Marketplace</title>
    
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script> -->

</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="top-bar">
            <span class="email">gedionorama@gmail.com</span>
            <div class="language-switch">
                <a href="#" class="lang active">ENG</a> |
                <a href="#" class="lang">LV</a>
            </div>
        </div>
        <div class="main-header">
            <div class="logo">
                <img src="images/logo_love.png" alt="Logo"> <!-- Укажите путь к логотипу -->
            </div>
            <nav class="nav-menu">
                <a href="#">HOME</a>
                <a href="#">SHOP</a>
                <a href="#">ABOUT</a>
                <a href="#">CONTACT</a>
            </nav>
            <div class="icons">
                <a href="#"><img src="images/search.svg" alt="Search"></a>
                <a href="#"><img src="images/user.svg" alt="User"></a>
                <a href="#"><img src="images/cart.svg" alt="Cart" class="cart-icon"></a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <img src="images/background.jpg" alt="Background" class="hero-background"> <!-- Укажите путь к фону -->
        <div class="hero-content">
            <p class="hero-title">Driftwood Marketplace</p>
            <p class="hero-text">Welcome to my store! On this site you will find everything made by hand, with a lot of dedication and above all with a lot of love.</p>
            <button class="shop-button">SHOP NOW</button>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="promo">
        <p class="promo-text">SHOP ADDITIONAL ITEMS ONLY AVAILABLE ON ETSY</p>
        <a href="https://www.etsy.com/shop/LoveHomeArtBaltic" class="promo-button">SHOP</a>
        <!-- <button class="promo-button">SHOP</button> -->
    </section>

    <!-- Welcome Section -->
    <section class="welcome">
        <h2>Welcome to LoveHomeArtBaltic!</h2>
        <p>Welcome to LoveHomeArtBaltic, where dreams come to life in driftwood and stones! Each piece of driftwood and stone has its own story, and we are very happy to become a part of it and give it new life. All this can be done thanks to your creativity. Let's make the world brighter and more beautiful!</p>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-columns">
            <div class="footer-column">
                <h3>Company</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Affiliate Program</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Get Help</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Order Status</a></li>
                    <li><a href="#">Payment Options</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Online Shop</h3>
                <ul>
                    <li><a href="#">Driftwood</a></li>
                    <li><a href="#">Stones</a></li>
                    <li><a href="#">Lamps</a></li>
                    <li><a href="#">Clocks</a></li>
                </ul>
            </div>
            <div class="footer-column follow-us">
                <h3>Follow Us</h3>
                <div class="social-icons">
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.etsy.com/shop/LoveHomeArtBaltic"><i class="fa-brands fa-etsy"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
