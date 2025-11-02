@extends('frontend.layouts.master')
@section('frontend')
     <style>
        .breadcrumb-img {
            background-image: url('{{ asset(config("settings.breadcrumb_logo")) }}');
        }
    </style>
            <!-- Inner Banner -->
        <div class="inner-banner breadcrumb-img">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>Testimonials</li>
                    </ul>
                    <h3>Testimonials</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <style>
            .testi-img {
                width: 50px !important;
                height: 50px;
            }
        </style>

        <!-- Testimonials Area Three -->
        <div class="testimonials-area-three pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color">TESTIMONIAL</span>
                    <h2>Our Latest Testimonials and What Our Client Says</h2>
                </div>
                <div class="row align-items-center pt-45">
                    <div class="col-lg-6 col-md-6">
                        <div class="testimonials-img-two">
                            <img src="{{ asset("frontend/assets/img/testimonials/testimonials-img5.jpg") }}" alt="Images">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="testimonials-slider-area owl-carousel owl-theme">
                            @foreach ($testimonials as $testimonial)
                                <div class="testimonials-slider-content">
                                    <i class="flaticon-left-quote"></i>
                                    <p>
                                       {{ $testimonial->testimony }}
                                    </p>
                                    <ul>
                                        <li>
                                            <img src="{{ asset($testimonial->image) }}" class="testi-img" alt="Images">
                                            <h3>{{ $testimonial->name }}</h3>
                                            <span>{{ $testimonial->location }}</span>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonials Area Three End -->

        <!-- Testimonials Inner Area -->
        <div class="testimonials-inner-area pb-70">
            <div class="container">
                <div class="row">
                    @foreach ($testimonials as $testimonial)
                        <div class="col-lg-4 col-md-6">
                            <div class="testimonials-item">
                                <i class="flaticon-left-quote text-color"></i>
                                <p>
                                    {{ $testimonial->testimony }}
                                </p>
                                <ul>
                                    <li>
                                        <img src="{{ asset($testimonial->image) }}" class="testi-img" alt="Images">
                                        <h3>{{ $testimonial->name }}</h3>
                                        <span>{{ $testimonial->location }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
        <!-- Testimonials Inner Area End -->
@endsection
