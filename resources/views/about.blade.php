
@extends('layouts.app')

@section('content')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="about-hero">
        <h1>About Us LoveHomeArtBaltic</h1>
        <p>Welcome to our shop LoveHomeArtBaltic. Here you will find various items collected from nature, as well as our various handmade works of art. We collect almost all of our materials on the Baltic Sea coast, so the purchased product will be purely unique and environmentally friendly, because this is everything that was created by Mother Nature.</p>
        <a href="{{ route('contact.index') }}" class="shop-button">Contact Us</a>
    </div>


    <div class="vision-section">
        <h2>LoveHomeArtBaltic Vision</h2>
        <p>
            I would like to share my passion with others to give things a new life. 
            I have seen how many masterpieces in nature are made from unique driftwood, and it inspired me to make the world a better place. 
            We can all make people happy with our creativity.
        </p>
    </div>


@endsection