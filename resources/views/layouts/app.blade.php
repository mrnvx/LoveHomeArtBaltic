<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LoveHomeArtBaltic')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                <a href="/home"><img src="/images/logo_love.png" alt="Logo"></a>
            </div>
            <nav class="nav-menu">
                    <a href="/home">HOME</a>
                    <div class="dropdown">
                    <a href="#" class="dropbtn">SHOP</a>
                    <div class="dropdown-content">
                    <a href="/shop">All products</a>
                    <a href="{{ route('category.filter', 1) }}">Driftwood</a>
                    <a href="{{ route('category.filter', 2) }}">Stones</a>
                    <a href="{{ route('category.filter', 3) }}">Clocks</a>
                    <a href="{{ route('category.filter', 4) }}">Lamps</a>
                </div>
            </div>
                <a href="/about">ABOUT</a>
                <a href="{{ route('contact.index') }}">contact</a>
                @if(auth()->check() && auth()->user()->hasRole('admin'))
                <a href="/admin/orders">Orders</a>
                @endif

            </nav>
            <div class="icons">
        <div class="search-container">
            <form action="{{ route('shop.search') }}" method="GET" class="search-form">
                    <input 
                        type="text" 
                        name="query" 
                        placeholder="Search products..." 
                        value="{{ request('query') }}" 
                        class="search-input"
                    >
                    <img src="/images/search.svg" alt="Search" class="search-icon">
            </form>
            
         </div>
                <a id="user-icon" href="#"><img src="/images/user.svg" alt="User"></a>
                <a href="{{ route('cart.index') }}"><img src="/images/cart.svg" alt="Cart" class="cart-icon"></a>
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
                    <li><a href="/home">Home</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="{{ route('contact.index') }}">Contact</a></li>
                    <li><a href="https://www.etsy.com/shop/LoveHomeArtBaltic?ref=l2-about-shopname&from_page=listing&section_id=1">Etsy</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Get Help</h3>
                <ul>
                    <li><a href="{{ route('contact.index') }}">Custom Order Request</a></li>
                    <li><a href="{{ route('cart.index') }}">Cart</a></li>
                    <li><a href="{{ route('orders') }}">Order Status</a></li>
                    <li><a href="#">Payment Options</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Online Shop</h3>
                <ul>
                    <li><a href="{{ route('category.filter', 1) }}">Driftwood</a></li>
                    <li><a href="{{ route('category.filter', 2) }}">Stones</a></li>
                    <li><a href="{{ route('category.filter', 4) }}">Lamps</a></li>
                    <li><a href="{{ route('category.filter', 3) }}">Clocks</a></li>
                </ul>
            </div>
            <div class="footer-column follow-us">
                <h3>Follow Us</h3>
                <div class="social-icons">
                <a href="https://www.instagram.com/lovehomeartbaltic?igsh=MWVnYjY2aXZzdGJtZQ=="><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.etsy.com/shop/LoveHomeArtBaltic"><i class="fa-brands fa-etsy"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
