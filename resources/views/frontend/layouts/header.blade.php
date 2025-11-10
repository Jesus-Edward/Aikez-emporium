<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset(config('settings.logo')) }}" height="40" class="fp__footer_logo" width="80" class="logo-one"
                alt="Logo">
            {{-- <img src="{{ asset(config('settings.logo')) }}" class="logo-two fp__footer_logo" alt="Logo"> --}}
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav nav-two">
        <div class="container">
            @include('frontend.layouts.navbar')
        </div>
    </div>

    <style>
        .shopping_cart {
            position: absolute;
            width: 25px;
            height: 25px;
            background: #1B2132;
            border-radius: 50%;
            top: -3px;
            left: 22px;
            padding: 2px;
            z-index: 100;
        }
    </style>

    <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu" style="display:flex; justify-content:space-between; font-size: 2rem">
                <div style="position:relative">
                    <a href="{{ route('product.cart.page') }}" style="text-decoration: none; position: relative;top: -11px;">
                        <i class="bx bx-cart text-dark nav_cart_profile" style="margin-right: 25px;"></i>
                    </a>
                    <div class="shopping_cart">
                        <span class="cart-num text-white text-center"
                            style="display: flex; justify-content:center; align-items:center; font-size:14px;margin-top: -2px;">{{ Cart::content()->count() }}</span>
                    </div>
                </div>
                <div class="option-item">
                <div class="menu-icon">
                    <a href="{{ route('user.profile.dashboard') }}" class="menu-icon-one">
                        <i class='bx bx-user-circle text-dark nav_cart_profile'></i>
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
