@extends('frontend.layouts.master')
@section('frontend')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg12">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Product Details </li>
                </ul>
                <h3>{{ $product->name }} Details</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <style>
        .main-img {
            width: 1000px;
            height: 500px;
        }

        .small-img-container {
            display: flex;
            justify-content: space-between;
            width: inherit;
        }

        .small-img-container .small-img {
            height: 100px;
            width: 175px;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .color-fam {
            display: inline-block;
            height: 30px;
            width: 90px
        }

        .side-bar-form .default-btn {
            /* width: auto; */
            padding: 8px 20px !important;
        }

        @media (max-width: 768px) {
            .main-img {
                height: 500px !important;
            }

            .small-img-container .small-img {
                width: 100px !important;
            }
        }

        .wishlist {
            position: absolute;
            top: 5px;
            left: 5px;
            background: red;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            z-index: 10;
            color: #fff;
        }

        .wishlist:hover {
            background: #fff;
            color: red;
        }
    </style>

    <!-- Room Details Area End -->
    <div class="room-details-area pt-100 pb-70 wow fadeInUp" data-wow-duration="1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="room-details-side">
                        <div class="side-bar-form">
                            <h3>{{ $product->name }} </h3>
                            <h6>{{ $product->brand->name }}</h6>
                            <h6>{{ $product->size->name }}</h6>
                            <div class="d-flex" style="justify-content: space-between">
                                <h6>{{ config('settings.site_currency_symbol') }}{{ $product->price }}/{{ config('settings.site_selling_unit') }}
                                </h6>

                                @if ($product->quantity > 0)
                                    <span class="text-light bg-primary px-2 rounded">In Stock</span>
                                @else
                                    <span class="text-light bg-danger px-2 rounded">Stock Out</span>
                                @endif
                            </div>
                            <span>{{ $product->brand->category->name }}</span>
                            <form action="" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="quantity" type="number" min="1" value="1"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <button type="submit" class="default-btn btn-bg-two border-radius-5">Add To
                                                Cart</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="room-details-article">
                        <div class="room-details-item" style="position: relative">
                            <img src="{{ asset($product->image) }}" class="img-fluid main-img" id="main-img"
                                alt="Images">

                            <div class="small-img-container mt-2">
                                <img src="{{ asset($product->image) }}" class="img-fluid small-img mr-1" alt="">
                                @if (!empty($product->image2))
                                    <img src="{{ asset($product->image2) }}" class="img-fluid small-img mr-1"
                                        alt="">
                                @endif

                                @if (!empty($product->image3))
                                    <img src="{{ asset($product->image3) }}" class="img-fluid small-img mr-1"
                                        alt="">
                                @endif

                                @if (!empty($product->image4))
                                    <img src="{{ asset($product->image4) }}" class="img-fluid small-img" alt="">
                                @endif
                            </div>

                            <div class="wishlist">
                                <i class="fas fa-heart"
                                    style="font-size: 30px;position: absolute; top: 11px; left: 6px;"></i>
                            </div>
                        </div>

                        <div class="room-details-title">
                            <h2>{{ $product->name }}</h2>
                            <ul>
                                <li>
                                    <b> Rate : {{ config('settings.site_currency_symbol') }}
                                        {{ $product->price }}/{{ config('settings.site_selling_unit') }}</b>
                                </li>
                            </ul>
                        </div>

                        <div class="room-details-content">
                            <p>
                                {{ $product->short_description }}
                            </p>

                            <p>
                                {!! $product->long_description === 'null' ? 'N/A' : 'N/A' !!}
                            </p>

                            <div class="side-bar-plan">
                                <h3>More Info</h3>


                                {{-- <h6>Color Family: <span class="color-fam" style="background-color: {{ $product->color_family }}"></span></h6> --}}

                                <ul>
                                    <li>
                                        <a href="javascript:;">Color Family:</a> <span class="color-fam"
                                            style="background-color: {{ $product->color_family }}"></span>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> <b>Finish: </b>{{ $product->texture }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Details Area End -->

    <!-- Room Details Other -->
    <div class="room-details-other pb-70">
        <div class="container">
            <div class="room-details-text">
                <h2>Our Related Offer</h2>
            </div>

            <div class="row ">
                @foreach ($related_products as $product)
                    <div class="col-lg-3 wow fadeInLeft" data-wow-duration="1s"">
                        <div class="room-card-two">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-12 p-0">
                                    <div class="room-card-img">
                                        <a href="{{ route('single.product.page', $product->slug) }}">
                                            <img src="{{ asset($product->image) }}" alt="Images">
                                        </a>
                                    </div>
                                </div>

                                <div class="room-card-content">
                                    <h3>
                                        <a
                                            href="{{ route('single.product.page', $product->slug) }}">{{ \Str::limit($product->name, 15, '...') }}</a>
                                    </h3>
                                    <span>{{ config('settings.site_currency_symbol') }}{{ $product->price }}/{{ config('settings.site_selling_unit') }}</span>
                                    <div class="d-flex">
                                        <i class="fa-solid fa-ticket-simple" style="margin-right: 4px"></i>
                                        <i class="fa-solid fa-shopping-basket" style="margin-right: 4px"></i>
                                        <i class="fa-solid fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Room Details Other End -->
@endsection
@push('frontend')
    <script>
        $(document).ready(function() {
            const mainImg = document.getElementById('main-img');
            const smallImg = document.querySelectorAll('.small-img');

            smallImg.forEach(img => {
                img.addEventListener('click', function() {
                    mainImg.src = img.src;

                })
            });

            $("#addToCartForm").on('submit', function(e) {
                e.preventDefault();
                let form = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('product.add-to-cart') }}",
                    data: form,
                    success: function(res) {
                        if (res.status === 'success') {
                            $('.cart-num').text(res.count);
                            toastr.success(res.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },
                })
            })
        })
    </script>
@endpush
