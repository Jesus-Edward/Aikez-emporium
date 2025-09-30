<div class="navbar-area">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="{{ asset('default-images/aikez-logo.JPG') }}" height="40" width="80" class="logo-one" alt="Logo">
                    <img src="{{ asset('default-images/aikez-logo.JPG') }}" class="logo-two" alt="Logo">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav nav-two">
                <div class="container">
                    @include('frontend.layouts.navbar')
                </div>
            </div>

            <div class="side-nav-responsive">
                <div class="container">
                    <div class="dot-menu" style="display:flex; justify-content:space-between; font-size: 2rem">
                        <i class="bx bx-cart" style="margin-right: 20px"></i>
                        <i class="bx bx-user-circle"></i>
                    </div>
                </div>
            </div>
        </div>
