@extends('frontend.layouts.master')
@section('frontend')
    <!-- Sidebar Modal -->
<div class="sidebar-modal">
    <div class="sidebar-modal-inner">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="assets/img/logos/logo-2.png" class="sidebar-logo-one" alt="Image">
                <img src="assets/img/logos/footer-logo2.png" class="sidebar-logo-two" alt="Image">
            </div>

            <span class="close-btn sidebar-modal-close-btn">
                <i class="bx bx-x"></i>
            </span>
        </div>

        <div class="sidebar-about">
            <div class="title">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut tur incidunt ut labore et
                </p>
            </div>
        </div>

        <div class="sidebar-room-feed">
            <h2>Room Gallery</h2>
            <ul class="sidebar-room-content">
                <li>
                    <img src="assets/img/room/room-img1.jpg" alt="Images">
                    <div class="content">
                        <h3><a href="room-details.html">Single Room</a></h3>
                        <span>320 / Per Night </span>
                    </div>
                </li>

                <li>
                    <img src="assets/img/room/room-img2.jpg" alt="Images">
                    <div class="content">
                        <h3><a href="room-details.html">Luxury Room</a></h3>
                        <span>360 / Per Night </span>
                    </div>
                </li>

                <li>
                    <img src="assets/img/room/room-img3.jpg" alt="Images">
                    <div class="content">
                        <h3><a href="room-details.html">Double Room</a></h3>
                        <span>370 / Per Night </span>
                    </div>
                </li>
            </ul>
        </div>

        <div class="contact-us">
            <h2>Contact Us</h2>
            <ul>
                <li>
                    <i class='bx bx-current-location'></i>
                    Address: 123 Stanton, <br> Virginia, USA

                </li>

                <li>
                    <i class='bx bx-mail-send'></i>
                    <a href="mailto:hello@atoli.com">hello@atoli.com</a>
                    <a href="#">Skype: example</a>
                </li>

                <li>
                    <i class='bx bx-phone-call'></i>
                    <a href="tel:+1(123)-456-7890"> +1 (123) 456 7890</a>
                    <a href="tel:+1(123)-456-6790"> +1 (123) 456 6790</a>
                </li>
            </ul>
        </div>

        <div class="sidebar-follow-us">
            <h2>Follow Us</h2>

            <ul class="social-wrap">
                <li>
                    <a href="#" target="_blank">
                        <i class="bx bxl-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <i class="bx bxl-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <i class="bx bxl-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <i class="bx bxl-youtube"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar Modal -->

<!-- Banner Area Two -->
{{-- @include('frontend.home.components.banner_area') --}}
@include('frontend.home.components.slider_banner')
<!-- Banner Area Two End -->

<!-- About Area -->
@include('frontend.home.components.about_area')
<!-- About Area End -->

<!-- Tile Collection Area Two -->
@include('frontend.home.components.service_area')
<!-- Tile Collection Area End -->

<!-- Services Area Two -->
@include('frontend.home.components.product_area')
<!-- Services Area Two End -->

<!-- Ability Area -->
@include('frontend.home.components.ability_area')
<!-- Ability Area  End -->

<!-- Team Area Two -->
@include('frontend.home.components.team_area')
<!-- Team Area Two End -->

<!-- Testimonials Area Two  -->
@include('frontend.home.components.testimonial_area')
<!-- Testimonials Area Two End -->

<!-- FAQ Area -->
@include('frontend.home.components.faq_area')
<!-- FAQ Area End -->

<!-- Buy Area -->
@include('frontend.home.components.buy_area')
<!-- Book Area End -->

<!-- Contact Area -->
@include('frontend.home.components.contact_area')
<!-- Contact Area End -->

<!-- Blog Area -->
@include('frontend.home.components.blog_area')
<!-- Blog Area End -->

@endsection
