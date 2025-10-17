<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('default-images/aikez-logo.JPG') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Aikez Emp</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->

    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-book-open'></i>
                </div>
                <div class="menu-title">Pages</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.banner.index') }}">
                        <div class="parent-icon"><i class='bx bx-tag-alt'></i></i></div>
                        <div class="menu-title">Banner</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.about.index') }}">
                        <div class="parent-icon"><i class='bx bx-info-circle'></i></div>
                        <div class="menu-title">About</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.service.index') }}">
                        <div class="parent-icon"><i class='bx bx-server'></i></div>
                        <div class="menu-title">Service</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.ability.index') }}">
                        <div class="parent-icon"><i class='bx bx-chart'></i></div>
                        <div class="menu-title">Ability</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.team.index') }}">
                        <div class="parent-icon"><i class='bx bx-group'></i> </div>
                        <div class="menu-title">Team</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.testimonial.index') }}">
                        <div class="parent-icon"><i class='bx bx-news'></i> </div>
                        <div class="menu-title">Testimonial</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.faq.index') }}">
                        <div class="parent-icon"><i class='bx bx-question-mark'></i> </div>
                        <div class="menu-title">FAQ</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.faq-answer.index') }}">
                        <div class="parent-icon"><i class='bx bx-reply'></i> </div>
                        <div class="menu-title">FAQ Answers</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.contact.index') }}">
                        <div class="parent-icon"><i class='bx bx-phone'></i> </div>
                        <div class="menu-title">Contact</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.t&c.index') }}">
                        <div class="parent-icon"><i class='bx bx-book'></i> </div>
                        <div class="menu-title">Terms & Conditions</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-box"></i></div>
                <div class="menu-title">Product MGT</div>
            </a>

            <ul>
                <li>
                    <a href="{{ route('admin.category.index') }}">
                        <div class="parent-icon"><i class='bx bx-layer'></i></div>
                        <div class="menu-title">Category</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.brand.index') }}">
                        <div class="parent-icon"><i class='fa-solid fa-registered'></i></div>
                        <div class="menu-title">Brand</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.size.index') }}">
                        <div class="parent-icon"><i class='fa-solid fa-registered'></i></div>
                        <div class="menu-title">Size</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.product.index') }}">
                        <div class="parent-icon"><i class='fa-brands fa-product-hunt'></i></div>
                        <div class="menu-title">Product</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.general-settings.index') }}">
                <div class="parent-icon"><i class='bx bx-cog'></i></div>
                <div class="menu-title">Settings</div>
            </a>
        </li>

    </ul>

    <!--end navigation-->
</div>
