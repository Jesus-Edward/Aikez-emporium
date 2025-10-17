<nav class="navbar navbar-expand-md navbar-light ">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('default-images/aikez-logo.JPG') }}" height="40" width="80" class="logo-one"
            alt="Logo">
        {{-- <img src="{{ asset('default-images/aikez-logo.JPG') }}" class="logo-two" alt="Logo"> --}}
    </a>

    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link active">
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
                        <a href="gallery.html" class="nav-link">
                            Store
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('frontend.testimonial') }}" class="nav-link">
                            Testimonials
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="sign-in.html" class="nav-link">
                            Sign In
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="sign-up.html" class="nav-link">
                            Sign Up
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('frontend.terms.conditions') }}" class="nav-link">
                            Terms & Conditions
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="coming-soon.html" class="nav-link">
                            Coming Soon
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    Blog
                    <i class='bx bx-chevron-down'></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item">
                        <a href="blog-details.html" class="nav-link">
                            Blog Details
                        </a>
                    </li>
                </ul>
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

        <div class="other-option">
            <div class="option-item">
                <div class="menu-icon">
                    <a href="#" class="menu-icon-one">
                        <i class="bx bx-cart"></i>
                    </a>
                </div>
            </div>

            <div class="option-item">
                <div class="menu-icon">
                    <a href="{{ route('user.profile.dashboard') }}" class="menu-icon-one">
                        <i class='bx bx-user-circle'></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
