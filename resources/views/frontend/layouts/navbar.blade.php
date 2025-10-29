<nav class="navbar navbar-expand-md navbar-light ">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset(config('settings.logo')) }}" height="40" width="80" class="logo-one"
            alt="Logo">
        {{-- <img src="{{ asset('default-images/aikez-logo.JPG') }}" class="logo-two" alt="Logo"> --}}
    </a>

    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    Home
                    <i class='bx bx-home'></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('frontend.about') }}" class="nav-link">
                    About
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Pages
                    <i class='bx bx-chevron-down'></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a href="{{ route('frontend.team') }}" class="nav-link">
                            Team
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('frontend.faq') }}" class="nav-link">
                            FAQ
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tiles.category') }}" class="nav-link">
                            Store
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('frontend.testimonial') }}" class="nav-link">
                            Testimonials
                        </a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a href="{{ route('guest.wishlist') }}" class="nav-link">
                                Guest Wishlist
                            </a>
                        </li>
                    @endguest

                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                                Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">
                                Register
                            </a>
                        </li>
                    @endguest

                    <li class="nav-item">
                        <a href="{{ route('frontend.terms.conditions') }}" class="nav-link">
                            Terms & Conditions
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="coming-soon.html" class="nav-link">
                            Coming Soon
                        </a>
                    </li> --}}
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('all_blogs') }}" class="nav-link">
                    Blog
                    <i class='bx bx-chevron-down'></i>
                </a>
                {{-- <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a href="blog-details.html" class="nav-link">
                            Blog Details
                        </a>
                    </li>
                </ul> --}}
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    Products
                    <i class='bx bx-chevron-down'></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a href="{{ route('tiles.category') }}" class="nav-link">
                            Product Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tiles.size') }}" class="nav-link">
                            Product Sizes
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('frontend.contact') }}" class="nav-link">
                    Contact
                </a>
            </li>
        </ul>

        <style>
            .shopping_cart {
                position: absolute;
                width: 25px;
                height: 25px;
                background: #1B2132;
                border-radius: 50%;
                top: 1px;
                left: 25px;
                padding: 2px;
                z-index: 100;
            }

            /* @media (max-width: 768px) {
                .shopping_cart {
                    top: 20px !important;
                }
            } */
        </style>

        <div class="other-option">
            <div class="option-item" style="position: relative">
                <div class="menu-icon">
                    <a href="{{ route('product.cart.page') }}" class="menu-icon-one">
                        <i class="bx bx-cart text-dark nav_cart_profile"></i>
                    </a>
                </div>

                <div class="shopping_cart"><span class="cart-num text-white text-center" style="display: flex; justify-content:center; align-items:center; font-size:14px; margin-top:-2px">{{ count(Cart::content()) }}</span></div>
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
</nav>
