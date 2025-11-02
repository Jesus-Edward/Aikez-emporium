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
                        <li>Login</li>
                    </ul>
                    <h3>Login</h3>
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
                                    <span class="sp-color">Welcome Back!</span>
                                    <h2>Sign In to Your Account!</h2>
                                </div>
                                <form id="" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="form-group">
                                                <input type="text" name="login" id="login" class="form-control" placeholder="Name or Email or Phone" autofocus>
                                                @error('login')
                                                    <small class="text-danger" style="font-size: 12px">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" type="password" id="loginPassword" name="password" placeholder="Password">
                                            </div>

                                            <div aria-hidden="true" style="position: absolute;bottom:222px;right:50px">
                                                <i class="fas fa-eye-slash" id="show-and-hide"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 form-condition">
                                            <div class="agree-label">
                                                <input type="checkbox" name="remember" id="chb1">
                                                <label for="chb1">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <a class="forget" href="{{ route('password.request') }}">Forgot My Password?</a>
                                        </div>

                                        <div class="col-lg-12 col-md-12 text-center">
                                            <button type="submit" class="default-btn btn-bg-two border-radius-5">
                                                Login Now
                                            </button>
                                        </div>

                                        <div class="col-12">
                                            <p class="account-desc">
                                                Not a Member?
                                                <a href="{{ route('register') }}">Register With Us</a>
                                            </p>
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
@push('frontend')
    <script>

        $(document).on('click', '#show-and-hide', function() {
            var inputField = $('#loginPassword');
            var inputType = inputField.attr('type');

            if (inputType === 'password') {
                inputField.attr('type', 'text');
                $(this).removeClass('fas fa-eye-slash').addClass('fas fa-eye');
            }else if(inputType === 'text') {
                inputField.attr('type', 'password');
                $(this).removeClass('fas fa-eye').addClass('fas fa-eye-slash');
            }
        })

    </script>
@endpush
