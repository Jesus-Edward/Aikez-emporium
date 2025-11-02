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
                    <li>Team</li>
                </ul>
                <h3>Team</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <div class="team-style-area pt-100 pb-70">
        <div class="container">
            @include('frontend.home.components.team_area')
        </div>
    </div>
@endsection
