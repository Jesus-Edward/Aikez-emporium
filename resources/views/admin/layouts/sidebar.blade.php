<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset(config('settings.logo')) }}" class="logo-icon" alt="logo icon">
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
            <a href="{{ route('admin.admin-mgt.index') }}" class="">
                <div class="parent-icon"><i class='bx bx-shield-alt'></i>
                </div>
                <div class="menu-title">ADMIN MGT</div>
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
                    <a href="{{ route('admin.coupon.index') }}">
                        <div class="parent-icon"><i class='fa-solid fa-ticket-simple'></i></div>
                        <div class="menu-title">Coupon</div>
                    </a>
                </li>
                 <li>
                    <a href="{{ route('admin.payment-settings.index') }}">
                        <div class="parent-icon"><i class='bx bx-credit-card'></i></div>
                        <div class="menu-title">Payment Settings</div>
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
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-box"></i></div>
                <div class="menu-title">Order MGT</div>
            </a>

            <ul>
                <li class="">
                    <a class="" href="{{ route('admin.all-orders') }}">
                        <div class="parent-icon"></div>
                        <div class="menu-title">All Orders</div>
                    </a>
                </li>
                <li class="">
                    <a class="" href="{{ route('admin.pending-orders') }}">
                        <div class="parent-icon"></div>
                        <div class="menu-title">Pending Orders</div>
                    </a>
                </li>
                <li class="">
                    <a class="" href="{{ route('admin.processing-orders') }}">
                        <div class="parent-icon"></div>
                        <div class="menu-title">Processing Orders</div>
                    </a>
                </li>
                <li class="">
                    <a class="" href="{{ route('admin.delivered-orders') }}">
                        <div class="parent-icon"></div>
                        <div class="menu-title">Delivered Orders</div>
                    </a>
                </li>
                <li class="">
                    <a class="" href="{{ route('admin.declined-orders') }}">
                        <div class="parent-icon"></div>
                        <div class="menu-title">Declined Orders</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.delivery-area.index') }}">
                <div class="parent-icon"><i class='bx bx-area'></i></div>
                <div class="menu-title">Delivery Area</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Blog Management</div>
            </a>
            <ul>
                <li><a href="{{ route('admin.blog_category.index') }}" class=""><i class='bx bx-radio-circle'></i>Blog Category</a></li>
                <li><a href="{{ route('admin.blog.post.index') }}" class=""><i class='bx bx-radio-circle'></i>Blog</a></li>
                <li><a href="{{ route('admin.blog.comment.index') }}" class=""><i class='bx bx-radio-circle'></i>Comment</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.newsletter.index') }}">
                <div class="parent-icon"><i class='bx bx-news'></i></div>
                <div class="menu-title">Newsletter</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.social-links.index') }}">
                <div class="parent-icon"><i class='bx bx-link'></i></div>
                <div class="menu-title">Social Links</div>
            </a>
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
