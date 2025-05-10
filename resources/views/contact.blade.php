
@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="contact-page">
    <div class="contact-info">
        <h3>Get in Touch</h3>
        <p><i class="fa fa-map-marker"></i> Ventspils region, Latvia</p>
        <p><i class="fa fa-phone"></i> +371 27087171</p>
        <p><i class="fa fa-envelope"></i> gedionorama@gmail.com</p>
        
        <h3>Find us</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d68769.56805599217!2d21.513008369570805!3d57.409350075495446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46f1c896664248d9%3A0x400cfcd68f2fea0!2z0JLQtdC90YLRgdC_0LjQu9GB!5e0!3m2!1sru!2slv!4v1731514571934!5m2!1sru!2slv" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <h3>Follow us</h3>
        <div class="social-media">
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.etsy.com/shop/LoveHomeArtBaltic"><i class="fa-brands fa-etsy"></i></a>
        </div>
    </div>

    <div class="contact-form">
        <h2>Send your message!</h2>
        <p>Contact us if you have any questions, suggestions, or want to learn more about the product! Also u can request a custom order!</p>
        
        @if(Session::has('msg'))
            <div class="alert">
                {{Session::get('msg')}}
            </div>
        @endif

         <form name="contact_form" action="{{ route('contact.post_message')}}" method="POST">
            @csrf
            <label for="name">Full name</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" required>

            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone">

            <label for="phone">Subject</label>
            <input type="text" name="subject" id="subject">

            <label for="message">Write a message</label>
            <textarea name="message" id="message" required></textarea>

            <button type="submit" class="submit-btn">Send message</button>
        </form>
    </div>
</div>
@endsection
