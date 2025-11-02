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
                        <li>FAQ</li>
                    </ul>
                    <h3>FAQ</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- FAQ Area -->
        <div class="faq-area pt-100 pb-70 section-bg-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="faq-content faq-content-bg2">
                            <div class="section-title">
                                <span class="sp-color">FREE OF QUESTION</span>
                                <h2>Let's Start a Free of Questions and Get a Quick Support</h2>
                                <p>We are the agency who always gives you a priority on the free of question and you can easily make a question on the bunch.</p>
                            </div>

                            <div class="faq-accordion">
                                <ul class="accordion">
                                    @foreach ($answers as $answer)
                                        <li class="accordion-item">
                                            <a class="accordion-title" href="javascript:void(0)">
                                                <i class='bx bx-plus'></i>
                                                {{ $answer->faq->question }}?
                                            </a>

                                            <div class="accordion-content">
                                                <p>
                                                    {{ $answer->answer }}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="faq-img-3">
                            <img src="{{ asset("frontend/assets/img/faq/faq-img3.jpg") }}" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ Area End -->

        <!-- FAQ Another -->
        <div class="faq-another pt-100 pb-70">
            <div class="container">
                <div class="faq-form">
                    <div class="contact-form">
                        <div class="section-title text-center">
                            <h2>Ask Questions</h2>
                        </div>
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
        <!-- FAQ Another End -->
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
z
