@extends('frontend.layouts.master')
@section('frontend')
    <style>
        .breadcrumb-img {
            background-image: url('{{ asset(config('settings.breadcrumb_logo')) }}');
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
                    <li>500 Error page!</li>
                </ul>
                <h3>500 Error page!</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Start 404 Error -->
    <div class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="error-content">
                    <h1>5 <span>0</span> 0</h1>
                    <h3>Whoops! Something went wrong</h3>
                    <p>Internal error, wait we'll be back to solve the issue. Don't fret.</p>
                    <a href="{{ url('/') }}" class="default-btn btn-bg-three">
                        Return To Home Page
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 Error -->
@endsection
