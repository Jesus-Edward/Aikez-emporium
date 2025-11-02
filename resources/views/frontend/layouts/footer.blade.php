<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ asset(config('settings.footer_logo')) }}" height="40" width="80"
                                    alt="Images">
                            </a>
                        </div>
                        <p>
                            Aenean finibus convallis nisl sit amet hendrerit. Etiam blandit velit non lorem mattis, non
                            ultrices eros bibendum .
                        </p>
                        <ul class="footer-list-contact">
                            <li>
                                <i class='bx bx-home-alt'></i>
                                <a href="#">{{ config('settings.company_address') }}</a>
                            </li>
                            <li>
                                <i class='bx bx-phone-call'></i>
                                <a href="tel:{{ config('settings.site_phone') }}">{{ config('settings.site_phone') }}</a>
                            </li>
                            <li>
                                <i class='bx bx-envelope'></i>
                                <a href="mailto:{{ config('settings.site_email') }}">{{ config('settings.site_email') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget pl-5">
                        <h3>Links</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="{{ route('frontend.about') }}" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    About Us
                                </a>
                            </li>
                            {{-- <li>
                                <a href="services-1.html" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    Services
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('frontend.team') }}" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    Team
                                </a>
                            </li>
                            {{-- <li>
                                <a href="gallery.html" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    Gallery
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('frontend.terms.conditions') }}" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    Terms
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route() }}" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    Privacy Policy
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3>Useful Links</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="{{ url('/') }}" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all_blogs') }}" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.faq') }}" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    FAQ
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.testimonial') }}" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    Testimonials
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.contact') }}" target="_blank">
                                    <i class='bx bx-caret-right'></i>
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3>Newsletter</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nullam tempor eget ante fringilla rutrum aenean sed venenatis .
                        </p>
                        <div class="footer-form">
                            <form id="newsletterForm">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-radius-50"
                                                placeholder="Your Email*" name="email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-two border-radius-50">
                                            Subscribe Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copy-right-area copy-right-top">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="copy-right-text text-align1">
                        <p>
                            Copyright @
                            <script>
                                document.write(new Date().getFullYear())
                            </script> {{ config('settings.site_name') }}.
                            {{-- All Rights Reserved by {{ config('settings.site_name') }} --}}
                            {{-- <a href="https://hibootstrap.com/" target="_blank">HiBootstrap</a> --}}
                        </p>
                    </div>
                </div>

                @php
                    $socials = \App\Models\SocialLink::where('status', 1)->get();
                @endphp

                <div class="col-lg-4 col-md-4">
                    <div class="social-icon text-align2">
                        <ul class="social-link">
                            @foreach ($socials as $social)
                                <li>
                                    <a href="{{ $social->social_link }}"><i class='{{ $social->icon }}'></i></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@push('frontend')
    <script>
        $(document).ready(function() {
            $('#newsletterForm').on('submit', function(e) {
                e.preventDefault();

                let form = $(this).serialize();

                $.ajax({
                    url: "{{ route('subscribe.newsletter') }}",
                    method: 'POST',
                    data: form,
                    success: function(res) {
                        $('#newsletterForm').trigger('reset');
                        if (res.status === 'success') {
                            toastr.success(res.message);
                        }else {
                            toastr.error(res.message);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            })
        })
    </script>
@endpush
