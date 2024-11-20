@extends('layouts.app')
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

 @section('content')
<main>

    <section class="hero">
        <img src="images/background.jpg" alt="Background" class="hero-background">
        <div class="hero-content">
            <p class="hero-title">Driftwood Marketplace</p>
            <p class="hero-text">Welcome to my store! On this site you will find everything made by hand, with a lot of dedication and above all with a lot of love.</p>
            <button class="shop-button">SHOP NOW</button>
        </div>
    </section>


    <section class="promo">
        <p class="promo-text">SHOP ADDITIONAL ITEMS ONLY AVAILABLE ON ETSY</p>
        <a href="https://www.etsy.com/shop/LoveHomeArtBaltic" class="promo-button">SHOP</a>
    </section>


    <section class="welcome">
        <h2>Welcome to LoveHomeArtBaltic!</h2>
        <p>Welcome to LoveHomeArtBaltic, where dreams come to life in driftwood and stones! Each piece of driftwood and stone has its own story, and we are very happy to become a part of it and give it new life. All this can be done thanks to your creativity. Let's make the world brighter and more beautiful!</p>
    </section>
</main>
@endsection
</body>
</html>
