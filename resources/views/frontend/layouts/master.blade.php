<!doctype html>
<html lang="zxx">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/flaticon.css') }}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/boxicons.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">
    <!-- Nice Select Min CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.min.css') }}"> --}}
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.css') }}">
    <!-- Jquery Ui CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.css') }}">
    <!-- Style CSS -->
    <link href="{{ asset('modules/jquery-selectric/selectric.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/dashboard.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <!-- Theme Dark CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme-dark.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slider_banner.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/custom_card.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('default-images/aikez-logo.JPG') }}">

    <title>Aikez Emporium - World Tiles Resort</title>

    <style>
         .toastr-container{
            opacity: 1 !important;
        }

        #toast-container > .toast:before {
            font-family: inherit !important;
            content: '' !important;
            opacity: 1 !important;
        }

        #toast-container > .toast-success::before {
            content: "" !important;
        }
        #toast-container > .toast-warning::before {
            content: "" !important;
        }
        #toast-container > .toast-info::before {
            content: "" !important;
        }
        #toast-container > .toast-error::before {
            content: "" !important;
        }
    </style>
</head>

<body>

    <!-- PreLoader Start Remember to change the color of this loader background and the shapes-->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sk-cube-area">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- PreLoader End -->

    <!-- Start Navbar Area -->
    @include('frontend.layouts.header')
    <!-- End Navbar Area -->

    @yield('frontend')

    <!-- Footer Area -->
    @include('frontend.layouts.footer')
    <!-- Footer Area End -->


    <!-- Jquery Min JS -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Bundle Min JS -->
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Magnific Popup Min JS -->
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <!-- Nice Select Min JS -->
    {{-- <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script> --}}
    <!-- Wow Min JS -->
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <!-- Jquery Ui JS -->
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('frontend/assets/js/meanmenu.js') }}"></script>
    <!-- Ajaxchimp Min JS -->
    <script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Form Validator Min JS -->
    <script src="{{ asset('frontend/assets/js/form-validator.min.js') }}"></script>
    <!-- Contact Form JS -->
    <script src="{{ asset('frontend/assets/js/contact-form-script.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/slider_banner.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/select2/dist/js/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js" integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $(document).ready(function() {
            $('.button-click').click();
        })
    </script>

        <script>
        toastr.options.progressBar = true;
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif

        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':

                    toastr.options.timeOut = 5000;
                    toastr.options.closeButton = true;
                    toastr.options.toastClass = "toastr-container";
                    toastr.info("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
                    break;
                case 'success':

                    toastr.options.timeOut = 5000;
                    // toastr.options.extendedTimeOut = 0;
                    toastr.options.closeButton = true;
                    toastr.options.toastClass = "toastr-container";
                    toastr.success("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'warning':

                    toastr.options.timeOut = 5000;
                    toastr.options.closeButton = true;
                    toastr.options.toastClass = "toastr-container";
                    toastr.warning("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'error':

                    toastr.options.timeOut = 5000;
                    toastr.options.closeButton = true;
                    toastr.options.toastClass = "toastr-container";
                    toastr.error("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
            }
        @endif

        $(document).ready(function() {
            $('body').on('click', '.delete-item', function(e) {
                e.preventDefault();

                let url = $(this).attr('href');
                Swal.fire({
                    title: "Confirm Delete",
                    text: "Are you sure you want to delete this item?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'POST',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE"
                            },
                            success: function(response) {
                                let table = response.table;

                                if (response.status === 'success') {
                                    toastr.success(response.message, );
                                    if(table) {

                                        $(`${table}`).DataTable().ajax.reload();
                                    }
                                    else {
                                        window.location.reload();
                                    }
                                } else {
                                    if (response.status === 'error') {
                                        toastr.error(response.message);
                                        // window.location.reload();
                                    }
                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        })
                    }
                })
            })
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });


    </script>

    @stack('frontend')
</body>

</html>
