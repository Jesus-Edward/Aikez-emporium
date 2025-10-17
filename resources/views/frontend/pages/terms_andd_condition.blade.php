@extends('frontend.layouts.master')
@section('frontend')
            <!-- Inner Banner -->
        <div class="inner-banner inner-bg11">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>Terms & Conditions</li>
                    </ul>
                    <h3>Terms & Conditions</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- Terms Conditions Area -->
        <div class="terms-conditions-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color">{{ $t_and_c->title }}</span>
                    <h2>{{ $t_and_c->company_name }}</h2>
                </div>
                <div class="row pt-45">
                    <div class="col-lg-12">
                        <div class="terms-conditions-img">
                            <img src="{{ asset($t_and_c->image )}}" alt="Images">
                        </div>

                        <div class="single-area-content">
                            {!! $t_and_c->terms_and_conditions !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Terms Conditions Area End -->
@endsection
