@extends('frontend.layouts.master')
@section('frontend')
     <style>
        .breadcrumb-img {
            background-image: url('{{ asset(config("settings.breadcrumb_logo")) }}');
        }
    </style>
            <!-- Inner Banner -->
        <div class="inner-banner breadcrumb-img">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>Contact</li>
                    </ul>
                    <h3>Contact</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- Contact Area -->
        <div class="contact-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-content">
                            <div class="section-title">
                                <h2>{{ $contact->up_title }}</h2>
                            </div>
                            <div class="contact-img" style="position: relative">
                                <img src="{{ asset($contact->up_image) }}" alt="Images">

                                <div style="position: absolute; top:20px; right: 20px; border-radius:50%; width:50px; height:50px">
                                    <a href="https://wa.me/{{ config('settings.site_whatsapp') }}" target="_blank"><i class="fa-brands fa-square-whatsapp" style="font-size: 40px; color:#ffffff"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form id="contactMessageForm">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="phone_number" id="phone_number" required class="form-control" placeholder="Phone">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required placeholder="Your Subject">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required placeholder="Your Message"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group checkbox-option">
                                            <input type="checkbox" id="chb2" name="terms_and_conditions">
                                            <p>
                                                Accept <a href="{{ route('frontend.terms.conditions') }}">Terms & Conditions</a> And <a href="javascript:;">Privacy Policy.</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-bg-two">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Area End -->

        <!-- contact Another -->
        <div class="contact-another pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-another-content">
                            <div class="section-title">
                                <h2>{{ $contact->down_title }}</h2>
                                <p>
                                    {{ $contact->short_text }}
                                </p>
                            </div>

                            <div class="contact-item">
                                <ul>
                                    <li>
                                        <i class='bx bx-home-alt'></i>
                                        <div class="content">
                                            <span>{{ $contact->first_address }}</span>
                                            <span>{{ $contact->second_address }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <i class='bx bx-phone-call'></i>
                                        <div class="content">
                                            <span><a href="{{ $contact->first_phone }}">{{ $contact->first_phone }}</a></span>
                                            <span><a href="{{ $contact->second_phone }}">{{ $contact->second_phone }}</a></span>
                                        </div>
                                    </li>
                                    <li>
                                        <i class='bx bx-envelope'></i>
                                        <div class="content">
                                            <span><a href="{{ $contact->first_mail }}">{{ $contact->first_mail }}</a></span>
                                            <span><a href="{{ $contact->second_mail }}">{{ $contact->second_mail }}</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="contact-another-img">
                            <img src="{{ asset($contact->down_image) }}" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact Another End -->

        <!-- Map Area -->
        <div class="map-area">
            <div class="container-fluid m-0 p-0">
                <iframe src="{{ $contact->map_link }}"></iframe>
            </div>
        </div>
        <!-- Map Area End -->

@endsection
@push('frontend')
    <script>
        $(document).on('submit', '#contactMessageForm', function(e) {
            e.preventDefault();
            const data = $(this).serialize();

            $.ajax({
                url: "{{ route('frontend.contact.message') }}",
                method: 'POST',
                data: data,
                success: function(res) {
                    if (res.status === 'success') {
                        $("#contactMessageForm").trigger('reset');
                        toastr.success(res.message);
                    }
                },
                error: function(xhr, status, error) {
                    // let errorMessage = xhr.responseJSON.errors;
                    // $.each(errorMessage, function(index, value) {
                    //     toastr.error(value);
                    // })
                    console.log(error);
                },
            })
        })
    </script>
@endpush
