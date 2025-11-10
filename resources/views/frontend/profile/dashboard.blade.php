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
                    <li>Profile</li>
                </ul>
                <h3>{{ auth()->user()->name }} Profile</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <style>
        .service-article-content .card {
            border: none !important;
        }

        .service-article-content .card .card-header {
            border-bottom: none !important;
        }

        .card-header::before {
            position: absolute;
            content: '';
            height: 3px;
            width: 100%;
            background: #fff;
            left: 0;
            top: 44px;
        }

        .profile-img {
            height: 200px !important;
            margin-top: 10px;
            border-radius: 10px 10px 0 10px;
            position: relative;
        }

        .profile-img::before,
        .profile-img::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 50px;
            background: #0d6efd;
            bottom: -50px;
            right: 0
        }

        .profile-img::after {
            border-radius: 0 10px 0 0;
            background: #F5F5F5;
        }

        .nav-tabs .nav-link.active,
        .service-side-bar .nav-tabs .nav-link:hover {
            background: #EE786C !important;
            width: 100% !important;
            border-radius: 0 !important
        }

        .services-bar-widget .side-bar-categories ul li:hover {
            background: none !important
        }

        .service-side-bar a.active::after {
            position: absolute;
            content: "";
            background: #F5F5F5;
            width: 8px;
            height: 46px;
            top: -1px;
            right: 5px;
            transition: all 0.3s linear 0s;
            -webkit-transition: all 0.3s linear 0s;
            -moz-transition: all 0.3s linear 0s;
            -ms-transition: all 0.3s linear 0s;
            -o-transition: all 0.3s linear 0s;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            border: none !important;
        }

            .profile_para {
                color: var(--colorBlack) !important;
            }

        @media (max-width: 768px) {
            .name {
                left: 40% !important;
            }
        }
    </style>

    <!-- Service Details Area -->
    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="service-side-bar">
                        <div class="services-bar-widget">
                            <div class="side-bar-categories">
                                <div class="profile-img bg-primary" style="margin-bottom: 20px">
                                    <div style="padding-top: 20px; position:relative">
                                        <img src="{{ asset(auth()->user()->image) }}" class=" mx-auto d-block"
                                            alt="Image" id="showUserImage"
                                            style="width:100px; height:100px; border-radius:50%; border: solid 4px #F5F5F5;">
                                        <br><br>
                                        <label for="upload"><i class="bx bx-camera text-dark"
                                                style="font-size: 24px;position: absolute;bottom: 90px; left: 58%; z-index: 10; font-weight: bolder;"></i></label>
                                        <form id="avatar_form">
                                            <input type="file" id="upload" hidden name="avatar">
                                        </form>
                                    </div>
                                    <div style="position: absolute;bottom: 20px;left: 35%;" class="name">
                                        <h6 class="text-light">{{ auth()->user()->name }}</h6>
                                    </div>
                                </div>

                                <div>
                                    <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">

                                        <li class="nav-item" role="presentation" style="cursor: pointer">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true"
                                                style="width:100%">Personal Info</a>
                                        </li>

                                        <li class="nav-item" role="presentation" style="cursor: pointer">
                                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address"
                                                role="tab" aria-controls="address" aria-selected="true"
                                                style="width:100%">Address</a>
                                        </li>

                                        <li class="nav-item" role="presentation" style="cursor: pointer">
                                            <a class="nav-link" id="order-tab" data-bs-toggle="tab" href="#order"
                                                role="tab" aria-controls="order" aria-selected="false"
                                                style="width:100%">Order</a>
                                        </li>

                                        <li class="nav-item" role="presentation" style="cursor: pointer">
                                            <a class="nav-link" id="wishlist-tab" data-bs-toggle="tab" href="#wishlist"
                                                role="tab" aria-controls="wishlist" aria-selected="false"
                                                style="width:100%">WishList</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="change-password-tab" data-bs-toggle="tab"
                                                href="#change-password" role="tab" aria-controls="change-password"
                                                aria-selected="false" style="width:100%">Change Password</a>
                                        </li>

                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <li style="cursor: pointer; width:100%" class="nav-item" role="presentation">
                                                <a style="width:100%" class="nav-link" aria-selected="false"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">Logout
                                                </a>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 tab-content" id="myTabContent">
                    @include('frontend.profile.sections.personal_info')
                    @include('frontend.profile.sections.order')
                    @include('frontend.profile.sections.wishlist')
                    @include('frontend.profile.sections.change_password')
                    @include('frontend.profile.sections.address')
                </div>
            </div>
        </div>
    </div>
    <!-- Service Details Area End -->
@endsection
@push('frontend')
    <script>
        $(document).ready(function() {
            $('#upload').on('change', function(e) {
                e.preventDefault();

                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#showUserImage").attr("src", e.target.result);
                }
                reader.readAsDataURL(e.target.files[0])
                let form = $('#avatar_form')[0];
                let formData = new FormData(form);

                $.ajax({
                    method: 'POST',
                    url: "{{ route('user.update.avatar') }}",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        // if (response.status === 'success') {
                        //     window.location.reload();
                        // }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            });
        })
    </script>
@endpush
