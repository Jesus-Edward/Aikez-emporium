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
                        <li>About Us</li>
                    </ul>
                    <h3>About Us</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <style>
            .pt-100 {
                padding-top: 0 !important;
            }
        </style>
        <!-- About Area -->
        <div class="about-area pb-70">
            <div class="container-fluid">
                {{-- <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{ asset("frontend/assets/img/about/about-img3.jpg") }}" alt="Images">
                        </div>
                    </div>

                </div> --}}
                @include('frontend.home.components.about_area')
                @include('frontend.pages.service')
                @include('frontend.home.components.ability_area')
                @include('frontend.home.components.team_area')
                @include('frontend.pages.testimonial')
            </div>
        </div>
        <!-- About Area End -->
@endsection
