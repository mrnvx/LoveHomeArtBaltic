<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    <!-- Подключите стили -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Подключите Font Awesome, если иконки нужны -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <div class="dropdown">
                    <a href="#" class="dropbtn">SHOP</a>
                    <div class="dropdown-content">
                    <a href="#">All products</a>
                    <a href="#">Driftwood</a>
                    <a href="#">Stones</a>
                    <a href="#">Clocks</a>
                    <a href="#">Lamps</a>
                </div>
            </div>
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

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

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

    <!-- Подключение скриптов -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>