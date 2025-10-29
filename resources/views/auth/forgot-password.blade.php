@extends('frontend.layouts.master')
@section('frontend')
            <!-- Inner Banner -->
        <div class="inner-banner inner-bg12">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>Recover Password</li>
                    </ul>
                    <h3>Recover Password</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <style>
            .login-user {
                position: absolute;
                top: -35px;
                left: 45%;
                z-index: 100;
            }

            .login-icon {
                width: 70px;
                height: 70px;
            }

            @media (max-width: 768px) {
                .login-user {
                    left: 40% !important;
                }
            }
        </style>

        <!-- Sign In Area -->
        <div class="sign-in-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="user-all-form">
                            <div class="contact-form" style="position: relative">
                                <div class="login-user">
                                    <img src="{{ asset('frontend/assets/image/user-avatar.png') }}" class='login-icon' >
                                </div>
                                <div class="section-title text-center">
                                    <span class="sp-color">Don't Fret!</span>
                                    <h6>Enter your email to get a new password</h6>
                                </div>
                                <form id="" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="form-group">
                                                <input type="email" name="email" id="" class="form-control" placeholder=" Enter Email" autofocus>
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 form-condition">
                                            <div class="agree-label">
                                                <label for="chb1">
                                                    Remember Password?
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <a class="forget" href="{{ route('login') }}">Back to Login</a>
                                        </div>

                                        <div class="col-lg-12 col-md-12 text-center">
                                            <button type="submit" class="default-btn btn-bg-two border-radius-5">
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In Area End -->
@endsection
